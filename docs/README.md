# Cron Expression Explainer

Human-readable cron expressions

## Content

- [Setup](#setup)
- [Usage](#usage)
- [Seconds](#seconds)
- [Time zones](#time-zones)
- [Localization](#localization)
- [Handling unsupported expressions](#handling-unsupported-expressions)
- [Compatibility](#compatibility)
- [Contributing](#contributing)

## Setup

Install with [Composer](https://getcomposer.org)

```sh
composer require orisai/cron-expression-explainer
```

## Usage

Explain any cron expression

```php
use Orisai\CronExpressionExplainer\DefaultCronExpressionExplainer;

$explainer = new DefaultCronExpressionExplainer();

$explainer->explain('* * * * *'); // At every minute.
$explainer->explain('*/30 * * * *'); // At every 30th minute.
$explainer->explain('@daily'); // At 00:00.
$explainer->explain('* * 1 * 1'); // At every minute on day-of-month 1 and on every Monday.
$explainer->explain('0 22 * 12 *'); // At 22:00 in December.
$explainer->explain('0 8-18 * * *'); // At minute 0 past every hour from 8 through 18.
$explainer->explain('0 8-18/2 * * *'); // At minute 0 past every 2nd hour from 8 through 18.
$explainer->explain('0 8,12,16 * * *'); // At minute 0 past hour 8, 12 and 16.
$explainer->explain('* * 1 2 *'); // At every minute on 1st of February.
$explainer->explain('* * * * SUN#2'); // At every minute on 2nd Sunday.
$explainer->explain('* * 15W * *'); // At every minute on a weekday closest to the 15th.
$explainer->explain('* * L * *'); // At every minute on a last day-of-month.
$explainer->explain('* * LW * *'); // At every minute on a last weekday.
$explainer->explain('* * * * 7L'); // At every minute on the last Sunday.
```

## Seconds

Add amount of seconds after which expression should match again

> This is a feature of [orisai/scheduler](https://github.com/orisai/scheduler)

```php
$explainer->explain('* * * * *', 1); // At every second.
$explainer->explain('* * * * *', 30); // At every 30 seconds.
$explainer->explain('30 10 * * *', 2); // At every 2 seconds at 10:30.
$explainer->explain('1 * * * *', 2); // At every 2 seconds at minute 1.
```

## Time zones

Add timezone in which the cron expression should be interpreted

> This is a feature of [orisai/scheduler](https://github.com/orisai/scheduler)

```php
use DateTimeZone;

$explainer->explain('30 10 * * *', null, new DateTimeZone('America/New_York')); // At 10:30 in America/New_York time zone.
```

## Localization

Translate expression into any supported locale

```php
$explainer->explain('* * * * *', null, null, 'en'); // At every minute.
$explainer->explain('* * * * *', null, null, 'cs'); // Každou minutu.
$explainer->explain('* * * * *', null, null, 'sk'); // Každú minútu.
$explainer->getSupportedLocales(); // array<string, string> e.g. ['en' => 'english', 'cs' => 'czech', /* ... */]
$explainer->setDefaultLocale('cs');
```

Currently supported locales are:

- `cs` - czech / čeština
- `de` - german / Deutsch
- `en` - english
- `es` - spanish / español
- `fr` - french / français
- `it` - italian / italiano
- `ja` - japanese / 日本語
- `ko` - korean / 한국어
- `nl` - dutch / Nederlands
- `pl` - polish / polski
- `pt` - portuguese / português
- `ru` - russian / русский
- `sk` - slovak / slovenčina
- `tr` - turkish / Türkçe
- `uk` - ukrainian / українська
- `zh` - chinese / 简体中文

In case given locale is not supported, the `UnsupportedLocale` exception is thrown.

## Handling unsupported expressions

Syntax may not be recognized as valid or may just be some complex variant that we don't support (yet).
For that case you may catch the `UnsupportedExpression` exception.

```php
use Orisai\CronExpressionExplainer\Exception\UnsupportedExpression;

try {
	$explained = $explainer->explain('not supported');
} catch (UnsupportedExpression $e) {
	$explained = $e->getMessage();
}
```

## Compatibility

This library is built on top of [dragonmantank/cron-expression](https://github.com/dragonmantank/cron-expression).
For best compatibility, use it to interpret your expressions.
For example with [orisai/scheduler](https://github.com/orisai/scheduler)!

## Contributing

To add support for a new locale:

- create file in `src/Translator/translations` and add translations for all the keys used in other translation files
- besides ICU messages, each file contains meta keys: `parts-order` (space-separated
  order in which sentence parts are rendered), `sentence-end` (terminal punctuation)
  and `before-*` glue keys which receive a `position` parameter (`first` at sentence
  start, `other` elsewhere)
- add it to supported locales in `DefaultCronExpressionExplainer`
- generate translations via `make update-snapshots`
- verify that the generated test translations in `tests/Snapshots/translations` make sense and match their configuration
- run `make tests`, it should pass now :)
- mention the locale in the documentation
