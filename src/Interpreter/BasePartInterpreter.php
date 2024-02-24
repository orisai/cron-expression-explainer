<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Interpreter;

use Orisai\CronExpressionExplainer\Part\ListPart;
use Orisai\CronExpressionExplainer\Part\Part;
use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\StepPart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use function array_key_first;
use function array_key_last;
use function assert;

/**
 * @internal
 */
abstract class BasePartInterpreter
{

	public function explainPart(Part $part, bool $renderName = true): string
	{
		if ($part instanceof ListPart) {
			$list = $part->getParts();
			$firstKey = array_key_first($list);
			$lastKey = array_key_last($list);
			$string = '';
			foreach ($list as $key => $item) {
				$string .= $this->explainPart($item, $key === $firstKey);
				if ($key !== $lastKey) {
					if (++$key === $lastKey) {
						$string .= ' and ';
					} else {
						$string .= ', ';
					}
				}
			}

			return $string;
		}

		if ($part instanceof StepPart) {
			$step = $part->getStep();

			// Range with step === 1 is the same as range without step
			if ($step === 1) {
				return $this->explainPart($part->getRange());
			}

			return 'every '
				. $step
				. $this->getNumberExtension($step)
				. " {$this->getInStepName()} "
				. $this->explainPart($part->getRange(), false);
		}

		if ($part instanceof RangePart) {
			$left = $part->getLeft();
			$right = $part->getRight();

			return ($renderName ? "every {$this->getInRangeName()} " : '')
				. 'from '
				. $this->explainPart($left, false)
				. ' through '
				. $this->explainPart($right, false);
		}

		assert($part instanceof ValuePart);

		$value = $part->getValue();

		if ($value === '*') {
			return $this->getAsteriskDescription();
		}

		$this->assertValueInRange($value);

		$name = $this->getInValueName();

		return ($renderName ? ($name !== '' ? "$name " : '') : '')
			. $this->translateValue($value);
	}

	abstract public function deduplicateValue(string $value): string;

	abstract protected function getInValueName(): string;

	abstract protected function getInRangeName(): string;

	abstract protected function getInStepName(): string;

	abstract protected function getAsteriskDescription(): string;

	abstract protected function assertValueInRange(string $value): void;

	abstract protected function translateValue(string $value): string;

	private function getNumberExtension(int $number): string
	{
		if ($number === 1) {
			return 'st';
		}

		if ($number === 2) {
			return 'nd';
		}

		if ($number === 3) {
			return 'rd';
		}

		return 'th';
	}

}
