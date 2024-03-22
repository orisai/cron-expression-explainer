<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Exception;

use InvalidArgumentException;
use Throwable;

final class UnsupportedExpression extends InvalidArgumentException
{

	public function __construct(string $message, Throwable $previous)
	{
		parent::__construct($message, 0, $previous);
	}

}
