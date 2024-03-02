<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

final class StepPart implements Part
{

	/** @var RangePart|ValuePart */
	private Part $range;

	private int $step;

	/**
	 * @param RangePart|ValuePart $range
	 */
	public function __construct(Part $range, int $step)
	{
		$this->range = $range;
		$this->step = $step;
	}

	/**
	 * @return RangePart|ValuePart
	 */
	public function getRange(): Part
	{
		return $this->range;
	}

	public function getStep(): int
	{
		return $this->step;
	}

}
