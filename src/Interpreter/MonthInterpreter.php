<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use function assert;

final class MonthInterpreter extends BasePartInterpreter
{

	public function deduplicateValue(string $value): string
	{
		$map = [
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

		return $map[$value] ?? $value;
	}

	protected function getInStepName(): string
	{
		return $this->getInRangeName();
	}

	protected function getInRangeName(): string
	{
		return 'month';
	}

	protected function getInValueName(): string
	{
		return '';
	}

	protected function getAsteriskDescription(): string
	{
		return '';
	}

	protected function assertValueInRange(string $value): void
	{
		$intValue = (int) $value;
		assert($value === (string) $intValue);
		assert($intValue >= 1 && $intValue <= 12);
	}

	protected function translateValue(string $value): string
	{
		$map = [
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',
		];

		return $map[$value];
	}

}
