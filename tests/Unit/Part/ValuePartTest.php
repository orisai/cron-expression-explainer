<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Part;

use Orisai\CronExpressionExplainer\Part\ValuePart;
use PHPUnit\Framework\TestCase;

final class ValuePartTest extends TestCase
{

	public function test(): void
	{
		$value = '*';
		$part = new ValuePart($value);

		self::assertSame($value, $part->getValue());
	}

}
