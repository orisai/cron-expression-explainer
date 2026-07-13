<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Snapshots;

use DateTimeZone;
use Generator;
use Nette\Utils\FileSystem;
use Orisai\CronExpressionExplainer\DefaultCronExpressionExplainer;
use function array_key_exists;
use function array_keys;
use function file_put_contents;
use function json_encode;
use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_UNICODE;

/**
 * @phpstan-type T_PARTIAL_SOURCE array{
 *    0: string,
 *    1?: int<0,59>|null,
 *    2?: string|null,
 *  }
 * @phpstan-type T_MAIN_SOURCE array{
 *    0: string,
 *    1: int<0,59>|null,
 *    2: string|null,
 * }
 * @phpstan-type T_GENERATOR Generator<int, T_PARTIAL_SOURCE>
 */
final class TranslationsDataProvider
{

	/**
	 * @return array<string, array<string, array{
	 *     expression: string,
	 *     seconds: int<0,59>|null,
	 *     timezone: string|null,
	 *     english: string,
	 *     translation: string,
	 * }>>
	 */
	public static function provideResultsGroupedByLocale(): array
	{
		$explainer = new DefaultCronExpressionExplainer();

		$resultsByLocale = [];
		foreach (self::provideData() as $key => [$expression, $repeatSeconds, $timezone]) {
			$explained = $explainer->explainInLocales(
				array_keys($explainer->getSupportedLocales()),
				$expression,
				$repeatSeconds,
				$timezone !== null ? new DateTimeZone($timezone) : null,
			);

			foreach ($explained as $locale => $translation) {
				$resultsByLocale[$locale][$key] = [
					'expression' => $expression,
					'seconds' => $repeatSeconds,
					'timezone' => $timezone,
					'english' => $explained['en'],
					'translation' => $translation,
				];
			}
		}

		return $resultsByLocale;
	}

