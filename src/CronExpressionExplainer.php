<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

use DateTimeZone;
use Orisai\CronExpressionExplainer\Exception\UnsupportedExpression;
use Orisai\CronExpressionExplainer\Exception\UnsupportedLanguage;

interface CronExpressionExplainer
{

	/**
	 * @param int<0,59>|null $repeatSeconds
	 * @throws UnsupportedExpression
	 * @throws UnsupportedLanguage
	 */
	public function explain(
		string $expression,
		?int $repeatSeconds = null,
		?DateTimeZone $timeZone = null,
		?string $language = null
	): string;

	/**
	 * @return array<string, string>
	 */
	public function getSupportedLanguages(): array;

}
