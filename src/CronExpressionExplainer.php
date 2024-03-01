<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

interface CronExpressionExplainer
{

	/**
	 * @param int<0,59>|null $repeatSeconds
	 */
	public function explain(string $expression, ?int $repeatSeconds = null): string;

}
