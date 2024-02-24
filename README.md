<h1 align="center">
	<img src="https://github.com/orisai/.github/blob/main/images/repo_title.png?raw=true" alt="Orisai"/>
	<br/>
	Cron Expression Explainer
</h1>

<p align="center">
    Human-readable cron expressions
</p>

<p align="center">
	📄 Check out our <a href="docs/README.md">documentation</a>.
</p>

<p align="center">
	💸 If you like Orisai, please <a href="https://orisai.dev/sponsor">make a donation</a>. Thank you!
</p>

<p align="center">
	<a href="https://github.com/orisai/cron-expression-explainer/actions?query=workflow%3ACI">
		<img src="https://github.com/orisai/cron-expression-explainer/workflows/CI/badge.svg">
	</a>
	<a href="https://coveralls.io/r/orisai/cron-expression-explainer">
		<img src="https://badgen.net/coveralls/c/github/orisai/cron-expression-explainer/v1.x?cache=300">
	</a>
	<a href="https://dashboard.stryker-mutator.io/reports/github.com/orisai/cron-expression-explainer/v1.x">
		<img src="https://badge.stryker-mutator.io/github.com/orisai/cron-expression-explainer/v1.x">
	</a>
	<a href="https://packagist.org/packages/orisai/cron-expression-explainer">
		<img src="https://badgen.net/packagist/dt/orisai/cron-expression-explainer?cache=3600">
	</a>
	<a href="https://packagist.org/packages/orisai/cron-expression-explainer">
		<img src="https://badgen.net/packagist/v/orisai/cron-expression-explainer?cache=3600">
	</a>
	<a href="https://choosealicense.com/licenses/mpl-2.0/">
		<img src="https://badgen.net/badge/license/MPL-2.0/blue?cache=3600">
	</a>
<p>

##

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
