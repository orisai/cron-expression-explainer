<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Part;

use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class RangePartTest extends TestCase
{

	public function test(): void
	{
		$left = new ValuePart('10');
		$right = new ValuePart('20');
		$part = new RangePart($left, $right);

		self::assertSame($left, $part->getLeft());
		self::assertSame($right, $part->getRight());
	}

}
