<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} and {lastValue}',
	'step-all-minute' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } minute',
	'step-all-hour' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } hour',
	'step-all-day-of-week' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } day of the week',
	'step-all-day-of-month' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } day of the month',
	'step-all-month' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } month',
	'step-minute' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } minute {part}',
	'step-hour' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } hour {part}',
	'step-day-of-week' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } day of the week {part}',
	'step-day-of-month' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } day of the month {part}',
	'step-month' => 'every {step, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } month {part}',
	'range-minute' => 'from {left} through {right}',
	'range-minute-named' => 'every minute from {left} through {right}',
	'range-hour' => 'from {left} through {right}',
	'range-hour-named' => 'every hour from {left} through {right}',
	'range-day-of-week' => 'from {left} through {right}',
	'range-day-of-week-named' => 'every day of the week from {left} through {right}',
	'range-day-of-month' => 'from {left} through {right}',
	'range-day-of-month-named' => 'every day of the month from {left} through {right}',
	'range-month' => 'from {left} through {right}',
	'range-month-named' => 'every month from {left} through {right}',
	'second' => 'at every {second, plural,
      one {second}
      other {# seconds}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {at } other { at }}',
	'every-minute' => 'every minute',
	'minute' => '{minute}',
	'minute-named' => 'minute {minute}',
	'before-hour' => ' past ',
	'hour' => '{hour}',
	'hour-named' => 'hour {hour}',
	'between-day-of-month-and-week' => ' and',
	'before-day-of-week' => ' on ',
	'day-of-week' => '{dayNumber, select,
      1 {Monday}
      2 {Tuesday}
      3 {Wednesday}
      4 {Thursday}
      5 {Friday}
      6 {Saturday}
      7 {Sunday}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{nth, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
	} {day}',
	'day-of-week-last' => 'the last {day}',
	'before-day-of-month' => ' on ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'day {day}',
	'day-of-month-last-day' => 'the last day of the month',
	'day-of-month-last-weekday' => 'the last weekday of the month',
	'day-of-month-nearest-weekday' => 'the weekday nearest to the {day, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    }',
	'before-month' => ' in ',
	'month' => '{month, select,
      1 {January}
      2 {February}
      3 {March}
      4 {April}
      5 {May}
      6 {June}
      7 {July}
      8 {August}
      9 {September}
      10 {October}
      11 {November}
      12 {December}
      other {{month} - unknown}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => 'at {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => 'on {day, selectordinal,
      one {#st}
      two {#nd}
      few {#rd}
      other {#th}
    } of {month, select,
      1 {January}
      2 {February}
      3 {March}
      4 {April}
      5 {May}
      6 {June}
      7 {July}
      8 {August}
      9 {September}
      10 {October}
      11 {November}
      12 {December}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'in {tz} time zone',
];
