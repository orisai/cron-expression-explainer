# Cron Expression Explainer

Human-readable cron expressions

## Content

- [Setup](#setup)
- [Usage](#usage)
- [Seconds](#seconds)
- [Compatibility](#compatibility)

## Setup

Install with [Composer](https://getcomposer.org)

```sh
composer require orisai/cron-expression-explainer
```

## Usage

```php
use Orisai\CronExpressionExplainer\DefaultCronExpressionExplainer;

$explainer = new DefaultCronExpressionExplainer();

$explainer->explain('* * * * *'); // At every minute.
$explainer->explain('@daily'); // At 00:00.
$explainer->explain('* * 1 * 1'); // At every minute on day-of-month 1 and on every Monday.
$explainer->explain('0 22 * 12 *'); // At 22:00 in December.
$explainer->explain('0 8-18 * * *'); // At minute 0 past every hour from 8 through 18.
$explainer->explain('0 8-18/2 * * *'); // At minute 0 past every 2nd hour from 8 through 18.
$explainer->explain('0 8,12,16 * * *'); // At minute 0 past hour 8, 12 and 16.
```

## Seconds

```php
$explainer->explain('* * * * *', 1); // At every second.
$explainer->explain('* * * * *', 30); // At every 30 seconds.
$explainer->explain('30 10 * * *', 2); // At every 2 seconds at 10:30.
$explainer->explain('1 * * * *', 2); // At every 2 seconds at minute 1.
```

## Compatibility

This library is built on top of [dragonmantank/cron-expression](https://github.com/dragonmantank/cron-expression).
For best compatibility, use it to interpret your expressions.
For example with [orisai/scheduler](https://github.com/orisai/scheduler)!
