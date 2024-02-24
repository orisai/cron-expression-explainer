<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

final class ListPart implements Part
{

	/** @var list<StepPart|RangePart|ValuePart> */
	private array $parts;

	/**
	 * @param list<StepPart|RangePart|ValuePart> $parts
	 */
	public function __construct(array $parts)
	{
		$this->parts = $parts;
	}

	/**
	 * @return list<StepPart|RangePart|ValuePart>
	 */
	public function getParts(): array
	{
		return $this->parts;
	}

}
