<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

use Cron\CronExpression;
use InvalidArgumentException;
use Orisai\CronExpressionExplainer\Exception\InvalidExpression;
use Orisai\CronExpressionExplainer\Interpreter\BasePartInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\DayOfMonthInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\DayOfWeekInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\HourInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MinuteInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MonthInterpreter;
use Orisai\CronExpressionExplainer\Part\ListPart;
use Orisai\CronExpressionExplainer\Part\Part;
use Orisai\CronExpressionExplainer\Part\RangePart;
use Orisai\CronExpressionExplainer\Part\StepPart;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use function assert;
use function explode;
use function is_numeric;
use function str_contains;
use function str_pad;
use const STR_PAD_LEFT;

final class DefaultCronExpressionExplainer implements CronExpressionExplainer
{

	private MinuteInterpreter $minuteInterpreter;

	private HourInterpreter $hourInterpreter;

	private DayOfMonthInterpreter $dayOfMonthInterpreter;

	private MonthInterpreter $monthInterpreter;

	private DayOfWeekInterpreter $dayOfWeekInterpreter;

	public function __construct()
	{
		$this->minuteInterpreter = new MinuteInterpreter();
		$this->hourInterpreter = new HourInterpreter();
		$this->dayOfMonthInterpreter = new DayOfMonthInterpreter();
		$this->monthInterpreter = new MonthInterpreter();
		$this->dayOfWeekInterpreter = new DayOfWeekInterpreter();
	}

	public function explain(string $expression): string
	{
		try {
			$expr = new CronExpression($expression);
		} catch (InvalidArgumentException $exception) {
			throw new InvalidExpression($exception->getMessage(), $exception);
		}

		$minute = $expr->getExpression(CronExpression::MINUTE);
		assert($minute !== null);
		$hour = $expr->getExpression(CronExpression::HOUR);
		assert($hour !== null);
		$dayOfMonth = $expr->getExpression(CronExpression::DAY);
		assert($dayOfMonth !== null);
		$month = $expr->getExpression(CronExpression::MONTH);
		assert($month !== null);
		$dayOfWeek = $expr->getExpression(CronExpression::WEEKDAY);
		assert($dayOfWeek !== null);

		$minutePart = $this->parsePart($minute, $this->minuteInterpreter);
		$hourPart = $this->parsePart($hour, $this->hourInterpreter);
		$dayOfMonthPart = $this->parsePart($dayOfMonth, $this->dayOfMonthInterpreter);
		$monthPart = $this->parsePart($month, $this->monthInterpreter);
		$dayOfWeekPart = $this->parsePart($dayOfWeek, $this->dayOfWeekInterpreter);

		$explanation = 'At ';

		if (
			$minutePart instanceof ValuePart
			&& $hourPart instanceof ValuePart
			&& is_numeric($minutePartValue = $minutePart->getValue())
			&& is_numeric($hourPartValue = $hourPart->getValue())
		) {
			$this->hourInterpreter->assertValueInRange($hourPartValue);
			$this->minuteInterpreter->assertValueInRange($minutePartValue);

			$explanation .= str_pad($hourPartValue, 2, '0', STR_PAD_LEFT)
				. ':'
				. str_pad($minutePartValue, 2, '0', STR_PAD_LEFT);
		} else {
			$explanation .= $this->minuteInterpreter->explainPart($minutePart);
			$hourExplanation = $this->hourInterpreter->explainPart($hourPart);
			$explanation .= $hourExplanation !== '' ? ' past ' . $hourExplanation : '';
		}

		$dayOfMonthExplanation = $this->dayOfMonthInterpreter->explainPart($dayOfMonthPart);
		$dayOfWeekExplanation = $this->dayOfWeekInterpreter->explainPart($dayOfWeekPart);

		$explanation .= $dayOfMonthExplanation !== '' ? ' on ' . $dayOfMonthExplanation : '';

		if ($dayOfMonthExplanation !== '' && $dayOfWeekExplanation !== '') {
			$explanation .= ' and';
		}

		$explanation .= $dayOfWeekExplanation !== '' ? ' on ' : '';
		if (
			$dayOfMonthExplanation !== ''
			&& $dayOfWeekPart instanceof ValuePart
			&& $dayOfWeekPart->getValue() !== '*'
		) {
			$explanation .= 'every ';
		}

		$explanation .= $dayOfWeekExplanation;

		$monthExplanation = $this->monthInterpreter->explainPart($monthPart);
		$explanation .= $monthExplanation !== '' ? ' in ' . $monthExplanation : '';

		return $explanation . '.';
	}

	private function parsePart(string $part, BasePartInterpreter $interpreter): Part
	{
		if (str_contains($part, ',')) {
			$list = [];
			foreach (explode(',', $part) as $item) {
				$list[] = $this->parseUnlistedPart($item, $interpreter);
			}

			return new ListPart($list);
		}

		return $this->parseUnlistedPart($part, $interpreter);
	}

	/**
	 * @return RangePart|StepPart|ValuePart
	 */
	private function parseUnlistedPart(string $part, BasePartInterpreter $interpreter): Part
	{
		if (str_contains($part, '/')) {
			$stepParts = explode('/', $part, 2);
			$step = (int) $stepParts[1];
			assert((string) $step === $stepParts[1]);

			return new StepPart(
				$this->parseRangePart($stepParts[0], $interpreter),
				$step,
			);
		}

		if (str_contains($part, '-')) {
			return $this->parseRangePart($part, $interpreter);
		}

		return $this->parseValuePart($part, $interpreter);
	}

	private function parseRangePart(string $part, BasePartInterpreter $interpreter): RangePart
	{
		assert(str_contains($part, '-'));
		$range = explode('-', $part, 2);

		return new RangePart(
			$this->parseValuePart($range[0], $interpreter),
			$this->parseValuePart($range[1], $interpreter),
		);
	}

	private function parseValuePart(string $part, BasePartInterpreter $interpreter): ValuePart
	{
		$part = $interpreter->deduplicateValue($part);

		return new ValuePart($part);
	}

}
