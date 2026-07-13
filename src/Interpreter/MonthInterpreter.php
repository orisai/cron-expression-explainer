<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use Orisai\CronExpressionExplainer\Part\ValuePart;
use function assert;
use function is_numeric;
use function strtoupper;

final class MonthInterpreter extends BasePartInterpreter
{

	private const Duplicates = [
		'JAN' => '1',
		'FEB' => '2',
		'MAR' => '3',
		'APR' => '4',
		'MAY' => '5',
		'JUN' => '6',
		'JUL' => '7',
		'AUG' => '8',
		'SEP' => '9',
		'OCT' => '10',
		'NOV' => '11',
		'DEC' => '12',
	];

	public function isAll(ValuePart $part): bool
	{
		return $part->getValue() === '*';
	}

	public function reduceValuePart(ValuePart $part): ValuePart
	{
		$value = strtoupper($part->getValue());

		$deduplicated = self::Duplicates[$value] ?? null;
		if ($deduplicated !== null) {
			return new ValuePart($deduplicated);
		}

		return $part;
	}

	protected function getKey(): string
	{
		return 'month';
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
		int $valueCount
	): string
	{
		return $this->translator->translate(
			$this->getKey(),
			[
				'month' => $this->convertNumericValue($value),
				'context' => $context,
				'valueCount' => $valueCount,
			],
			$locale,
		);
	}

	private function convertNumericValue(string $value): int
	{
		assert(is_numeric($value));
		$intValue = (int) $value;
		assert((float) $value === (float) $intValue);
		assert($intValue >= 1 && $intValue <= 12);

		return $intValue;
	}

}
