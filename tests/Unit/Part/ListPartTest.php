<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Part;

use Orisai\CronExpressionExplainer\Part\ListPart;
use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\StepPart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class ListPartTest extends TestCase
{

	public function test(): void
	{
		$parts = [
			new StepPart(new RangePart(new ValuePart('10'), new ValuePart('20')), 2),
			new RangePart(new ValuePart('30'), new ValuePart('40')),
			new ValuePart('50'),
		];
		$part = new ListPart($parts);

		self::assertSame($parts, $part->getParts());
	}

}
