<?php declare(strict_types = 1);

namespace Tests\Orisai\CronExpressionExplainer\Unit;

use Cron\DayOfMonthField;
use DateTimeZone;
use Generator;
use Orisai\CronExpressionExplainer\DefaultCronExpressionExplainer;
use Orisai\CronExpressionExplainer\Exception\UnsupportedExpression;
use Orisai\CronExpressionExplainer\Exception\UnsupportedLocale;
use PHPUnit\Framework\TestCase;

final class DefaultCronExpressionExplainerTest extends TestCase
{

	/**
	 * @dataProvider provideExplainMinutes
	 * @dataProvider provideExplainHours
	 * @dataProvider provideExplainHoursAndMinutes
	 * @dataProvider provideExplainDaysOfMonth
	 * @dataProvider provideExplainDaysOfWeek
	 * @dataProvider provideExplainMonths
	 * @dataProvider provideExplainDayOfMonthAndMonth
	 * @dataProvider provideExplainAllValuesCombinations
	 * @dataProvider provideExplainOthers
	 */
	public function testExplain(string $expression, string $explanation): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			$explanation,
			$explainer->explain($expression),
		);
	}

	public function provideExplainMinutes(): Generator
	{
		yield [
			'* * * * *',
			'At every minute.',
		];

		yield [
			'0 * * * *',
			'At minute 0.',
		];

		yield [
			'59 * * * *',
			'At minute 59.',
		];

		yield [
			'01 * * * *',
			'At minute 1.',
		];

		yield [
			'@hourly',
			'At minute 0.',
		];

		yield [
			'1,2,3 * * * *',
			'At minutes 1, 2 and 3.',
		];

		yield [
			'0-59 * * * *',
			'At every minute from 0 through 59.',
		];

		yield [
			'1-59 * * * *',
			'At every minute from 1 through 59.',
		];

		yield [
			'0-58 * * * *',
			'At every minute from 0 through 58.',
		];

		yield [
			'1-30 * * * *',
			'At every minute from 1 through 30.',
		];

		yield [
			'1-15,31-45 * * * *',
			'At every minute from 1 through 15 and from 31 through 45.',
		];

		yield [
			'*/30 * * * *',
			'At every 30th minute.',
		];

		yield [
			'1-30/1 * * * *',
			'At every minute from 1 through 30.',
		];

		yield [
			'1-30/2 * * * *',
			'At every 2nd minute from 1 through 30.',
		];

		yield [
			'1-30/3 * * * *',
			'At every 3rd minute from 1 through 30.',
		];

		yield [
			'1-30/4 * * * *',
			'At every 4th minute from 1 through 30.',
		];

		yield [
			'1-30/5 * * * *',
			'At every 5th minute from 1 through 30.',
		];

		yield [
			'0-59/1 * * * *',
			'At every minute from 0 through 59.',
		];

		yield [
			'0,1-30/2 * * * *',
			'At minute 0 and every 2nd minute from 1 through 30.',
		];

		yield [
			'1-30/2,40 * * * *',
			'At every 2nd minute from 1 through 30 and 40.',
		];

		yield [
			'1-30/2,40,41,42,45-50,51,52 * * * *',
			'At every 2nd minute from 1 through 30, 40, 41, 42, from 45 through 50, 51 and 52.',
		];

		yield [
			'1-10/2,15,20-25 * * * *',
			'At every 2nd minute from 1 through 10, 15 and from 20 through 25.',
		];
	}

	public function provideExplainHours(): Generator
	{
		yield [
			'* 0 * * *',
			'At every minute past hour 0.',
		];

		yield [
			'* 23 * * *',
			'At every minute past hour 23.',
		];

		yield [
			'* 01 * * *',
			'At every minute past hour 1.',
		];

		yield [
			'* 1,2,3 * * *',
			'At every minute past hours 1, 2 and 3.',
		];

		yield [
			'* 0-23 * * *',
			'At every minute past every hour from 0 through 23.',
		];

		yield [
			'* 1-23 * * *',
			'At every minute past every hour from 1 through 23.',
		];

		yield [
			'* 0-22 * * *',
			'At every minute past every hour from 0 through 22.',
		];

		yield [
			'* 0-10 * * *',
			'At every minute past every hour from 0 through 10.',
		];

		yield [
			'* 1-5,11-15 * * *',
			'At every minute past every hour from 1 through 5 and from 11 through 15.',
		];

		yield [
			'* */2 * * *',
			'At every minute past every 2nd hour.',
		];

		yield [
			'* 1-10/1 * * *',
			'At every minute past every hour from 1 through 10.',
		];

		yield [
			'* 1-10/2 * * *',
			'At every minute past every 2nd hour from 1 through 10.',
		];

		yield [
			'* 1-10/3 * * *',
			'At every minute past every 3rd hour from 1 through 10.',
		];

		yield [
			'* 1-10/4 * * *',
			'At every minute past every 4th hour from 1 through 10.',
		];

		yield [
			'* 1-10/5 * * *',
			'At every minute past every 5th hour from 1 through 10.',
		];

		yield [
			'* 0-23/1 * * *',
			'At every minute past every hour from 0 through 23.',
		];

		yield [
			'* 0,1-10/2 * * *',
			'At every minute past hour 0 and every 2nd hour from 1 through 10.',
		];

		yield [
			'* 1-10/2,20 * * *',
			'At every minute past every 2nd hour from 1 through 10 and 20.',
		];

		yield [
			'* 1-5/2,6,7,8,10-12,13,14 * * *',
			'At every minute past every 2nd hour from 1 through 5, 6, 7, 8, from 10 through 12, 13 and 14.',
		];

		yield [
			'* 1-5/2,10,15-20 * * *',
			'At every minute past every 2nd hour from 1 through 5, 10 and from 15 through 20.',
		];
	}

	public function provideExplainHoursAndMinutes(): Generator
	{
		yield [
			'@daily',
			'At 00:00.',
		];

		yield [
			'@midnight',
			'At 00:00.',
		];

		yield [
			'0 0 * * *',
			'At 00:00.',
		];

		yield [
			'000 000 * * *',
			'At 00:00.',
		];

		yield [
			'10 0 * * *',
			'At 00:10.',
		];

		yield [
			'0 10 * * *',
			'At 10:00.',
		];

		yield [
			'01 02 * * *',
			'At 02:01.',
		];

		yield [
			'10 0-23 * * *',
			'At minute 10 past every hour from 0 through 23.',
		];
	}

	public function provideExplainDaysOfMonth(): Generator
	{
		yield [
			'* * 1 * *',
			'At every minute on the 1st day of the month.',
		];

		yield [
			'* * 31 * *',
			'At every minute on the 31st day of the month.',
		];

		yield [
			'* * 01 * *',
			'At every minute on the 1st day of the month.',
		];

		yield [
			'* * 1,2,3 * *',
			'At every minute on the 1st, 2nd and 3rd day of the month.',
		];

		yield [
			'* * 1-31 * *',
			'At every minute on every day of the month from 1 through 31.',
		];

		yield [
			'* * 2-31 * *',
			'At every minute on every day of the month from 2 through 31.',
		];

		yield [
			'* * 1-30 * *',
			'At every minute on every day of the month from 1 through 30.',
		];

		yield [
			'* * 1-10 * *',
			'At every minute on every day of the month from 1 through 10.',
		];

		yield [
			'* * 1-5,11-15 * *',
			'At every minute on every day of the month from 1 through 5 and from 11 through 15.',
		];

		yield [
			'* * */2 * *',
			'At every minute on every 2nd day of the month.',
		];

		yield [
			'* * 1-10/1 * *',
			'At every minute on every day of the month from 1 through 10.',
		];

		yield [
			'* * 1-10/2 * *',
			'At every minute on every 2nd day of the month from 1 through 10.',
		];

		yield [
			'* * 1-10/3 * *',
			'At every minute on every 3rd day of the month from 1 through 10.',
		];

		yield [
			'* * 1-10/4 * *',
			'At every minute on every 4th day of the month from 1 through 10.',
		];

		yield [
			'* * 1-10/5 * *',
			'At every minute on every 5th day of the month from 1 through 10.',
		];

		yield [
			'* * 1-31/1 * *',
			'At every minute on every day of the month from 1 through 31.',
		];

		yield [
			'* * 1,2-11/2 * *',
			'At every minute on day 1 and every 2nd day of the month from 2 through 11.',
		];

		yield [
			'* * 1-10/2,20 * *',
			'At every minute on every 2nd day of the month from 1 through 10 and 20.',
		];

		yield [
			'* * 1-10/2,11,12,13,15-20,21,22 * *',
			'At every minute on every 2nd day of the month from 1 through 10, 11, 12, 13, from 15 through 20, 21 and 22.',
		];

		yield [
			'* * 1-10/2,15,20-25 * *',
			'At every minute on every 2nd day of the month from 1 through 10, 15 and from 20 through 25.',
		];

		yield [
			'* * 1W * *',
			'At every minute on the weekday nearest to the 1st.',
		];

		yield [
			'* * 15W * *',
			'At every minute on the weekday nearest to the 15th.',
		];

		yield [
			'* * L * *',
			'At every minute on the last day of the month.',
		];

		yield [
			'* * LW * *',
			'At every minute on the last weekday of the month.',
		];

		yield [
			'* * ? * *',
			'At every minute.',
		];
	}

	public function provideExplainDaysOfWeek(): Generator
	{
		yield [
			'* * * * 0',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * 00',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * 7',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * SUN',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * sun',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * Sun',
			'At every minute on Sunday.',
		];

		yield [
			'* * * * 1',
			'At every minute on Monday.',
		];

		yield [
			'* * * * MON',
			'At every minute on Monday.',
		];

		yield [
			'* * * * 2',
			'At every minute on Tuesday.',
		];

		yield [
			'* * * * TUE',
			'At every minute on Tuesday.',
		];

		yield [
			'* * * * 3',
			'At every minute on Wednesday.',
		];

		yield [
			'* * * * WED',
			'At every minute on Wednesday.',
		];

		yield [
			'* * * * 4',
			'At every minute on Thursday.',
		];

		yield [
			'* * * * THU',
			'At every minute on Thursday.',
		];

		yield [
			'* * * * 5',
			'At every minute on Friday.',
		];

		yield [
			'* * * * FRI',
			'At every minute on Friday.',
		];

		yield [
			'* * * * 6',
			'At every minute on Saturday.',
		];

		yield [
			'* * * * SAT',
			'At every minute on Saturday.',
		];

		yield [
			'* * * * 1,2,3',
			'At every minute on Monday, Tuesday and Wednesday.',
		];

		yield [
			'* * * * MON,TUE,WED',
			'At every minute on Monday, Tuesday and Wednesday.',
		];

		yield [
			'* * * * MON,2,WED',
			'At every minute on Monday, Tuesday and Wednesday.',
		];

		yield [
			'* * * * 0-6',
			'At every minute on every day of the week from Sunday through Saturday.',
		];

		yield [
			'* * * * SUN-SAT',
			'At every minute on every day of the week from Sunday through Saturday.',
		];

		yield [
			'* * * * SUN-6',
			'At every minute on every day of the week from Sunday through Saturday.',
		];

		yield [
			'* * * * MON-SAT',
			'At every minute on every day of the week from Monday through Saturday.',
		];

		yield [
			'* * * * 0-5',
			'At every minute on every day of the week from Sunday through Friday.',
		];

		yield [
			'* * * * 0-3',
			'At every minute on every day of the week from Sunday through Wednesday.',
		];

		yield [
			'* * * * 0-2,4-6',
			'At every minute on every day of the week from Sunday through Tuesday and from Thursday through Saturday.',
		];

		yield [
			'* * * * */2',
			'At every minute on every 2nd day of the week.',
		];

		yield [
			'* * * * 2-4/1',
			'At every minute on every day of the week from Tuesday through Thursday.',
		];

		yield [
			'* * * * 2-4/2',
			'At every minute on every 2nd day of the week from Tuesday through Thursday.',
		];

		yield [
			'* * * * 2-4/3',
			'At every minute on every 3rd day of the week from Tuesday through Thursday.',
		];

		yield [
			'* * * * 2-4/4',
			'At every minute on every 4th day of the week from Tuesday through Thursday.',
		];

		yield [
			'* * * * 2-4/5',
			'At every minute on every 5th day of the week from Tuesday through Thursday.',
		];

		yield [
			'* * * * 1-2/2,4',
			'At every minute on every 2nd day of the week from Monday through Tuesday and Thursday.',
		];

		yield [
			'* * * * 0-2,3,4,5-6',
			'At every minute on every day of the week from Sunday through Tuesday, Wednesday, Thursday and from Friday through Saturday.',
		];

		yield [
			'* * * * 0-1/2,3,4-5',
			'At every minute on every 2nd day of the week from Sunday through Monday, Wednesday and from Thursday through Friday.',
		];

		yield [
			'* * * * SUN#1',
			'At every minute on 1st Sunday.',
		];

		yield [
			'* * * * SUN#5',
			'At every minute on 5th Sunday.',
		];

		yield [
			'* * * * 7#1',
			'At every minute on 1st Sunday.',
		];

		yield [
			'* * * * 7#5',
			'At every minute on 5th Sunday.',
		];

		yield [
			'* * * * 7L',
			'At every minute on the last Sunday.',
		];

		yield [
			'* * * * SUNL',
			'At every minute on the last Sunday.',
		];

		yield [
			'* * * * ?',
			'At every minute.',
		];

		yield [
			'* * * * 7L,4',
			'At every minute on the last Sunday and Thursday.',
		];

		yield [
			'* * * * 7L,4L',
			'At every minute on the last Sunday and the last Thursday.',
		];

		// Impossible?
		yield [
			'* * * * 7L-4',
			'At every minute on every day of the week from the last Sunday through Thursday.',
		];

		// Impossible?
		yield [
			'* * * * 7L-4L',
			'At every minute on every day of the week from the last Sunday through the last Thursday.',
		];

		yield [
			'* * * * 7#5,3',
			'At every minute on 5th Sunday and Wednesday.',
		];

		// Impossible?
		yield [
			'* * * * 7#5-3',
			'At every minute on every day of the week from 5th Sunday through Wednesday.',
		];

		// Impossible?
		yield [
			'* * * * 3-7#5',
			'At every minute on every day of the week from Wednesday through 5th Sunday.',
		];

		yield [
			'* * * * 7#5,3#3',
			'At every minute on 5th Sunday and 3rd Wednesday.',
		];

		// Impossible?
		yield [
			'* * * * 3#3-7#5',
			'At every minute on every day of the week from 3rd Wednesday through 5th Sunday.',
		];
	}

	public function provideExplainMonths(): Generator
	{
		yield [
			'* * * 1 *',
			'At every minute in January.',
		];

		yield [
			'* * * 01 *',
			'At every minute in January.',
		];

		yield [
			'* * * JAN *',
			'At every minute in January.',
		];

		yield [
			'* * * jan *',
			'At every minute in January.',
		];

		yield [
			'* * * Jan *',
			'At every minute in January.',
		];

		yield [
			'* * * 2 *',
			'At every minute in February.',
		];

		yield [
			'* * * FEB *',
			'At every minute in February.',
		];

		yield [
			'* * * 3 *',
			'At every minute in March.',
		];

		yield [
			'* * * MAR *',
			'At every minute in March.',
		];

		yield [
			'* * * 4 *',
			'At every minute in April.',
		];

		yield [
			'* * * APR *',
			'At every minute in April.',
		];

		yield [
			'* * * 5 *',
			'At every minute in May.',
		];

		yield [
			'* * * MAY *',
			'At every minute in May.',
		];

		yield [
			'* * * 6 *',
			'At every minute in June.',
		];

		yield [
			'* * * JUN *',
			'At every minute in June.',
		];

		yield [
			'* * * 7 *',
			'At every minute in July.',
		];

		yield [
			'* * * JUL *',
			'At every minute in July.',
		];

		yield [
			'* * * 8 *',
			'At every minute in August.',
		];

		yield [
			'* * * AUG *',
			'At every minute in August.',
		];

		yield [
			'* * * 9 *',
			'At every minute in September.',
		];

		yield [
			'* * * SEP *',
			'At every minute in September.',
		];

		yield [
			'* * * 10 *',
			'At every minute in October.',
		];

		yield [
			'* * * OCT *',
			'At every minute in October.',
		];

		yield [
			'* * * 11 *',
			'At every minute in November.',
		];

		yield [
			'* * * NOV *',
			'At every minute in November.',
		];

		yield [
			'* * * 12 *',
			'At every minute in December.',
		];

		yield [
			'* * * DEC *',
			'At every minute in December.',
		];

		yield [
			'* * * 1,2,3 *',
			'At every minute in January, February and March.',
		];

		yield [
			'* * * JAN,FEB,MAR *',
			'At every minute in January, February and March.',
		];

		yield [
			'* * * 1-12 *',
			'At every minute in every month from January through December.',
		];

		yield [
			'* * * JAN-DEC *',
			'At every minute in every month from January through December.',
		];

		yield [
			'* * * 1-11 *',
			'At every minute in every month from January through November.',
		];

		yield [
			'* * * JAN-NOV *',
			'At every minute in every month from January through November.',
		];

		yield [
			'* * * 2-12 *',
			'At every minute in every month from February through December.',
		];

		yield [
			'* * * 1-3,5-7 *',
			'At every minute in every month from January through March and from May through July.',
		];

		yield [
			'* * * */2 *',
			'At every minute in every 2nd month.',
		];

		yield [
			'* * * 2-4/1 *',
			'At every minute in every month from February through April.',
		];

		yield [
			'* * * 2-4/2 *',
			'At every minute in every 2nd month from February through April.',
		];

		yield [
			'* * * 2-4/3 *',
			'At every minute in every 3rd month from February through April.',
		];

		yield [
			'* * * 2-4/4 *',
			'At every minute in every 4th month from February through April.',
		];

		yield [
			'* * * 2-4/5 *',
			'At every minute in every 5th month from February through April.',
		];

		yield [
			'* * * JAN-DEC/2 *',
			'At every minute in every 2nd month from January through December.',
		];

		yield [
			'* * * JAN-12/2 *',
			'At every minute in every 2nd month from January through December.',
		];

		yield [
			'* * * 1-DEC/2 *',
			'At every minute in every 2nd month from January through December.',
		];

		yield [
			'* * * 1-2/2,4 *',
			'At every minute in every 2nd month from January through February and April.',
		];

		yield [
			'* * * 1-2,3,4,5-6 *',
			'At every minute in every month from January through February, March, April and from May through June.',
		];

		yield [
			'* * * 1-2/2,3,4-5 *',
			'At every minute in every 2nd month from January through February, March and from April through May.',
		];
	}

	public function provideExplainDayOfMonthAndMonth(): Generator
	{
		yield [
			'* * 1 2 *',
			'At every minute on 1st of February.',
		];

		yield [
			'* * 2 2 *',
			'At every minute on 2nd of February.',
		];

		yield [
			'* * 3 2 *',
			'At every minute on 3rd of February.',
		];

		yield [
			'* * 3 FEB *',
			'At every minute on 3rd of February.',
		];

		yield [
			'* * 4 2 *',
			'At every minute on 4th of February.',
		];
	}

	public function provideExplainAllValuesCombinations(): Generator
	{
		yield [
			'1,* 1,* 1,* 1,* 1,*',
			'At every minute.',
		];

		yield [
			'*,1 *,1 *,1 *,1 *,1',
			'At every minute.',
		];

		yield [
			'1,*/1 1,*/1 1,*/1 1,*/1 1,*/1',
			'At every minute.',
		];

		yield [
			'* * 1,? * 1,?',
			'At every minute.',
		];

		yield [
			'* * ?,1 * ?,1',
			'At every minute.',
		];

		yield [
			'* * 1,?/1 * 1,?/1',
			'At every minute.',
		];

		yield [
			'* * 1-? * 1-?',
			'At every minute.',
		];

		yield [
			'* * ?-1 * ?-1',
			'At every minute.',
		];

		yield [
			'* * 1-?/1 * 1-?/1',
			'At every minute.',
		];

		yield [
			'* * ?-1/1 * ?-1/1',
			'At every minute.',
		];
	}

	public function provideExplainOthers(): Generator
	{
		yield [
			'0-59 0-23 1-31 1-12 0-6',
			'At every minute from 0 through 59 past every hour from 0 through 23 on every day of the month from 1 through 31'
			. ' and on every day of the week from Sunday through Saturday in every month from January through December.',
		];

		yield [
			'@weekly',
			'At 00:00 on Sunday.',
		];

		yield [
			'@monthly',
			'At 00:00 on the 1st day of the month.',
		];

		yield [
			'@annually',
			'At 00:00 on 1st of January.',
		];

		yield [
			'@yearly',
			'At 00:00 on 1st of January.',
		];

		yield [
			'30 10 1 2 *',
			'At 10:30 on 1st of February.',
		];

		yield [
			'* * 1 * 1',
			'At every minute on the 1st day of the month and on Monday.',
		];

		yield [
			'* * 1 * 1,2',
			'At every minute on the 1st day of the month and on Monday and Tuesday.',
		];

		yield [
			'* * 1 2 5',
			'At every minute on the 1st day of the month and on Friday in February.',
		];

		yield [
			'1 1 1 1 1',
			'At 01:01 on the 1st day of the month and on Monday in January.',
		];

		yield [
			'1-2 1-2 1-2 1-2 1-2',
			'At every minute from 1 through 2 past every hour from 1 through 2 on every day of the month from 1 through 2'
			. ' and on every day of the week from Monday through Tuesday in every month from January through February.',
		];

		// Are invalid
		//	*,1/1 *,1/1 *,1/1 *,1/1 *,1/1
		//	1-* 1-* 1-* 1-* 1-*
		//	*-1 *-1 *-1 *-1 *-1
		//	1-*/1 1-*/1 1-*/1 1-*/1 1-*/1
		//	*-1/1 *-1/1 *-1/1 *-1/1 *-1/1

		// Are impossible and not officially supported
		//	* * * * 7L/2
		//	* * * * 7#5/2
		//	* * 1W/2 * *
		//	* * 1W-5W/2 * *

		// Perhaps possible, but are not supported
		/** @see DayOfMonthField */
		//	* * 1W-2W * *'
		//	* * 3W-15 * *'
		//	* * 4-L * *'
		//	* * 15W-LW * *'
	}

	/**
	 * @param int<0, 59> $repeatSeconds
	 *
	 * @dataProvider provideExplainSeconds
	 */
	public function testExplainSeconds(string $expression, int $repeatSeconds, string $explanation): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			$explanation,
			$explainer->explain($expression, $repeatSeconds),
		);
	}

	public function provideExplainSeconds(): Generator
	{
		yield [
			'* * * * *',
			0,
			'At every minute.',
		];

		yield [
			'* * * * *',
			1,
			'At every second.',
		];

		yield [
			'* * * * *',
			2,
			'At every 2 seconds.',
		];

		yield [
			'* * * * *',
			59,
			'At every 59 seconds.',
		];

		yield [
			'*/1 * * * *',
			59,
			'At every 59 seconds.',
		];

		yield [
			'1 * * * *',
			59,
			'At every 59 seconds at minute 1.',
		];

		yield [
			'30 10 * * *',
			59,
			'At every 59 seconds at 10:30.',
		];

		yield [
			'* * 1 * *',
			59,
			'At every 59 seconds on the 1st day of the month.',
		];
	}

	/**
	 * @dataProvider provideTimeZone
	 */
	public function testTimeZone(string $expression, DateTimeZone $timeZone, string $explanation): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			$explanation,
			$explainer->explain($expression, null, $timeZone),
		);
	}

	public function provideTimeZone(): Generator
	{
		yield [
			'* 12 * * *',
			new DateTimeZone('Europe/Prague'),
			'At every minute past hour 12 in Europe/Prague time zone.',
		];

		yield [
			'30 10 * * *',
			new DateTimeZone('America/New_York'),
			'At 10:30 in America/New_York time zone.',
		];
	}

	public function testInvalidExpression(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		$this->expectException(UnsupportedExpression::class);
		$this->expectExceptionMessage('invalid is not a valid CRON expression');

		$explainer->explain('invalid');
	}

	public function testTranslate(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			'At every minute.',
			$explainer->explain('* * * * *', null, null, 'en'),
		);
	}

	public function testSupportedLocales(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			[
				'cs' => 'czech',
				'de' => 'german',
				'en' => 'english',
				'es' => 'spanish',
				'fr' => 'french',
				'it' => 'italian',
				'ja' => 'japanese',
				'ko' => 'korean',
				'nl' => 'dutch',
				'pl' => 'polish',
				'pt' => 'portuguese',
				'ru' => 'russian',
				'sk' => 'slovak',
				'tr' => 'turkish',
				'uk' => 'ukrainian',
				'zh' => 'chinese',
			],
			$explainer->getSupportedLocales(),
		);
	}

	public function testNotSupportedLocale(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		$exception = null;
		try {
			$explainer->explain('* * * * *', null, null, 'nope');
		} catch (UnsupportedLocale $exception) {
			// Bellow
		}

		self::assertNotNull($exception);
		self::assertSame('nope', $exception->getLocale());
	}

	public function testDefaultLocale(): void
	{
		$explainer = new DefaultCronExpressionExplainer();
		self::assertSame('At every minute.', $explainer->explain('* * * * *'));

		$explainer->setDefaultLocale('cs');
		self::assertSame('Každou minutu.', $explainer->explain('* * * * *'));
	}

	public function testExplainInLocales(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		self::assertSame(
			[],
			$explainer->explainInLocales([], '* * * * *'),
		);

		self::assertSame(
			[
				'cs' => 'Každou minutu.',
				'en' => 'At every minute.',
			],
			$explainer->explainInLocales(['cs', 'en'], '* * * * *'),
		);

		self::assertSame(
			[
				'en' => 'At every minute.',
				'cs' => 'Každou minutu.',
			],
			$explainer->explainInLocales(['en', 'cs'], '* * * * *'),
		);

		self::assertSame(
			[
				'en' => 'At every second.',
				'cs' => 'Každou sekundu.',
			],
			$explainer->explainInLocales(['en', 'cs'], '* * * * *', 1),
		);

		self::assertSame(
			[
				'en' => 'At every minute in Europe/Prague time zone.',
				'cs' => 'Každou minutu v časové zóně Europe/Prague.',
			],
			$explainer->explainInLocales(['en', 'cs'], '* * * * *', null, new DateTimeZone('Europe/Prague')),
		);
	}

	public function testExplainInLocaleUnsupportedLocale(): void
	{
		$explainer = new DefaultCronExpressionExplainer();

		$this->expectException(UnsupportedLocale::class);
		$explainer->explainInLocales(['unknown'], '* * * * *');
	}

}
