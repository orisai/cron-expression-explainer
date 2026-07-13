<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use Orisai\CronExpressionExplainer\Part\ValuePart;
use function assert;
use function explode;
use function in_array;
use function is_numeric;
use function str_contains;
use function str_ends_with;
use function strtoupper;
use function substr;

final class DayOfWeekInterpreter extends BasePartInterpreter
{

	private const Duplicates = [
		'MON' => '1',
		'TUE' => '2',
		'WED' => '3',
		'THU' => '4',
		'FRI' => '5',
		'SAT' => '6',
		'SUN' => '7',
		0 => '7',
	];

	public function isAll(ValuePart $part): bool
	{
		return in_array($part->getValue(), ['*', '?'], true);
	}

	public function reduceValuePart(ValuePart $part): ValuePart
	{
		$value = $part->getValue();
		$value = is_numeric($value)
			? (int) $value
			: strtoupper($value);

		$deduplicated = self::Duplicates[$value] ?? null;
		if ($deduplicated !== null) {
			return new ValuePart($deduplicated);
		}

		return $part;
	}

	protected function getKey(): string
	{
		return 'day-of-week';
	}

	protected function getAsteriskDescription(string $locale): string
	{
		return '';
	}

	protected function translateValue(
		string $value,
		string $context,
		string $locale,
		bool $renderName,
		int $valueCount,
		string $listPosition
	): string
	{
		if (str_contains($value, '#')) {
			[$value, $nth] = explode('#', $value);
		}

		$last = str_ends_with($value, 'L');
		if ($last) {
			$value = substr($value, 0, -1);
			assert(!isset($nth));
		}

		$value = $this->deduplicateValue($value);
		$intValue = $this->convertNumericValue($value);

		$translated = $this->translator->translate(
			$this->getKey(),
			[
				'dayNumber' => $intValue,
				'context' => $context,
				'valueCount' => $valueCount,
				'listPosition' => $listPosition,
			],
			$locale,
		);

		if (isset($nth)) {
			$intNth = (int) $nth;
			assert($nth === (string) $intNth);
			assert($intNth >= 0 && $intNth <= 5);

			return $this->translator->translate(
				'day-of-week-nth',
				[
					'dayNumber' => $intValue,
					'day' => $translated,
					'nth' => $nth,
					'context' => $context,
					'valueCount' => $valueCount,
					'listPosition' => $listPosition,
				],
				$locale,
			);
		}

		if ($last) {
			return $this->translator->translate(
				'day-of-week-last',
				[
					'dayNumber' => $intValue,
					'day' => $translated,
					'context' => $context,
					'valueCount' => $valueCount,
					'listPosition' => $listPosition,
				],
				$locale,
			);
		}

		return $translated;
	}

	private function deduplicateValue(string $value): string
	{
		return self::Duplicates[strtoupper($value)] ?? $value;
	}

	private function convertNumericValue(string $value): int
	{
		assert(is_numeric($value));
		$intValue = (int) $value;
		assert((float) $value === (float) $intValue);
		assert($intValue >= 1 && $intValue <= 7);

		return $intValue;
	}

}