	public static function update(): void
	{
		FileSystem::delete(__DIR__ . '/translations');
		FileSystem::createDir(__DIR__ . '/translations');

		foreach (self::provideResultsGroupedByLocale() as $locale => $localizedResults) {
			file_put_contents(
				__DIR__ . '/translations/' . $locale . '.json',
				json_encode($localizedResults, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n",
			);
		}
	}

	/**
	 * @return Generator<string, T_MAIN_SOURCE>
	 */
	private static function provideData(): Generator
	{
		foreach (self::provideMinuteData() as $key => $data) {
			yield "minute-$key" => self::fillData($data);
		}

		foreach (self::provideHourData() as $key => $data) {
			yield "hour-$key" => self::fillData($data);
		}

		foreach (self::provideHourMinuteData() as $key => $data) {
			yield "hour+minute-$key" => self::fillData($data);
		}

		foreach (self::provideDayOfMonthData() as $key => $data) {
			yield "day-of-month-$key" => self::fillData($data);
		}

		foreach (self::provideDayOfWeekData() as $key => $data) {
			yield "day-of-week-$key" => self::fillData($data);
		}

		foreach (self::provideMonthData() as $key => $data) {
			yield "month-$key" => self::fillData($data);
		}

		foreach (self::provideMixedData() as $key => $data) {
			yield "mixed-$key" => self::fillData($data);
		}
	}

	/**
	 * @param T_PARTIAL_SOURCE $data
	 * @return T_MAIN_SOURCE
	 */
	private static function fillData(array $data): array
	{
		if (!array_key_exists(1, $data)) {
			$data[1] = null;
		}

		if (!array_key_exists(2, $data)) {
			$data[2] = null;
		}

		return $data;
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideMinuteData(): Generator
	{
		yield ['* * * * *'];
		yield ['1 * * * *'];
		yield ['1,2 * * * *'];
		yield ['1,2,3,4,5 * * * *'];
		yield ['1-10 * * * *'];
		yield ['*/2 * * * *'];
		yield ['*/3 * * * *'];
		yield ['*/4 * * * *'];
		yield ['*/5 * * * *'];
		yield ['1-10/2 * * * *'];
		yield ['1-15,31-45 * * * *'];
		yield ['1-30/2,40,41,42,45-50,51,52 * * * *'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideHourData(): Generator
	{
		yield ['* 1 * * *'];
		yield ['* 1,2 * * *'];
		yield ['* 1,2,3,4,5 * * *'];
		yield ['* 1-10 * * *'];
		yield ['* */2 * * *'];
		yield ['* */3 * * *'];
		yield ['* */4 * * *'];
		yield ['* */5 * * *'];
		yield ['* 1-10/2 * * *'];
		yield ['* 1-5,11-15 * * *'];
		yield ['* 1 * * *'];
		yield ['* 1-5/2,6,7,8,10-12,13,14 * * *'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideHourMinuteData(): Generator
	{
		yield ['@midnight'];
		yield ['0 0 * * *'];
		yield ['10 0 * * *'];
		yield ['0 2 * * *'];
		yield ['0 3 * * *'];
		yield ['0 4 * * *'];
		yield ['0 10 * * *'];
		yield ['0 12 * * *'];
		yield ['0 13 * * *'];
		yield ['0 14 * * *'];
		yield ['0 20 * * *'];
		yield ['0 21 * * *'];
		yield ['0 22 * * *'];
		yield ['0 23 * * *'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideDayOfMonthData(): Generator
	{
		yield ['* * 1 * *'];
		yield ['* * 1,2 * *'];
		yield ['* * 1,2,3,4,5 * *'];
		yield ['* * 1-10 * *'];
		yield ['* * */2 * *'];
		yield ['* * */3 * *'];
		yield ['* * */4 * *'];
		yield ['* * */5 * *'];
		yield ['* * 1-10/2 * *'];
		yield ['* * 1-5,11-15 * *'];
		yield ['* * 1-10/2,11,12,13,15-20,21,22 * *'];
		yield ['* * 1W * *'];
		yield ['* * 15W * *'];
		yield ['* * 1W-5W * *'];
		yield ['* * L * *'];
		yield ['* * 1-L * *'];
		yield ['* * LW * *'];
		yield ['* * 1-LW * *'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideDayOfWeekData(): Generator
	{
		yield ['* * * * MON'];
		yield ['* * * * 1'];
		yield ['* * * * 2'];
		yield ['* * * * 3'];
		yield ['* * * * 4'];
		yield ['* * * * 5'];
		yield ['* * * * 6'];
		yield ['* * * * 7'];
		yield ['* * * * 1,2'];
		yield ['* * * * 1,2,3,4,5'];
		yield ['* * * * 1-2'];
		yield ['* * * * 3-4'];
		yield ['* * * * 5-6'];
		yield ['* * * * 7-1'];
		yield ['* * * * 1-2/2'];
		yield ['* * * * 3-4/2'];
		yield ['* * * * 5-6/2'];
		yield ['* * * * 7-1/2'];
		yield ['* * * * */2'];
		yield ['* * * * */3'];
		yield ['* * * * */4'];
		yield ['* * * * */5'];
		yield ['* * * * 0-5'];
		yield ['* * * * 0-5/2'];
		yield ['* * * * 0-2,3,4,5-6'];
		yield ['* * * * 7#5'];
		yield ['* * * * 7L'];
		yield ['* * * * 7L,4'];
		yield ['* * * * 4,7L'];
		yield ['* * * * 7L,4L'];
		yield ['* * * * 7L-4L'];
		yield ['* * * * 7L-4'];
		yield ['* * * * 7#5,3#3'];
		yield ['* * * * 3#3-7#5'];
		yield ['* * * * 7#5,3'];
		yield ['* * * * 7#5-3'];
		yield ['* * * * 3-7#5'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideMonthData(): Generator
	{
		yield ['* * * JAN *'];
		yield ['* * * 1 *'];
		yield ['* * * 2 *'];
		yield ['* * * 3 *'];
		yield ['* * * 4 *'];
		yield ['* * * 5 *'];
		yield ['* * * 6 *'];
		yield ['* * * 7 *'];
		yield ['* * * 8 *'];
		yield ['* * * 9 *'];
		yield ['* * * 10 *'];
		yield ['* * * 11 *'];
		yield ['* * * 12 *'];
		yield ['* * * 1,2 *'];
		yield ['* * * 1,2,3,4,5 *'];
		yield ['* * * 1-11 *'];
		yield ['* * * */2 *'];
		yield ['* * * */3 *'];
		yield ['* * * */4 *'];
		yield ['* * * */5 *'];
		yield ['* * * 1-11/2 *'];
		yield ['* * * 1-2,3,4,5-6 *'];
	}

	/**
	 * @return T_GENERATOR
	 */
	private static function provideMixedData(): Generator
	{
		yield [
			'* * * * *',
			1,
		];

		yield [
			'* * * * *',
			30,
		];

		yield [
			'* * * * *',
			null,
			'Europe/Prague',
		];

		yield [
			'10 * * * *',
			10,
		];

		yield ['30 10 1 2 *'];
		yield ['30 10 8 3 *'];
		yield ['* * 1 * 1'];
		yield ['* * 1 * 1,2'];
		yield ['0-59 0-23 1-31 1-12 0-6'];
	}

}
