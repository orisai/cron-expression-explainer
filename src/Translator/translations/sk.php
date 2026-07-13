<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} a {lastValue}',
	'step-all-minute' => 'každú {step}. minútu',
	'step-all-hour' => 'každú {step}. hodinu',
	'step-all-day-of-week' => 'každý {step}. deň v týždni',
	'step-all-day-of-month' => 'každý {step}. deň v mesiaci',
	'step-all-month' => 'každý {step}. mesiac',
	'step-minute' => 'každú {step}. minútu {part}',
	'step-hour' => 'každú {step}. hodinu {part}',
	'step-day-of-week' => 'každý {step}. deň v týždni {part}',
	'step-day-of-month' => 'každý {step}. deň v mesiaci {part}',
	'step-month' => 'každý {step}. mesiac {part}',
	'range-minute' => 'od {left} do {right}',
	'range-minute-named' => 'každú minútu od {left} do {right}',
	'range-hour' => 'od {left} do {right}',
	'range-hour-named' => 'každú hodinu od {left} do {right}',
	'range-day-of-week' => 'od {left} do {right}',
	'range-day-of-week-named' => 'každý deň v týždni od {left} do {right}',
	'range-day-of-month' => 'od {left} do {right}',
	'range-day-of-month-named' => 'každý deň v mesiaci od {left} do {right}',
	'range-month' => 'od {left} do {right}',
	'range-month-named' => 'každý mesiac od {left} do {right}',
	'second' => '{second, plural,
      one {každú sekundu}
      few {každé # sekundy}
      other {každých # sekúnd}
    }',
	'before-second' => '',
	'every-minute' => 'každú minútu',
	'before-minute' => '{position, select, first {} other { }}',
	'minute' => '{minute}',
	'minute-named' => 'v minúte {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'v hodine {hour}',
	'between-day-of-month-and-week' => ' a',
	'before-day-of-week' => '{dayNumber, select,
	  4 { vo }
      other { v }
	}',
	'day-of-week' => '{context, select,
      step {{dayNumber, select,
        1 {pondelka}
        2 {utorka}
        3 {stredy}
        4 {štvrtka}
        5 {piatka}
        6 {soboty}
        7 {nedele}
        other {{dayNumber} - unknown}
      }}
      range {{dayNumber, select,
        1 {pondelka}
        2 {utorka}
        3 {stredy}
        4 {štvrtka}
        5 {piatka}
        6 {soboty}
        7 {nedele}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {pondelok}
        2 {utorok}
        3 {stredu}
        4 {štvrtok}
        5 {piatok}
        6 {sobotu}
        7 {nedeľu}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{nth}. {day}',
	'day-of-week-last' => '{context, select,
      range {{dayNumber, select,
        1 {posledného pondelka}
        2 {posledného utorka}
        3 {poslednej stredy}
        4 {posledného štvrtka}
        5 {posledného piatku}
        6 {poslednej soboty}
        7 {poslednej nedele}
        other {{day} - unknown}
      }}
      other {{dayNumber, select,
        1 {posledný}
		2 {posledný}
		3 {poslednú}
		4 {posledný}
		5 {posledný}
		6 {poslednú}
		7 {poslednú}
		other {unknown}
      } {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'dňa v mesiaci {day}',
	'day-of-month-last-day' => '{context, select,
      range {posledného dňa v mesiaci}
      other {posledný deň v mesiaci}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {posledného pracovného dňa}
      other {v posledný pracovný deň}
    }',
	'day-of-month-nearest-weekday' => 'pracovného dňa najbližšieho k {day}.',
	'before-month' => ' v ',
	'month' => '{context, select,
      step {{month, select,
        1 {januára}
        2 {februára}
        3 {marca}
        4 {apríla}
        5 {mája}
        6 {júna}
        7 {júla}
        8 {augusta}
        9 {septembra}
        10 {októbra}
        11 {novembra}
        12 {decembra}
        other {{month} - unknown}
      }}
      range {{month, select,
        1 {januára}
        2 {februára}
        3 {marca}
        4 {apríla}
        5 {mája}
        6 {júna}
        7 {júla}
        8 {augusta}
        9 {septembra}
        10 {októbra}
        11 {novembra}
        12 {decembra}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {januári}
        2 {februári}
        3 {marci}
        4 {apríli}
        5 {máji}
        6 {júni}
        7 {júli}
        8 {auguste}
        9 {septembri}
        10 {októbri}
        11 {novembri}
        12 {decembri}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => 'o {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => '{day}. {month, select,
      1 {januára}
      2 {februára}
      3 {marca}
      4 {apríla}
      5 {mája}
      6 {júna}
      7 {júla}
      8 {augusta}
      9 {septembra}
      10 {októbra}
      11 {novembra}
      12 {decembra}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'v časovej zóne {tz}',
];
