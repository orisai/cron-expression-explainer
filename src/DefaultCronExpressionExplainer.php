<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

use Cron\CronExpression;
use DateTimeZone;
use IntlChar;
use InvalidArgumentException;
use Orisai\CronExpressionExplainer\Exception\UnsupportedExpression;
use Orisai\CronExpressionExplainer\Exception\UnsupportedLocale;
use Orisai\CronExpressionExplainer\Interpreter\BasePartInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\DayOfMonthInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\DayOfWeekInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\HourInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MinuteInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MonthInterpreter;
use Orisai\CronExpressionExplainer\Part\ListPart;
use Orisai\CronExpressionExplainer\Part\Part;
use Orisai\CronExpressionExplainer\Part\PartParser;
use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\StepPart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use Orisai\CronExpressionExplainer\Translator\PartTranslator;
use function array_key_exists;
use function assert;
use function is_numeric;
use function is_string;
use function preg_match;
use function str_ends_with;
use function str_pad;
use const STR_PAD_LEFT;

final class DefaultCronExpressionExplainer implements CronExpressionExplainer
{

	private PartParser $parser;

	private PartTranslator $translator;

	private MinuteInterpreter $minuteInterpreter;

	private HourInterpreter $hourInterpreter;

	private DayOfMonthInterpreter $dayOfMonthInterpreter;

	private MonthInterpreter $monthInterpreter;

	private DayOfWeekInterpreter $dayOfWeekInterpreter;

	private string $defaultLocale = 'en';

	public function __construct()
	{
		$this->parser = new PartParser();
		$this->translator = new PartTranslator();
		$this->minuteInterpreter = new MinuteInterpreter($this->translator);
		$this->hourInterpreter = new HourInterpreter($this->translator);
		$this->dayOfMonthInterpreter = new DayOfMonthInterpreter($this->translator);
		$this->monthInterpreter = new MonthInterpreter($this->translator);
		$this->dayOfWeekInterpreter = new DayOfWeekInterpreter($this->translator);
	}

	public function getSupportedLocales(): array
	{
		return [
			'cs' => 'czech',
			'de' => 'german',
			'en' => 'english',
			'es' => 'spanish',
			'fr' => 'french',
			'it' => 'italian',
			'nl' => 'dutch',
			'pl' => 'polish',
			'pt' => 'portuguese',
			'ru' => 'russian',
			'sk' => 'slovak',
			'tr' => 'turkish',
			'uk' => 'ukrainian',
		];
	}

	public function setDefaultLocale(string $locale): void
	{
		$this->checkLocaleIsSupported($locale);
		$this->defaultLocale = $locale;
	}

	/**
	 * @throws UnsupportedLocale
	 */
	private function checkLocaleIsSupported(?string $locale): void
	{
		if ($locale !== null && !array_key_exists($locale, $this->getSupportedLocales())) {
			throw new UnsupportedLocale($locale);
		}
	}

	public function explain(
		string $expression,
		?int $repeatSeconds = null,
		?DateTimeZone $timeZone = null,
		?string $locale = null
	): string
	{
		$this->checkLocaleIsSupported($locale);
		$locale ??= $this->defaultLocale;

		$repeatSeconds ??= 0;

		[$minutePart, $hourPart, $dayOfMonthPart, $monthPart, $dayOfWeekPart] = $this->expressionToParts($expression);

		return $this->build(
			$locale,
			$repeatSeconds,
			$minutePart,
			$hourPart,
			$dayOfWeekPart,
			$dayOfMonthPart,
			$monthPart,
			$timeZone,
		);
	}

	public function explainInLocales(
		array $locales,
		string $expression,
		?int $repeatSeconds = null,
		?DateTimeZone $timeZone = null
	): array
	{
		if ($locales === []) {
			return [];
		}

		foreach ($locales as $locale) {
			$this->checkLocaleIsSupported($locale);
		}

		$repeatSeconds ??= 0;

		[$minutePart, $hourPart, $dayOfMonthPart, $monthPart, $dayOfWeekPart] = $this->expressionToParts($expression);

		$translations = [];
		foreach ($locales as $locale) {
			$translations[$locale] = $this->build(
				$locale,
				$repeatSeconds,
				$minutePart,
				$hourPart,
				$dayOfWeekPart,
				$dayOfMonthPart,
				$monthPart,
				$timeZone,
			);
		}

		return $translations;
	}

