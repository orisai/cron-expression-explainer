<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Exception;

use InvalidArgumentException;

final class UnsupportedLanguage extends InvalidArgumentException
{

	private string $language;

	public function __construct(string $language)
	{
		parent::__construct("Language '$language' is not supported.");
		$this->language = $language;
	}

	public function getLanguage(): string
	{
		return $this->language;
	}

}
