<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} e {lastValue}',
	'step-all-minute' => '{step, plural,
      one {a cada minuto}
      other {a cada # minutos}
    }',
	'step-all-hour' => '{step, plural,
      one {a cada hora}
      other {a cada # horas}
    }',
	'step-all-day-of-week' => '{step, plural,
      one {a cada dia da semana}
      other {a cada # dias da semana}
    }',
	'step-all-day-of-month' => '{step, plural,
      one {a cada dia do mês}
      other {a cada # dias do mês}
    }',
	'step-all-month' => '{step, plural,
      one {a cada mês}
      other {a cada # meses}
    }',
	'step-minute' => '{step, plural,
      one {a cada minuto}
      other {a cada # minutos}
    } {part}',
	'step-hour' => '{step, plural,
      one {a cada hora}
      other {a cada # horas}
    } {part}',
	'step-day-of-week' => '{step, plural,
      one {a cada dia da semana}
      other {a cada # dias da semana}
    } {part}',
	'step-day-of-month' => '{step, plural,
      one {a cada dia do mês}
      other {a cada # dias do mês}
    } {part}',
	'step-month' => '{step, plural,
      one {a cada mês}
      other {a cada # meses}
    } {part}',
	'range-minute' => 'de {left} a {right}',
	'range-minute-named' => 'a cada minuto de {left} a {right}',
	'range-hour' => 'de {left} a {right}',
	'range-hour-named' => 'a cada hora de {left} a {right}',
	'range-day-of-week' => 'de {left} a {right}',
	'range-day-of-week-named' => 'a cada dia da semana de {left} a {right}',
	'range-day-of-month' => 'de {left} até {right}',
	'range-day-of-month-named' => 'a cada dia do mês de {left} até {right}',
	'range-month' => 'de {left} a {right}',
	'range-month-named' => 'a cada mês de {left} a {right}',
	'second' => '{second, plural,
      one {a cada segundo}
      other {a cada # segundos}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => 'a cada minuto',
	'minute' => '{minute}',
	'minute-named' => 'no minuto {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'da hora {hour}',
	'between-day-of-month-and-week' => ' e',
	'before-day-of-week' => '{dayNumber, select,
      6 { no }
      7 { no }
      NaN { }
      other { na }
    }',
	'day-of-week' => '{dayNumber, select,
      1 {segunda-feira}
      2 {terça-feira}
      3 {quarta-feira}
      4 {quinta-feira}
      5 {sexta-feira}
      6 {sábado}
      7 {domingo}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{context, select,
      range {{dayNumber, select,
        6 {{nth}º sábado}
        7 {{nth}º domingo}
        other {{nth}ª {day}}
      }}
      other {{dayNumber, select,
        6 {no {nth}º sábado}
        7 {no {nth}º domingo}
        other {na {nth}ª {day}}
      }}
    }',
	'day-of-week-last' => '{context, select,
      range {{dayNumber, select,
        6 {último sábado}
        7 {último domingo}
        other {última {day}}
      }}
      other {{dayNumber, select,
        6 {no último sábado}
        7 {no último domingo}
        other {na última {day}}
      }}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'no dia {day} do mês',
	'day-of-month-last-day' => '{context, select,
      range {o último dia do mês}
      other {no último dia do mês}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {o último dia útil do mês}
      other {no último dia útil do mês}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {um dia útil mais próximo do dia {day}}
      other {no dia útil mais próximo do dia {day}}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {{month, select,
        1 {janeiro}
        2 {fevereiro}
        3 {março}
        4 {abril}
        5 {maio}
        6 {junho}
        7 {julho}
        8 {agosto}
        9 {setembro}
        10 {outubro}
        11 {novembro}
        12 {dezembro}
        other {{month} - unknown}
      }}
      step {{month, select,
        1 {janeiro}
        2 {fevereiro}
        3 {março}
        4 {abril}
        5 {maio}
        6 {junho}
        7 {julho}
        8 {agosto}
        9 {setembro}
        10 {outubro}
        11 {novembro}
        12 {dezembro}
        other {{month} - unknown}
      }}
      other {em {month, select,
        1 {janeiro}
        2 {fevereiro}
        3 {março}
        4 {abril}
        5 {maio}
        6 {junho}
        7 {julho}
        8 {agosto}
        9 {setembro}
        10 {outubro}
        11 {novembro}
        12 {dezembro}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => '{hourNumeric, select,
      1 {à}
      other {às}
    } {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => 'no dia {day} de {month, select,
      1 {janeiro}
      2 {fevereiro}
      3 {março}
      4 {abril}
      5 {maio}
      6 {junho}
      7 {julho}
      8 {agosto}
      9 {setembro}
      10 {outubro}
      11 {novembro}
      12 {dezembro}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'no fuso horário {tz}',
];
