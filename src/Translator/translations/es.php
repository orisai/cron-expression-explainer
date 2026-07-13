<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} y {lastValue}',
	'step-all-minute' => '{step, plural,
      one {cada minuto}
      other {cada # minutos}
    }',
	'step-all-hour' => '{step, plural,
      one {cada hora}
      other {cada # horas}
    }',
	'step-all-day-of-week' => '{step, plural,
      one {cada día de la semana}
      other {cada # días de la semana}
    }',
	'step-all-day-of-month' => '{step, plural,
      one {cada día del mes}
      other {cada # días del mes}
    }',
	'step-all-month' => '{step, plural,
      one {cada mes}
      other {cada # meses}
    }',
	'step-minute' => '{step, plural,
      one {cada minuto {part}}
      other {cada # minutos {part}}
    }',
	'step-hour' => '{step, plural,
      one {cada hora {part}}
      other {cada # horas {part}}
    }',
	'step-day-of-week' => '{step, plural,
      one {cada día de la semana {part}}
      other {cada # días de la semana {part}}
    }',
	'step-day-of-month' => '{step, plural,
      one {cada día del mes {part}}
      other {cada # días del mes {part}}
    }',
	'step-month' => '{step, plural,
      one {cada mes {part}}
      other {cada # meses {part}}
    }',
	'range-minute' => 'de {left} a {right}',
	'range-minute-named' => 'cada minuto de {left} a {right}',
	'range-hour' => 'de {left} a {right}',
	'range-hour-named' => 'cada hora de {left} a {right}',
	'range-day-of-week' => 'del {left} al {right}',
	'range-day-of-week-named' => 'cada día de la semana del {left} al {right}',
	'range-day-of-month' => 'del {left} al {right}',
	'range-day-of-month-named' => 'cada día del mes del {left} al {right}',
	'range-month' => 'de {left} a {right}',
	'range-month-named' => 'en cada mes de {left} a {right}',
	'second' => '{second, plural,
      one {cada segundo}
      other {cada # segundos}
    }',
	'before-minute' => '',
	'every-minute' => 'cada minuto',
	'minute' => '{minute}',
	'minute-named' => 'en el minuto {minute}',
	'before-hour' => ' de ',
	'hour' => '{hour}',
	'hour-named' => 'la hora {hour}',
	'between-day-of-month-and-week' => ' y',
	'before-day-of-week' => '{dayNumber, select,
      NaN { }
      other { el }
    }',
	'day-of-week' => '{context, select,
      step {desde el }
      other {}
    }{dayNumber, select,
      1 {lunes}
      2 {martes}
      3 {miércoles}
      4 {jueves}
      5 {viernes}
      6 {sábado}
      7 {domingo}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{context, select,
      range {{nth}.º {day}}
      step {desde el {nth}.º {dayNumber, select,
        1 {lunes}
        2 {martes}
        3 {miércoles}
        4 {jueves}
        5 {viernes}
        6 {sábado}
        7 {domingo}
        other {{dayNumber} - unknown}
      }}
      other {el {nth}.º {day}}
    }',
	'day-of-week-last' => '{context, select,
      range {último {day}}
      step {desde el último {dayNumber, select,
        1 {lunes}
        2 {martes}
        3 {miércoles}
        4 {jueves}
        5 {viernes}
        6 {sábado}
        7 {domingo}
        other {{dayNumber} - unknown}
      }}
      other {el último {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'el día {day}',
	'day-of-month-last-day' => '{context, select,
      range {último día}
      step {desde el último día del mes}
      other {el último día del mes}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {último día laborable}
      step {desde el último día laborable del mes}
      other {el último día laborable del mes}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {día laborable más cercano al {day}}
      step {desde el día laborable más cercano al {day}}
      other {el día laborable más cercano al {day}}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {}
      step {desde }
      other {en }
    }{month, select,
      1 {enero}
      2 {febrero}
      3 {marzo}
      4 {abril}
      5 {mayo}
      6 {junio}
      7 {julio}
      8 {agosto}
      9 {septiembre}
      10 {octubre}
      11 {noviembre}
      12 {diciembre}
      other {{month} - unknown}
    }',
	'hour+minute' => '{hourNumeric, select,
      1 {a la 1:{minute}}
      other {a las {hour}:{minute}}
    }',
	'day-of-month+month' => 'el {day} de {month, select,
      1 {enero}
      2 {febrero}
      3 {marzo}
      4 {abril}
      5 {mayo}
      6 {junio}
      7 {julio}
      8 {agosto}
      9 {septiembre}
      10 {octubre}
      11 {noviembre}
      12 {diciembre}
      other {{month} - unknown}
    }',
	'timezone' => 'en la zona horaria {tz}',
];
