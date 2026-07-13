<?php declare(strict_types = 1);

return [
	'parts-order' => 'timezone month date day-of-month day-of-week time hour minute second',
	'sentence-end' => '。',
	'listSeparator' => '、',
	'list' => '{values}と{lastValue}',
	'step-all-minute' => '{step}分ごとに',
	'step-all-hour' => '{step}時間ごと',
	'step-all-day-of-week' => '週の{step}日ごと',
	'step-all-day-of-month' => '{step}日ごと',
	'step-all-month' => '{step}か月ごと',
	'step-minute' => '{part}の{step}分ごとに',
	'step-hour' => '{part}の{step}時間ごと',
	'step-day-of-week' => '{part}の{step}日ごと',
	'step-day-of-month' => '{part}の{step}日ごと',
	'step-month' => '{part}の{step}か月ごと',
	'range-minute' => '{left}から{right}まで',
	'range-minute-named' => '{left}から{right}までの毎分',
	'range-hour' => '{left}から{right}まで',
	'range-hour-named' => '{left}から{right}までの間',
	'range-day-of-week' => '{left}から{right}まで',
	'range-day-of-week-named' => '{left}から{right}までの間',
	'range-day-of-month' => '{left}から{right}まで',
	'range-day-of-month-named' => '{left}から{right}までの間',
	'range-month' => '{left}から{right}まで',
	'range-month-named' => '{left}から{right}までの間',
	'second' => '{second, plural,
      =1 {毎秒}
      other {#秒ごとに}
    }',
	'before-second' => '{position, select, first {} other {、}}',
	'before-minute' => '{position, select, first {} other {に}}',
	'every-minute' => '毎分',
	'minute' => '{minute}分',
	'minute-named' => '毎時{minute}分',
	'before-hour' => '{position, select, first {} other {の}}',
	'hour' => '{hour}時台',
	'hour-named' => '{hour}時台',
	'between-day-of-month-and-week' => 'と',
	'before-day-of-week' => '',
	'day-of-week' => '{dayNumber, select,
      1 {月曜日}
      2 {火曜日}
      3 {水曜日}
      4 {木曜日}
      5 {金曜日}
      6 {土曜日}
      7 {日曜日}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '第{nth}{day}',
	'day-of-week-last' => '最終{day}',
	'before-day-of-month' => '{position, select, first {} other {の}}',
	'day-of-month' => '{day}日',
	'day-of-month-named' => '毎月{day}日',
	'day-of-month-last-day' => '月の最終日',
	'day-of-month-last-weekday' => '月の最終平日',
	'day-of-month-nearest-weekday' => '{day}日に最も近い平日',
	'before-month' => '{position, select, first {} other {の}}',
	'month' => '{month}月',
	'before-time' => '{position, select, first {} other {の}}',
	'hour+minute' => '{hourNumeric}:{minute}に',
	'before-date' => '{position, select, first {} other {の}}',
	'day-of-month+month' => '{month}月{day}日',
	'before-timezone' => '',
	'timezone' => '{tz}タイムゾーンでの時刻',
];
