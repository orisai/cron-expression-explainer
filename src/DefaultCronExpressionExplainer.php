<?php declare(strict_types = 1);

namespace Orisai\CronExpressionExplainer;

use Cron\CronExpression;
use DateTimeZone;
use InvalidArgumentException;
use Orisai\CronExpressionExplainer\Exception\InvalidExpression;
use Orisai\CronExpressionExplainer\Interpreter\DayOfMonthInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\DayOfWeekInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\HourInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MinuteInterpreter;
use Orisai\CronExpressionExplainer\Interpreter\MonthInterpreter;
use Orisai\CronExpressionExplainer\Part\PartParser;
use Orisai\CronExpressionExplainer\Part\ValuePart;
use function assert;
use function is_numeric;
use function str_pad;
use const STR_PAD_LEFT;

final class DefaultCronExpressionExplainer implements CronExpressionExplainer
{

	private PartParser $parser;

	private MinuteInterpreter $minuteInterpreter;

	private HourInterpreter $hourInterpreter;

	private DayOfMonthInterpreter $dayOfMonthInterpreter;

	private MonthInterpreter $monthInterpreter;

	private DayOfWeekInterpreter $dayOfWeekInterpreter;

	public function __construct()
	{
		$this->parser = new PartParser();
		$this->minuteInterpreter = new MinuteInterpreter();
		$this->hourInterpreter = new HourInterpreter();
		$this->dayOfMonthInterpreter = new DayOfMonthInterpreter();
		$this->monthInterpreter = new MonthInterpreter();
		$this->dayOfWeekInterpreter = new DayOfWeekInterpreter();
	}

	public function explain(string $expression, ?int $repeatSeconds = null, ?DateTimeZone $timeZone = null): string
	{
		try {
			$expr = new CronExpression($expression);
		} catch (InvalidArgumentException $exception) {
			throw new InvalidExpression($exception->getMessage(), $exception);
		}

		$repeatSeconds ??= 0;
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

		$minutePart = $this->parser->parsePart($minute, $this->minuteInterpreter);
		$hourPart = $this->parser->parsePart($hour, $this->hourInterpreter);
		$dayOfMonthPart = $this->parser->parsePart($dayOfMonth, $this->dayOfMonthInterpreter);
		$monthPart = $this->parser->parsePart($month, $this->monthInterpreter);
		$dayOfWeekPart = $this->parser->parsePart($dayOfWeek, $this->dayOfWeekInterpreter);

		$explanation = 'At ';
		$secondsExplanation = $this->explainSeconds($repeatSeconds);
		if ($secondsExplanation !== '') {
			$explanation .= $secondsExplanation;
		}

		if (
			$minutePart instanceof ValuePart
			&& $hourPart instanceof ValuePart
			&& is_numeric($minutePartValue = $minutePart->getValue())
			&& is_numeric($hourPartValue = $hourPart->getValue())
		) {
			if ($secondsExplanation !== '') {
				$explanation .= ' at ';
			}

			$this->hourInterpreter->assertValueInRange($hourPartValue);
			$this->minuteInterpreter->assertValueInRange($minutePartValue);

			$explanation .= str_pad($hourPartValue, 2, '0', STR_PAD_LEFT)
				. ':'
				. str_pad($minutePartValue, 2, '0', STR_PAD_LEFT);
		} else {
			if (!($repeatSeconds > 0 && $minutePart instanceof ValuePart && $minutePart->getValue() === '*')) {
				if ($secondsExplanation !== '') {
					$explanation .= ' at ';
				}

				$explanation .= $this->minuteInterpreter->explainPart($minutePart);
			}

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

		if ($timeZone !== null) {
			$explanation .= " in {$timeZone->getName()} time zone";
		}

		return $explanation . '.';
	}

	/**
	 * @param int<0, 59> $repeatSeconds
	 */
	private function explainSeconds(int $repeatSeconds): string
	{
		if ($repeatSeconds <= 0) {
			return '';
		}

		if ($repeatSeconds === 1) {
			return 'every second';
		}

		return "every $repeatSeconds seconds";
	}

}
