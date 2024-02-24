<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use function assert;

final class MinuteInterpreter extends BasePartInterpreter
{

	public function deduplicateValue(string $value): string
	{
		return $value;
	}

	protected function getInStepName(): string
	{
		return $this->getInValueName();
	}

	protected function getInRangeName(): string
	{
		return $this->getInValueName();
	}

	protected function getInValueName(): string
	{
		return 'minute';
	}

	protected function getAsteriskDescription(): string
	{
		return 'every minute';
	}

	public function assertValueInRange(string $value): void
	{
		$intValue = (int) $value;
		assert($value === (string) $intValue);
		assert($intValue >= 0 && $intValue <= 59);
	}

	protected function translateValue(string $value): string
	{
		return $value;
	}

}
