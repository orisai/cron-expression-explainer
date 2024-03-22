<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit\Exception;

use Orisai\CronExpressionExplainer\Exception\UnsupportedLanguage;
use PHPUnit\Framework\TestCase;

final class UnsupportedLanguageTest extends TestCase
{

	public function test(): void
	{
		$exception = new UnsupportedLanguage('en');

		self::assertSame("Language 'en' is not supported.", $exception->getMessage());
		self::assertSame('en', $exception->getLanguage());
	}

}
