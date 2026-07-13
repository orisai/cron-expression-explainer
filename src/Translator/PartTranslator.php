<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer\Translator;

use MessageFormatter;
use function array_diff;
use function assert;
use function count;
use function explode;
use function is_string;

/**
 * @internal
 */
final class PartTranslator
{

	private const PartsOrderTokens = [
		'second',
		'time',
		'minute',
		'hour',
		'date',
		'day-of-month',
		'day-of-week',
		'month',
		'timezone',
	];

	/** @var array<string, array<mixed>> */
	private array $translations = [];

	/**
	 * @param array<string, string|int> $parameters
	 */
	public function translate(string $key, array $parameters, string $locale): string
	{
		$message = $this->loadTranslations($locale)[$key];
		if ($message === '') {
			return '';
		}

		$formatter = new MessageFormatter($locale, $message);
		$translatedMessage = $formatter->format($parameters);
		assert($translatedMessage !== false);

		return $translatedMessage;
	}

	/**
	 * @return list<string>
	 */
	public function getPartsOrder(string $locale): array
	{
		$order = $this->loadTranslations($locale)['parts-order'];
		assert(is_string($order));

		$tokens = explode(' ', $order);
		assert(count($tokens) === count(self::PartsOrderTokens));
		assert(array_diff(self::PartsOrderTokens, $tokens) === []);

		return $tokens;
	}

	/**
	 * @return array<mixed>
	 */
	private function loadTranslations(string $locale): array
	{
		$translations = $this->translations[$locale] ?? null;

		if ($translations !== null) {
			return $translations;
		}

		return $this->translations[$locale] = require $this->getTranslationFile($locale);
	}

	private function getTranslationFile(string $locale): string
	{
		return __DIR__ . '/translations/' . $locale . '.php';
	}

}
