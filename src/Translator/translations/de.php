<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} und {lastValue}',
	'step-all-minute' => 'alle {step} Minuten',
	'step-all-hour' => 'jeder {step}. Stunde',
	'step-all-day-of-week' => 'jedem {step}. Wochentag',
	'step-all-day-of-month' => 'an jedem {step}. Tag des Monats',
	'step-all-month' => 'in jedem {step}. Monat',
	'step-minute' => 'alle {step} Minuten {part}',
	'step-hour' => 'jeder {step}. Stunde {part}',
	'step-day-of-week' => 'jedem {step}. Wochentag {part}',
	'step-day-of-month' => 'an jedem {step}. Tag des Monats {part}',
	'step-month' => 'in jedem {step}. Monat {part}',
	'range-minute' => 'von {left} bis {right}',
	'range-minute-named' => 'jede Minute von {left} bis {right}',
	'range-hour' => 'von {left} bis {right}',
	'range-hour-named' => 'jeder Stunde von {left} bis {right}',
	'range-day-of-week' => 'von {left} bis {right}',
	'range-day-of-week-named' => 'jedem Wochentag von {left} bis {right}',
	'range-day-of-month' => 'von {left} bis {right}',
	'range-day-of-month-named' => 'an jedem Tag des Monats von {left} bis {right}',
	'range-month' => 'von {left} bis {right}',
	'range-month-named' => 'in jedem Monat von {left} bis {right}',
	'second' => '{second, plural,
      one {jede Sekunde}
      other {alle # Sekunden}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => 'jede Minute',
	'minute' => '{minute}',
	'minute-named' => '{valueCount, plural,
      one {bei Minute {minute}}
      other {bei den Minuten {minute}}
    }',
	'before-hour' => ' in ',
	'hour' => '{hour}',
	'hour-named' => '{valueCount, plural,
      one {Stunde {hour}}
      other {den Stunden {hour}}
    }',
	'between-day-of-month-and-week' => ' und',
	'before-day-of-week' => '{dayNumber, select,
      NaN { an }
      other { am }
    }',
	'day-of-week' => '{dayNumber, select,
      1 {Montag}
      2 {Dienstag}
      3 {Mittwoch}
      4 {Donnerstag}
      5 {Freitag}
      6 {Samstag}
      7 {Sonntag}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{context, select,
      range {{nth}. {day}}
      other {jedem {nth}. {day}}
    }',
	'day-of-week-last' => '{context, select,
      range {letztem {day}}
      other {jedem letzten {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}',
	'day-of-month-named' => '{valueCount, plural,
      one {am Monatstag {day}}
      other {an den Monatstagen {day}}
    }',
	'day-of-month-last-day' => '{context, select,
      range {zum letzten Tag des Monats}
      other {am letzten Tag des Monats}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {zum letzten Werktag des Monats}
      other {am letzten Werktag des Monats}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {nächstgelegenem Werktag zum {day}.}
      other {am nächstgelegenen Werktag zum {day}.}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {}
      step {}
      other {im }
    }{month, select,
      1 {Januar}
      2 {Februar}
      3 {März}
      4 {April}
      5 {Mai}
      6 {Juni}
      7 {Juli}
      8 {August}
      9 {September}
      10 {Oktober}
      11 {November}
      12 {Dezember}
      other {{month} - unknown}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => 'um {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => 'am {day}. {month, select,
      1 {Januar}
      2 {Februar}
      3 {März}
      4 {April}
      5 {Mai}
      6 {Juni}
      7 {Juli}
      8 {August}
      9 {September}
      10 {Oktober}
      11 {November}
      12 {Dezember}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'in der Zeitzone {tz}',
];