	/**
	 * @return array{
	 *     0: ListPart|StepPart|RangePart|ValuePart,
	 *     1: ListPart|StepPart|RangePart|ValuePart,
	 *     2: ListPart|StepPart|RangePart|ValuePart,
	 *     3: ListPart|StepPart|RangePart|ValuePart,
	 *     4: ListPart|StepPart|RangePart|ValuePart,
	 * }
	 */
	private function expressionToParts(string $expression): array
	{
		$expr = $this->createExpression($expression);
		$minutePart = $this->processExpressionPart(
			$expr,
			CronExpression::MINUTE,
			$this->minuteInterpreter,
		);
		$hourPart = $this->processExpressionPart(
			$expr,
			CronExpression::HOUR,
			$this->hourInterpreter,
		);
		$dayOfMonthPart = $this->processExpressionPart(
			$expr,
			CronExpression::DAY,
			$this->dayOfMonthInterpreter,
		);
		$monthPart = $this->processExpressionPart(
			$expr,
			CronExpression::MONTH,
			$this->monthInterpreter,
		);
		$dayOfWeekPart = $this->processExpressionPart(
			$expr,
			CronExpression::WEEKDAY,
			$this->dayOfWeekInterpreter,
		);

		return [$minutePart, $hourPart, $dayOfMonthPart, $monthPart, $dayOfWeekPart];
	}

	/**
	 * @throws UnsupportedExpression
	 */
	private function createExpression(string $expression): CronExpression
	{
		try {
			return new CronExpression($expression);
		} catch (InvalidArgumentException $exception) {
			throw new UnsupportedExpression($exception->getMessage(), $exception);
		}
	}

	/**
	 * @return ListPart|StepPart|RangePart|ValuePart
	 */
	private function processExpressionPart(
		CronExpression $expression,
		int $partName,
		BasePartInterpreter $interpreter
	): Part
	{
		$part = $expression->getExpression($partName);
		assert($part !== null);

		return $interpreter->reducePart(
			$this->parser->parsePart($part),
		);
	}

