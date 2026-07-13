<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} en {lastValue}',
	'step-all-minute' => 'elke {step} minuten',
	'step-all-hour' => 'elke {step} uur',
	'step-all-day-of-week' => 'elke {step} dagen van de week',
	'step-all-day-of-month' => 'elke {step} dagen van de maand',
	'step-all-month' => 'elke {step} maanden',
	'step-minute' => 'elke {step} minuten {part}',
	'step-hour' => 'elke {step} uur {part}',
	'step-day-of-week' => 'elke {step} dagen van de week {part}',
	'step-day-of-month' => 'elke {step} dagen van de maand {part}',
	'step-month' => 'elke {step} maanden {part}',
	'range-minute' => 'van {left} tot en met {right}',
	'range-minute-named' => 'elke minuut van {left} tot en met {right}',
	'range-hour' => 'van {left} tot en met {right}',
	'range-hour-named' => 'van elk uur van {left} tot en met {right}',
	'range-day-of-week' => 'van {left} tot en met {right}',
	'range-day-of-week-named' => 'van {left} tot en met {right}',
	'range-day-of-month' => 'van {left} tot en met {right}',
	'range-day-of-month-named' => 'op elke dag van de maand van {left} tot en met {right}',
	'range-month' => 'van {left} tot en met {right}',
	'range-month-named' => 'in elke maand van {left} tot en met {right}',
	'second' => '{second, plural,
      one {elke seconde}
      other {elke # seconden}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => 'elke minuut',
	'minute' => '{minute}',
	'minute-named' => 'op minuut {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'van uur {hour}',
	'between-day-of-month-and-week' => ' en',
	'before-day-of-week' => '{dayNumber, select,
      NaN { }
      other { op }
    }',
	'day-of-week' => '{dayNumber, select,
      1 {maandag}
      2 {dinsdag}
      3 {woensdag}
      4 {donderdag}
      5 {vrijdag}
      6 {zaterdag}
      7 {zondag}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{context, select,
      range {de {nth}e {day}}
      step {de {nth}e {day}}
      other {op de {nth}e {day}}
    }',
	'day-of-week-last' => '{context, select,
      range {de laatste {day}}
      step {de laatste {day}}
      other {op de laatste {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{context, select,
      list {{valueCount, plural,
        one {{day}}
        other {{listPosition, select,
          last {{day}e dag van de maand}
          other {{day}e}
        }}
      }}
      other {{day}}
    }',
	'day-of-month-named' => '{valueCount, plural,
      one {{context, select,
        list {op dag {day} van de maand}
        other {op de {day}e dag van de maand}
      }}
      other {op de {day}e}
    }',
	'day-of-month-last-day' => '{context, select,
      range {de laatste dag van de maand}
      step {de laatste dag van de maand}
      other {op de laatste dag van de maand}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {de laatste werkdag van de maand}
      step {de laatste werkdag van de maand}
      other {op de laatste werkdag van de maand}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {de werkdag die het dichtst bij de {day}e ligt}
      step {de werkdag die het dichtst bij de {day}e ligt}
      other {op de werkdag die het dichtst bij de {day}e ligt}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {{month, select,
        1 {januari}
        2 {februari}
        3 {maart}
        4 {april}
        5 {mei}
        6 {juni}
        7 {juli}
        8 {augustus}
        9 {september}
        10 {oktober}
        11 {november}
        12 {december}
        other {{month} - unknown}
      }}
      step {{month, select,
        1 {januari}
        2 {februari}
        3 {maart}
        4 {april}
        5 {mei}
        6 {juni}
        7 {juli}
        8 {augustus}
        9 {september}
        10 {oktober}
        11 {november}
        12 {december}
        other {{month} - unknown}
      }}
      other {in {month, select,
        1 {januari}
        2 {februari}
        3 {maart}
        4 {april}
        5 {mei}
        6 {juni}
        7 {juli}
        8 {augustus}
        9 {september}
        10 {oktober}
        11 {november}
        12 {december}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => 'om {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => 'op {day} {month, select,
      1 {januari}
      2 {februari}
      3 {maart}
      4 {april}
      5 {mei}
      6 {juni}
      7 {juli}
      8 {augustus}
      9 {september}
      10 {oktober}
      11 {november}
      12 {december}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'in de tijdzone {tz}',
];
