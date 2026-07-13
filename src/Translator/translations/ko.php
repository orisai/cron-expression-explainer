<?php declare(strict_types = 1);

return [
	'parts-order' => 'timezone month date day-of-month day-of-week time hour minute second',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} 및 {lastValue}',
	'step-all-minute' => '{step}분마다',
	'step-all-hour' => '{step}시간마다',
	'step-all-day-of-week' => '매 {step}번째 요일',
	'step-all-day-of-month' => '{step}일마다',
	'step-all-month' => '{step}개월마다',
	'step-minute' => '{part} {step}분마다',
	'step-hour' => '{part} {step}시간마다',
	'step-day-of-week' => '{part} 매 {step}번째 요일',
	'step-day-of-month' => '{part} {step}일마다',
	'step-month' => '{part} {step}개월마다',
	'range-minute' => '{left}부터 {right}까지',
	'range-minute-named' => '매시 {left}부터 {right}까지',
	'range-hour' => '{left}부터 {right}까지',
	'range-hour-named' => '{left}부터 {right}까지',
	'range-day-of-week' => '{left}부터 {right}까지',
	'range-day-of-week-named' => '{left}부터 {right}까지',
	'range-day-of-month' => '{left}부터 {right}까지',
	'range-day-of-month-named' => '매월 {left}부터 {right}까지',
	'range-month' => '{left}부터 {right}까지',
	'range-month-named' => '{left}부터 {right}까지',
	'second' => '{second, plural,
      =1 {매초}
      other {#초마다}
    }',
	'before-second' => '{position, select, first {} other {, }}',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => '매분',
	'minute' => '{minute}분',
	'minute-named' => '매시 {minute}분',
	'before-hour' => '{position, select, first {} other { }}',
	'hour' => '{hour}시',
	'hour-named' => '{hour}시',
	'between-day-of-month-and-week' => ', 그리고',
	'before-day-of-week' => '{position, select, first {} other { }}',
	'day-of-week' => '{dayNumber, select,
      1 {월요일}
      2 {화요일}
      3 {수요일}
      4 {목요일}
      5 {금요일}
      6 {토요일}
      7 {일요일}
      other {{dayNumber} - unknown}
    }{context, select, value {에} other {}}',
	'day-of-week-nth' => '{nth}번째 {day}',
	'day-of-week-last' => '마지막 {day}',
	'before-day-of-month' => '{position, select, first {} other { }}',
	'day-of-month' => '{day}일',
	'day-of-month-named' => '매월 {day}일',
	'day-of-month-last-day' => '{context, select, value {매월 마지막 날에} other {마지막 날}}',
	'day-of-month-last-weekday' => '{context, select, value {매월 마지막 평일에} other {마지막 평일}}',
	'day-of-month-nearest-weekday' => '{day}일에 가장 가까운 평일{context, select, value {에} other {}}',
	'before-month' => '{position, select, first {} other { }}',
	'month' => '{month}월{context, select, value {에} other {}}',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => '{hourNumeric}:{minute}에',
	'before-date' => '{position, select, first {} other { }}',
	'day-of-month+month' => '{month}월 {day}일',
	'before-timezone' => '{position, select, first {} other { }}',
	'timezone' => '{tz} 시간대에서',
];
