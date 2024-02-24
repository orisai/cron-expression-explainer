<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Part;

use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\StepPart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class StepPartTest extends TestCase
{

	public function test(): void
	{
		$range = new RangePart(new ValuePart('10'), new ValuePart('20'));
		$step = 2;
		$part = new StepPart($range, $step);

		self::assertSame($range, $part->getRange());
		self::assertSame($step, $part->getStep());
	}

}
