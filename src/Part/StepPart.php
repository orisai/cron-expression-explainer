<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

final class StepPart implements Part
{

	private RangePart $range;

	private int $step;

	public function __construct(RangePart $range, int $step)
	{
		$this->range = $range;
		$this->step = $step;
	}

	public function getRange(): RangePart
	{
		return $this->range;
	}

	public function getStep(): int
	{
		return $this->step;
	}

}
