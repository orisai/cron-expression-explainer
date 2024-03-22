<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Exception;

use Exception;
use Orisai\CronExpressionExplainer\Exception\UnsupportedExpression;
use PHPUnit\Framework\TestCase;

final class UnsupportedExpressionTest extends TestCase
{

	public function test(): void
	{
		$message = 'message';
		$previous = new Exception();

		$exception = new UnsupportedExpression($message, $previous);
		self::assertSame($message, $exception->getMessage());
		self::assertSame($previous, $exception->getPrevious());
	}

}
