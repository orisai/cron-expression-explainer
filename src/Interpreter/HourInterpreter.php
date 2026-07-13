<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use Orisai\CronExpressionExplainer\Part\ValuePart;
use function assert;
use function is_numeric;

final class HourInterpreter extends BasePartInterpreter
{

	public function isAll(ValuePart $part): bool
	{
		return $part->getValue() === '*';
	}

	public function reduceValuePart(ValuePart $part): ValuePart
	{
		return $part;
	}

	protected function getKey(): string
	{
		return 'hour';
	}

	protected function getAsteriskDescription(string $locale): string
	{
		return '';
	}

	public function convertNumericValue(string $value): int
	{
		assert(is_numeric($value));
		$intValue = (int) $value;
		assert((float) $value === (float) $intValue);
		assert($intValue >= 0 && $intValue <= 23);

		return $intValue;
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
		$key = $this->getKey();
		if ($renderName) {
			$key .= '-named';
		}

		return $this->translator->translate(
			$key,
			[
				'hour' => $this->convertNumericValue($value),
				'context' => $context,
				'valueCount' => $valueCount,
				'listPosition' => $listPosition,
			],
			$locale,
		);
	}

}
