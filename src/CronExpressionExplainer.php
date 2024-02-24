<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

interface CronExpressionExplainer
{

	public function explain(string $expression): string;

}
