<?php declare(strict_types = 1);

return [
	'parts-order' => 'timezone month date day-of-month day-of-week time hour minute second',
	'sentence-end' => '。',
	'listSeparator' => '、',
	'list' => '{values}和{lastValue}',
	'step-all-minute' => '每{step}分钟',
	'step-all-hour' => '每{step}小时',
	'step-all-day-of-week' => '一周中每{step}天',
	'step-all-day-of-month' => '每{step}天',
	'step-all-month' => '每{step}个月',
	'step-minute' => '每小时{part}之间每{step}分钟',
	'step-hour' => '{part}之间每{step}小时',
	'step-day-of-week' => '{part}之间每{step}天',
	'step-day-of-month' => '每月{part}之间每{step}天',
	'step-month' => '{part}之间每{step}个月',
	'range-minute' => '{left}至{right}',
	'range-minute-named' => '每小时{left}至{right}',
	'range-hour' => '{left}至{right}',
	'range-hour-named' => '{left}至{right}',
	'range-day-of-week' => '{left}至{right}',
	'range-day-of-week-named' => '{left}至{right}',
	'range-day-of-month' => '{left}至{right}',
	'range-day-of-month-named' => '每月{left}至{right}',
	'range-month' => '{left}至{right}',
	'range-month-named' => '{left}至{right}',
	'second' => '{second, plural,
      =1 {每秒}
      other {每#秒}
    }',
	'before-second' => '',
	'before-minute' => '',
	'every-minute' => '每分钟',
	'minute' => '第{minute}分钟',
	'minute-named' => '每小时第{minute}分钟',
	'before-hour' => '',
	'hour' => '{hour}点',
	'hour-named' => '{hour}点',
	'between-day-of-month-and-week' => '以及',
	'before-day-of-week' => '',
	'day-of-week' => '{dayNumber, select,
      1 {星期一}
      2 {星期二}
      3 {星期三}
      4 {星期四}
      5 {星期五}
      6 {星期六}
      7 {星期日}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '第{nth}个{day}',
	'day-of-week-last' => '最后一个{day}',
	'before-day-of-month' => '',
	'day-of-month' => '{day}日',
	'day-of-month-named' => '每月{day}日',
	'day-of-month-last-day' => '{context, select,
      range {最后一天}
      other {每月最后一天}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {最后一个工作日}
      other {每月最后一个工作日}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {离{day}日最近的工作日}
      other {每月离{day}日最近的工作日}
    }',
	'before-month' => '',
	'month' => '{month}月',
	'before-time' => '{previous, select, none {每天} timezone {每天} month {每天} other {}}',
	'hour+minute' => '{hourNumeric}:{minute}',
	'before-date' => '',
	'day-of-month+month' => '{month}月{day}日',
	'before-timezone' => '',
	'timezone' => '在{tz}时区',
];
