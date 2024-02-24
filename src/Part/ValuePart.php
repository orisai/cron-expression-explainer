<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Part;

final class ValuePart implements Part
{

	private string $value;

	public function __construct(string $value)
	{
		$this->value = $value;
	}

	public function getValue(): string
	{
		return $this->value;
	}

}
