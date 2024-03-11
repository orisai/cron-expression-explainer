<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

use DateTimeZone;
use Orisai\CronExpressionExplainer\Exception\InvalidExpression;

interface CronExpressionExplainer
{

	/**
	 * @param int<0,59>|null $repeatSeconds
	 * @throws InvalidExpression
	 */
	public function explain(string $expression, ?int $repeatSeconds = null, ?DateTimeZone $timeZone = null): string;

}
