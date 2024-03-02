<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

use Orisai\CronExpressionExplainer\Interpreter\BasePartInterpreter;
use function assert;
use function explode;
use function str_contains;

final class PartParser
{

	public function parsePart(string $part, BasePartInterpreter $interpreter): Part
	{
		if (str_contains($part, ',')) {
			$list = [];
			foreach (explode(',', $part) as $item) {
				$list[] = $this->parseUnlistedPart($item, $interpreter);
			}

			return new ListPart($list);
		}

		return $this->parseUnlistedPart($part, $interpreter);
	}

	/**
	 * @return RangePart|StepPart|ValuePart
	 */
	private function parseUnlistedPart(string $part, BasePartInterpreter $interpreter): Part
	{
		if (str_contains($part, '/')) {
			$stepParts = explode('/', $part, 2);
			$step = (int) $stepParts[1];
			assert((string) $step === $stepParts[1]);

			return new StepPart(
				$this->parseRangePart($stepParts[0], $interpreter),
				$step,
			);
		}

		if (str_contains($part, '-')) {
			return $this->parseRangePart($part, $interpreter);
		}

		return $this->parseValuePart($part, $interpreter);
	}

	private function parseRangePart(string $part, BasePartInterpreter $interpreter): RangePart
	{
		assert(str_contains($part, '-'));
		$range = explode('-', $part, 2);

		return new RangePart(
			$this->parseValuePart($range[0], $interpreter),
			$this->parseValuePart($range[1], $interpreter),
		);
	}

	private function parseValuePart(string $part, BasePartInterpreter $interpreter): ValuePart
	{
		$part = $interpreter->deduplicateValue($part);

		return new ValuePart($part);
	}

}
