<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} i {lastValue}',
	'step-all-minute' => 'co {step, plural,
      one {# minutę}
      few {# minuty}
      many {# minut}
      other {# minuty}
    }',
	'step-all-hour' => 'co {step, plural,
      one {# godzinę}
      few {# godziny}
      many {# godzin}
      other {# godziny}
    }',
	'step-all-day-of-week' => 'co {step, plural,
      one {# dzień tygodnia}
      few {# dni tygodnia}
      many {# dni tygodnia}
      other {# dnia tygodnia}
    }',
	'step-all-day-of-month' => 'co {step, plural,
      one {# dzień miesiąca}
      few {# dni miesiąca}
      many {# dni miesiąca}
      other {# dnia miesiąca}
    }',
	'step-all-month' => 'co {step, plural,
      one {# miesiąc}
      few {# miesiące}
      many {# miesięcy}
      other {# miesiąca}
    }',
	'step-minute' => 'co {step, plural,
      one {# minutę}
      few {# minuty}
      many {# minut}
      other {# minuty}
    } {part}',
	'step-hour' => 'co {step, plural,
      one {# godzinę}
      few {# godziny}
      many {# godzin}
      other {# godziny}
    } {part}',
	'step-day-of-week' => 'co {step, plural,
      one {# dzień tygodnia}
      few {# dni tygodnia}
      many {# dni tygodnia}
      other {# dnia tygodnia}
    } {part}',
	'step-day-of-month' => 'co {step, plural,
      one {# dzień miesiąca}
      few {# dni miesiąca}
      many {# dni miesiąca}
      other {# dnia miesiąca}
    } {part}',
	'step-month' => 'co {step, plural,
      one {# miesiąc}
      few {# miesiące}
      many {# miesięcy}
      other {# miesiąca}
    } {part}',
	'range-minute' => 'od {left} do {right}',
	'range-minute-named' => 'co minutę od {left} do {right}',
	'range-hour' => 'od {left} do {right}',
	'range-hour-named' => 'co godzinę od {left} do {right}',
	'range-day-of-week' => 'od {left} do {right}',
	'range-day-of-week-named' => 'każdego dnia tygodnia od {left} do {right}',
	'range-day-of-month' => 'od {left} do {right}',
	'range-day-of-month-named' => 'każdego dnia miesiąca od {left} do {right}',
	'range-month' => 'od {left} do {right}',
	'range-month-named' => 'każdego miesiąca od {left} do {right}',
	'second' => '{second, plural,
      one {co sekundę}
      few {co # sekundy}
      many {co # sekund}
      other {co # sekundy}
    }',
	'before-minute' => '',
	'every-minute' => 'co minutę',
	'minute' => '{minute}',
	'minute-named' => 'w minucie {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'w godzinie {hour}',
	'between-day-of-month-and-week' => ' oraz',
	'before-day-of-week' => '{dayNumber, select,
      2 { we }
      NaN { }
      other { w }
    }',
	'day-of-week' => '{context, select,
      step {{dayNumber, select,
        1 {poniedziałku}
        2 {wtorku}
        3 {środy}
        4 {czwartku}
        5 {piątku}
        6 {soboty}
        7 {niedzieli}
        other {{dayNumber} - unknown}
      }}
      range {{dayNumber, select,
        1 {poniedziałku}
        2 {wtorku}
        3 {środy}
        4 {czwartku}
        5 {piątku}
        6 {soboty}
        7 {niedzieli}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {poniedziałek}
        2 {wtorek}
        3 {środę}
        4 {czwartek}
        5 {piątek}
        6 {sobotę}
        7 {niedzielę}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{context, select,
      step {{nth}. {day}}
      range {{nth}. {day}}
      other {w {nth}. {day}}
    }',
	'day-of-week-last' => '{context, select,
      step {{dayNumber, select,
        1 {ostatniego poniedziałku}
        2 {ostatniego wtorku}
        3 {ostatniej środy}
        4 {ostatniego czwartku}
        5 {ostatniego piątku}
        6 {ostatniej soboty}
        7 {ostatniej niedzieli}
        other {ostatniego {day}}
      }}
      range {{dayNumber, select,
        1 {ostatniego poniedziałku}
        2 {ostatniego wtorku}
        3 {ostatniej środy}
        4 {ostatniego czwartku}
        5 {ostatniego piątku}
        6 {ostatniej soboty}
        7 {ostatniej niedzieli}
        other {ostatniego {day}}
      }}
      other {{dayNumber, select,
        1 {w ostatni poniedziałek}
        2 {w ostatni wtorek}
        3 {w ostatnią środę}
        4 {w ostatni czwartek}
        5 {w ostatni piątek}
        6 {w ostatnią sobotę}
        7 {w ostatnią niedzielę}
        other {w ostatni {day}}
      }}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}.',
	'day-of-month-named' => '{day}. dnia miesiąca',
	'day-of-month-last-day' => '{context, select,
      step {ostatniego dnia miesiąca}
      range {ostatniego dnia miesiąca}
      other {w ostatni dzień miesiąca}
    }',
	'day-of-month-last-weekday' => '{context, select,
      step {ostatniego dnia roboczego miesiąca}
      range {ostatniego dnia roboczego miesiąca}
      other {w ostatni dzień roboczy miesiąca}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      step {dnia roboczego najbliższego {day}.}
      range {dnia roboczego najbliższego {day}.}
      other {w dzień roboczy najbliższy {day}.}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      step {{month, select,
        1 {stycznia}
        2 {lutego}
        3 {marca}
        4 {kwietnia}
        5 {maja}
        6 {czerwca}
        7 {lipca}
        8 {sierpnia}
        9 {września}
        10 {października}
        11 {listopada}
        12 {grudnia}
        other {{month} - unknown}
      }}
      range {{month, select,
        1 {stycznia}
        2 {lutego}
        3 {marca}
        4 {kwietnia}
        5 {maja}
        6 {czerwca}
        7 {lipca}
        8 {sierpnia}
        9 {września}
        10 {października}
        11 {listopada}
        12 {grudnia}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {w styczniu}
        2 {w lutym}
        3 {w marcu}
        4 {w kwietniu}
        5 {w maju}
        6 {w czerwcu}
        7 {w lipcu}
        8 {w sierpniu}
        9 {we wrześniu}
        10 {w październiku}
        11 {w listopadzie}
        12 {w grudniu}
        other {{month} - unknown}
      }}
    }',
	'hour+minute' => 'o {hour}:{minute}',
	'day-of-month+month' => '{day} {month, select,
      1 {stycznia}
      2 {lutego}
      3 {marca}
      4 {kwietnia}
      5 {maja}
      6 {czerwca}
      7 {lipca}
      8 {sierpnia}
      9 {września}
      10 {października}
      11 {listopada}
      12 {grudnia}
      other {{month} - unknown}
    }',
	'timezone' => 'w strefie czasowej {tz}',
];
