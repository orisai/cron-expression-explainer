<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use function assert;

final class DayOfWeekInterpreter extends BasePartInterpreter
{

	public function deduplicateValue(string $value): string
	{
		$map = [
			7 => '0',
			'SUN' => '0',
			'MON' => '1',
			'TUE' => '2',
			'WED' => '3',
			'THU' => '4',
			'FRI' => '5',
			'SAT' => '6',
		];

		return $map[$value] ?? $value;
	}

	protected function getInStepName(): string
	{
		return $this->getInRangeName();
	}

	protected function getInRangeName(): string
	{
		return 'day-of-week';
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
		assert($intValue >= 0 && $intValue <= 6);
	}

	protected function translateValue(string $value): string
	{
		$map = [
			0 => 'Sunday',
			1 => 'Monday',
			2 => 'Tuesday',
			3 => 'Wednesday',
			4 => 'Thursday',
			5 => 'Friday',
			6 => 'Saturday',
		];

		return $map[$value];
	}

}
