<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} a {lastValue}',
	'step-all-minute' => 'každou {step}. minutu',
	'step-all-hour' => 'každou {step}. hodinu',
	'step-all-day-of-week' => 'každý {step}. den v týdnu',
	'step-all-day-of-month' => 'každý {step}. den v měsíci',
	'step-all-month' => 'každý {step}. měsíc',
	'step-minute' => 'každou {step}. minutu {part}',
	'step-hour' => 'každou {step}. hodinu {part}',
	'step-day-of-week' => 'každý {step}. den v týdnu {part}',
	'step-day-of-month' => 'každý {step}. den v měsíci {part}',
	'step-month' => 'každý {step}. měsíc {part}',
	'range-minute' => 'od {left} do {right}',
	'range-minute-named' => 'každou minutu od {left} do {right}',
	'range-hour' => 'od {left} do {right}',
	'range-hour-named' => 'každou hodinu od {left} do {right}',
	'range-day-of-week' => 'od {left} do {right}',
	'range-day-of-week-named' => 'každý den v týdnu od {left} do {right}',
	'range-day-of-month' => 'od {left} do {right}',
	'range-day-of-month-named' => 'každý den v měsíci od {left} do {right}',
	'range-month' => 'od {left} do {right}',
	'range-month-named' => 'každý měsíc od {left} do {right}',
	'second' => '{second, plural,
      one {každou sekundu}
      few {každé # sekundy}
      other {každých # sekund}
    }',
	'before-second' => '',
	'every-minute' => 'každou minutu',
	'before-minute' => '{position, select, first {} other { }}',
	'minute' => '{minute}',
	'minute-named' => '{valueCount, plural, one {v minutě {minute}} other {v minutách {minute}}}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => '{valueCount, plural, one {v hodině {hour}} other {v hodinách {hour}}}',
	'between-day-of-month-and-week' => ' a',
	'before-day-of-week' => '{dayNumber, select,
	  3 { ve }
	  4 { ve }
      other { v }
	}',
	'day-of-week' => '{context, select,
      step {{dayNumber, select,
        1 {pondělí}
        2 {úterý}
        3 {středy}
        4 {čtvrtka}
        5 {pátku}
        6 {soboty}
        7 {neděle}
        other {{dayNumber} - unknown}
      }}
      range {{dayNumber, select,
        1 {pondělí}
        2 {úterý}
        3 {středy}
        4 {čtvrtka}
        5 {pátku}
        6 {soboty}
        7 {neděle}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {pondělí}
        2 {úterý}
        3 {středu}
        4 {čtvrtek}
        5 {pátek}
        6 {sobotu}
        7 {neděli}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{nth}. {day}',
	'day-of-week-last' => '{context, select,
      range {{dayNumber, select,
        1 {poslední pondělí}
        2 {poslední úterý}
        3 {poslední středy}
        4 {posledního čtvrtka}
        5 {posledního pátku}
        6 {poslední soboty}
        7 {poslední neděle}
        other {{day} - unknown}
      }}
      other {poslední {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{context, select,
      list {{valueCount, plural,
        one {{day}}
        other {{listPosition, select,
          last {{day}. den v měsíci}
          other {{day}.}
        }}
      }}
      other {{day}}
    }',
	'day-of-month-named' => '{context, select,
      list {{valueCount, plural,
        one {ve dni v měsíci {day}}
        other {{day, select,
          2 {ve} 3 {ve} 4 {ve}
          12 {ve} 13 {ve} 14 {ve}
          20 {ve} 21 {ve} 22 {ve} 23 {ve} 24 {ve} 25 {ve} 26 {ve} 27 {ve} 28 {ve} 29 {ve}
          30 {ve} 31 {ve}
          other {v}
        } {day}.}
      }}
      other {{day, select,
        2 {ve} 3 {ve} 4 {ve}
        12 {ve} 13 {ve} 14 {ve}
        20 {ve} 21 {ve} 22 {ve} 23 {ve} 24 {ve} 25 {ve} 26 {ve} 27 {ve} 28 {ve} 29 {ve}
        30 {ve} 31 {ve}
        other {v}
      } {day}. den v měsíci}
    }',
	'day-of-month-last-day' => '{context, select,
      range {posledního dne v měsíci}
      other {v poslední den v měsíci}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {posledního pracovního dne}
      other {v poslední pracovní den}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {pracovního dne nejbližšího k {day}.}
      other {v pracovním dni nejbližším k {day}.}
    }',
	'before-month' => ' v ',
	'month' => '{context, select,
      step {{month, select,
        1 {ledna}
        2 {února}
        3 {března}
        4 {dubna}
        5 {května}
        6 {června}
        7 {července}
        8 {srpna}
        9 {září}
        10 {října}
        11 {listopadu}
        12 {prosince}
        other {{month} - unknown}
      }}
      range {{month, select,
        1 {ledna}
        2 {února}
        3 {března}
        4 {dubna}
        5 {května}
        6 {června}
        7 {července}
        8 {srpna}
        9 {září}
        10 {října}
        11 {listopadu}
        12 {prosince}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {lednu}
        2 {únoru}
        3 {březnu}
        4 {dubnu}
        5 {květnu}
        6 {červnu}
        7 {červenci}
        8 {srpnu}
        9 {září}
        10 {říjnu}
        11 {listopadu}
        12 {prosinci}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => '{hourNumeric, select,
      2 {ve}
      3 {ve}
      4 {ve}
      12 {ve}
      13 {ve}
      14 {ve}
      20 {ve}
      21 {ve}
      22 {ve}
      23 {ve}
      other {v}
    } {hourNumeric}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => '{day}. {month, select,
      1 {ledna}
      2 {února}
      3 {března}
      4 {dubna}
      5 {května}
      6 {června}
      7 {července}
      8 {srpna}
      9 {září}
      10 {října}
      11 {listopadu}
      12 {prosince}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'v časové zóně {tz}',
];
