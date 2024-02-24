<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

final class RangePart implements Part
{

	private ValuePart $left;

	private ValuePart $right;

	public function __construct(ValuePart $left, ValuePart $right)
	{
		$this->left = $left;
		$this->right = $right;
	}

	public function getLeft(): ValuePart
	{
		return $this->left;
	}

	public function getRight(): ValuePart
	{
		return $this->right;
	}

}