	/**
	 * @param int<0, 59> $repeatSeconds
	 * @param ListPart|StepPart|RangePart|ValuePart $minutePart
	 * @param ListPart|StepPart|RangePart|ValuePart $hourPart
	 * @param ListPart|StepPart|RangePart|ValuePart $dayOfWeekPart
	 * @param ListPart|StepPart|RangePart|ValuePart $dayOfMonthPart
	 * @param ListPart|StepPart|RangePart|ValuePart $monthPart
	 */
	private function build(
		string $locale,
		int $repeatSeconds,
		Part $minutePart,
		Part $hourPart,
		Part $dayOfWeekPart,
		Part $dayOfMonthPart,
		Part $monthPart,
		?DateTimeZone $timeZone
	): string
	{
		$explanation = '';
		$secondsExplanation = $this->explainSeconds($repeatSeconds, $locale);
		$explanation .= $secondsExplanation;

		if (
			$minutePart instanceof ValuePart
			&& $hourPart instanceof ValuePart
			&& is_numeric($minutePartValue = $minutePart->getValue())
			&& is_numeric($hourPartValue = $hourPart->getValue())
		) {
			if ($secondsExplanation !== '') {
				$explanation .= ' ';
			}

			$hourPartValueNumeric = $this->hourInterpreter->convertNumericValue($hourPartValue);
			$hourPartValue = str_pad(
				(string) $hourPartValueNumeric,
				2,
				'0',
				STR_PAD_LEFT,
			);
			$minutePartValue = str_pad(
				(string) $this->minuteInterpreter->convertNumericValue($minutePartValue),
				2,
				'0',
				STR_PAD_LEFT,
			);

			$explanation .= $this->translator->translate('hour+minute', [
				'hourNumeric' => $hourPartValueNumeric,
				'hour' => $hourPartValue,
				'minute' => $minutePartValue,
			], $locale);
		} else {
			if (
				!(
					$repeatSeconds > 0
					&& $minutePart instanceof ValuePart
					&& $this->minuteInterpreter->isAll($minutePart)
				)
			) {
				if ($secondsExplanation !== '') {
					$explanation .= ' ';
				}

				$explanation .= $this->translator->translate('before-minute', [], $locale);
				$explanation .= $this->minuteInterpreter->explainPart($minutePart, $locale);
			}

			$hourExplanation = $this->hourInterpreter->explainPart($hourPart, $locale);
			if ($hourExplanation !== '') {
				$explanation .= $this->translator->translate('before-hour', [], $locale);
				$explanation .= $hourExplanation;
			}
		}

		$dayOfWeekExplanation = $this->dayOfWeekInterpreter->explainPart($dayOfWeekPart, $locale);
		if (
			$dayOfWeekExplanation === ''
			&& $dayOfMonthPart instanceof ValuePart
			&& $monthPart instanceof ValuePart
			&& is_numeric($dayOfMonthPart->getValue())
			&& is_numeric($monthPart->getValue())
		) {
			$explanation .= ' ' . $this->translator->translate('day-of-month+month', [
				'day' => $this->dayOfMonthInterpreter->convertNumericValue($dayOfMonthPart->getValue()),
				'month' => $monthPart->getValue(),
			], $locale);
		} else {
			$dayOfMonthExplanation = $this->dayOfMonthInterpreter->explainPart($dayOfMonthPart, $locale);

			if ($dayOfMonthExplanation !== '') {
				$explanation .= $this->translator->translate('before-day-of-month', [], $locale);
				$explanation .= $dayOfMonthExplanation;
			}

			if ($dayOfMonthExplanation !== '' && $dayOfWeekExplanation !== '') {
				$explanation .= $this->translator->translate('between-day-of-month-and-week', [], $locale);
			}

			if ($dayOfWeekExplanation !== '') {
				$explanation .= $this->translator->translate('before-day-of-week', [
					'dayNumber' => $this->getFirstValueIfNumeric($dayOfWeekPart),
				], $locale);
			}

			$explanation .= $dayOfWeekExplanation;

			$monthExplanation = $this->monthInterpreter->explainPart($monthPart, $locale);
			if ($monthExplanation !== '') {
				$explanation .= $this->translator->translate('before-month', [], $locale);
				$explanation .= $monthExplanation;
			}
		}

		if ($timeZone !== null) {
			$explanation .= ' ' . $this->translator->translate('timezone', [
				'tz' => $timeZone->getName(),
			], $locale);
		}

		if (!str_ends_with($explanation, '.')) {
			$explanation .= '.';
		}

		return $this->capitalizeFirstLetter($explanation);
	}

	private function capitalizeFirstLetter(string $string): string
	{
		if (preg_match('~^(.)(.*)~su', $string, $matches) !== 1) {
			return $string;
		}

		$firstUpper = IntlChar::toupper($matches[1]);
		if (!is_string($firstUpper)) {
			return $string;
		}

		return $firstUpper . $matches[2];
	}

	/**
	 * @param int<0, 59> $repeatSeconds
	 */
	private function explainSeconds(int $repeatSeconds, string $locale): string
	{
		if ($repeatSeconds <= 0) {
			return '';
		}

		return $this->translator->translate('second', [
			'second' => $repeatSeconds,
		], $locale);
	}

	private function getFirstValueIfNumeric(Part $part): string
	{
		if ($part instanceof ListPart) {
			$part = $part->getParts()[0];
		}

		if (!$part instanceof ValuePart) {
			return 'NaN';
		}

		$value = $part->getValue();
		if (!is_numeric($value)) {
			return 'NaN';
		}

		return $value;
	}

}
