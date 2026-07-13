<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} и {lastValue}',
	'step-all-minute' => '{step, plural,
      one {каждую # минуту}
      few {каждые # минуты}
      many {каждые # минут}
      other {каждые # минуты}
    }',
	'step-all-hour' => '{step, plural,
      one {каждый # час}
      few {каждые # часа}
      many {каждые # часов}
      other {каждые # часа}
    }',
	'step-all-day-of-week' => '{step, plural,
      one {каждый # день недели}
      few {каждые # дня недели}
      many {каждые # дней недели}
      other {каждые # дня недели}
    }',
	'step-all-day-of-month' => '{step, plural,
      one {каждый # день месяца}
      few {каждые # дня месяца}
      many {каждые # дней месяца}
      other {каждые # дня месяца}
    }',
	'step-all-month' => '{step, plural,
      one {каждый # месяц}
      few {каждые # месяца}
      many {каждые # месяцев}
      other {каждые # месяца}
    }',
	'step-minute' => '{step, plural,
      one {каждую # минуту}
      few {каждые # минуты}
      many {каждые # минут}
      other {каждые # минуты}
    } {part}',
	'step-hour' => '{step, plural,
      one {каждый # час}
      few {каждые # часа}
      many {каждые # часов}
      other {каждые # часа}
    } {part}',
	'step-day-of-week' => '{step, plural,
      one {каждый # день недели}
      few {каждые # дня недели}
      many {каждые # дней недели}
      other {каждые # дня недели}
    } {part}',
	'step-day-of-month' => '{step, plural,
      one {каждый # день месяца}
      few {каждые # дня месяца}
      many {каждые # дней месяца}
      other {каждые # дня месяца}
    } {part}',
	'step-month' => '{step, plural,
      one {каждый # месяц}
      few {каждые # месяца}
      many {каждые # месяцев}
      other {каждые # месяца}
    } {part}',
	'range-minute' => 'от {left} до {right}',
	'range-minute-named' => 'каждую минуту от {left} до {right}',
	'range-hour' => 'от {left} до {right}',
	'range-hour-named' => 'каждый час от {left} до {right}',
	'range-day-of-week' => 'от {left} до {right}',
	'range-day-of-week-named' => 'каждый день недели от {left} до {right}',
	'range-day-of-month' => 'от {left} до {right}',
	'range-day-of-month-named' => 'каждый день месяца от {left} до {right}',
	'range-month' => 'от {left} до {right}',
	'range-month-named' => 'каждый месяц от {left} до {right}',
	'second' => '{second, plural,
      =1 {каждую секунду}
      one {каждую # секунду}
      few {каждые # секунды}
      many {каждые # секунд}
      other {каждые # секунды}
    }',
	'before-minute' => '',
	'every-minute' => 'каждую минуту',
	'minute' => '{minute}',
	'minute-named' => 'в минуту {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'в час {hour}',
	'between-day-of-month-and-week' => ' и',
	'before-day-of-week' => '{dayNumber, select,
      2 { во }
      NaN { }
      other { в }
    }',
	'day-of-week' => '{context, select,
      step {{dayNumber, select,
        1 {понедельника}
        2 {вторника}
        3 {среды}
        4 {четверга}
        5 {пятницы}
        6 {субботы}
        7 {воскресенья}
        other {{dayNumber} - unknown}
      }}
      range {{dayNumber, select,
        1 {понедельника}
        2 {вторника}
        3 {среды}
        4 {четверга}
        5 {пятницы}
        6 {субботы}
        7 {воскресенья}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {понедельник}
        2 {вторник}
        3 {среду}
        4 {четверг}
        5 {пятницу}
        6 {субботу}
        7 {воскресенье}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{context, select,
      step {{nth}-{dayNumber, select,
        3 {й}
        5 {й}
        6 {й}
        other {го}
      } {day}}
      range {{nth}-{dayNumber, select,
        3 {й}
        5 {й}
        6 {й}
        other {го}
      } {day}}
      other {{nth, select,
        2 {во}
        other {в}
      } {nth}-{dayNumber, select,
        3 {ю}
        5 {ю}
        6 {ю}
        7 {е}
        other {й}
      } {day}}
    }',
	'day-of-week-last' => '{context, select,
      step {{dayNumber, select,
        3 {последней}
        5 {последней}
        6 {последней}
        other {последнего}
      } {day}}
      range {{dayNumber, select,
        3 {последней}
        5 {последней}
        6 {последней}
        other {последнего}
      } {day}}
      other {{dayNumber, select,
        3 {в последнюю}
        5 {в последнюю}
        6 {в последнюю}
        7 {в последнее}
        other {в последний}
      } {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}-го',
	'day-of-month-named' => '{day}-го числа',
	'day-of-month-last-day' => '{context, select,
      range {последнего дня месяца}
      other {в последний день месяца}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {последнего рабочего дня месяца}
      other {в последний рабочий день месяца}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {ближайшего {day, select, 2 {ко} other {к}} {day}-му числу рабочего дня}
      other {в ближайший {day, select, 2 {ко} other {к}} {day}-му числу рабочий день}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      step {{month, select,
        1 {января}
        2 {февраля}
        3 {марта}
        4 {апреля}
        5 {мая}
        6 {июня}
        7 {июля}
        8 {августа}
        9 {сентября}
        10 {октября}
        11 {ноября}
        12 {декабря}
        other {{month} - unknown}
      }}
      range {{month, select,
        1 {января}
        2 {февраля}
        3 {марта}
        4 {апреля}
        5 {мая}
        6 {июня}
        7 {июля}
        8 {августа}
        9 {сентября}
        10 {октября}
        11 {ноября}
        12 {декабря}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {в январе}
        2 {в феврале}
        3 {в марте}
        4 {в апреле}
        5 {в мае}
        6 {в июне}
        7 {в июле}
        8 {в августе}
        9 {в сентябре}
        10 {в октябре}
        11 {в ноябре}
        12 {в декабре}
        other {{month} - unknown}
      }}
    }',
	'hour+minute' => 'в {hourNumeric}:{minute}',
	'day-of-month+month' => '{day} {month, select,
      1 {января}
      2 {февраля}
      3 {марта}
      4 {апреля}
      5 {мая}
      6 {июня}
      7 {июля}
      8 {августа}
      9 {сентября}
      10 {октября}
      11 {ноября}
      12 {декабря}
      other {{month} - unknown}
    }',
	'timezone' => 'в часовом поясе {tz}',
];
