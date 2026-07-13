<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} і {lastValue}',
	'step-all-minute' => '{step, plural,
      one {кожну # хвилину}
      few {кожні # хвилини}
      many {кожні # хвилин}
      other {кожні # хвилини}
    }',
	'step-all-hour' => '{step, plural,
      one {кожну # годину}
      few {кожні # години}
      many {кожні # годин}
      other {кожні # години}
    }',
	'step-all-day-of-week' => '{step, plural,
      one {кожен # день тижня}
      few {кожні # дні тижня}
      many {кожні # днів тижня}
      other {кожні # дні тижня}
    }',
	'step-all-day-of-month' => '{step, plural,
      one {кожен # день місяця}
      few {кожні # дні місяця}
      many {кожні # днів місяця}
      other {кожні # дні місяця}
    }',
	'step-all-month' => '{step, plural,
      one {кожен # місяць}
      few {кожні # місяці}
      many {кожні # місяців}
      other {кожні # місяці}
    }',
	'step-minute' => '{step, plural,
      one {кожну # хвилину}
      few {кожні # хвилини}
      many {кожні # хвилин}
      other {кожні # хвилини}
    } {part}',
	'step-hour' => '{step, plural,
      one {кожну # годину}
      few {кожні # години}
      many {кожні # годин}
      other {кожні # години}
    } {part}',
	'step-day-of-week' => '{step, plural,
      one {кожен # день}
      few {кожні # дні}
      many {кожні # днів}
      other {кожні # дні}
    } {part}',
	'step-day-of-month' => '{step, plural,
      one {кожен # день}
      few {кожні # дні}
      many {кожні # днів}
      other {кожні # дні}
    } {part}',
	'step-month' => '{step, plural,
      one {кожен # місяць}
      few {кожні # місяці}
      many {кожні # місяців}
      other {кожні # місяці}
    } {part}',
	'range-minute' => 'з {left} до {right}',
	'range-minute-named' => 'щохвилини з {left} до {right}',
	'range-hour' => 'з {left} до {right}',
	'range-hour-named' => 'щогодини з {left} до {right}',
	'range-day-of-week' => 'з {left} до {right}',
	'range-day-of-week-named' => 'щодня з {left} до {right}',
	'range-day-of-month' => 'з {left} до {right}',
	'range-day-of-month-named' => 'щодня з {left} до {right}',
	'range-month' => 'з {left} до {right}',
	'range-month-named' => 'щомісяця з {left} до {right}',
	'second' => '{second, plural,
      =1 {щосекунди}
      one {кожну # секунду}
      few {кожні # секунди}
      many {кожні # секунд}
      other {кожні # секунди}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => 'щохвилини',
	'minute' => '{minute}',
	'minute-named' => '{valueCount, plural, =1 {у хвилину {minute}} other {у хвилини {minute}}}',
	'before-hour' => ' ',
	'hour' => '{context, select,
      list {{valueCount, plural,
        =1 {{hour}}
        other {{listPosition, select,
          last {{hour}-й годині}
          other {{hour}-й}
        }}
      }}
      other {{hour}}
    }',
	'hour-named' => '{context, select,
      list {{valueCount, plural,
        =1 {о годині {hour}}
        other {{hour, select, 11 {об} other {о}} {hour}-й}
      }}
      other {{hour, select, 11 {об} other {о}} {hour}-й годині}
    }',
	'between-day-of-month-and-week' => ' та',
	'before-day-of-week' => '{dayNumber, select,
      NaN { }
      other { у }
    }',
	'day-of-week' => '{context, select,
      step {{dayNumber, select,
        1 {понеділка}
        2 {вівторка}
        3 {середи}
        4 {четверга}
        5 {п’ятниці}
        6 {суботи}
        7 {неділі}
        other {{dayNumber} - unknown}
      }}
      range {{dayNumber, select,
        1 {понеділка}
        2 {вівторка}
        3 {середи}
        4 {четверга}
        5 {п’ятниці}
        6 {суботи}
        7 {неділі}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {понеділок}
        2 {вівторок}
        3 {середу}
        4 {четвер}
        5 {п’ятницю}
        6 {суботу}
        7 {неділю}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{context, select,
      step {{dayNumber, select,
        1 {{nth}-го}
        2 {{nth}-го}
        4 {{nth}-го}
        other {{nth}-ї}
      } {day}}
      range {{dayNumber, select,
        1 {{nth}-го}
        2 {{nth}-го}
        4 {{nth}-го}
        other {{nth}-ї}
      } {day}}
      other {{dayNumber, select,
        1 {у {nth}-й}
        2 {у {nth}-й}
        4 {у {nth}-й}
        other {у {nth, select,
          1 {1-шу}
          2 {2-гу}
          3 {3-тю}
          other {{nth}-ту}
        }}
      } {day}}
    }',
	'day-of-week-last' => '{context, select,
      step {{dayNumber, select,
        1 {останнього понеділка}
        2 {останнього вівторка}
        3 {останньої середи}
        4 {останнього четверга}
        5 {останньої п’ятниці}
        6 {останньої суботи}
        7 {останньої неділі}
        other {{day} - unknown}
      }}
      range {{dayNumber, select,
        1 {останнього понеділка}
        2 {останнього вівторка}
        3 {останньої середи}
        4 {останнього четверга}
        5 {останньої п’ятниці}
        6 {останньої суботи}
        7 {останньої неділі}
        other {{day} - unknown}
      }}
      other {{dayNumber, select,
        1 {в останній}
        2 {в останній}
        4 {в останній}
        other {в останню}
      } {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{context, select,
      list {{valueCount, plural,
        =1 {{day}-го}
        other {{listPosition, select,
          last {{day}-го числа}
          other {{day}-го}
        }}
      }}
      other {{day}-го}
    }',
	'day-of-month-named' => '{valueCount, plural,
      =1 {{day}-го числа}
      other {{day}-го}
    }',
	'day-of-month-last-day' => '{context, select,
      range {останнього дня місяця}
      other {в останній день місяця}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {останнього робочого дня місяця}
      other {в останній робочий день місяця}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {найближчого до {day}-го числа робочого дня}
      other {у найближчий до {day}-го числа робочий день}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      step {{month, select,
        1 {січня}
        2 {лютого}
        3 {березня}
        4 {квітня}
        5 {травня}
        6 {червня}
        7 {липня}
        8 {серпня}
        9 {вересня}
        10 {жовтня}
        11 {листопада}
        12 {грудня}
        other {{month} - unknown}
      }}
      range {{month, select,
        1 {січня}
        2 {лютого}
        3 {березня}
        4 {квітня}
        5 {травня}
        6 {червня}
        7 {липня}
        8 {серпня}
        9 {вересня}
        10 {жовтня}
        11 {листопада}
        12 {грудня}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {у січні}
        2 {у лютому}
        3 {у березні}
        4 {у квітні}
        5 {у травні}
        6 {у червні}
        7 {у липні}
        8 {у серпні}
        9 {у вересні}
        10 {у жовтні}
        11 {у листопаді}
        12 {у грудні}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => '{hourNumeric, select,
      11 {об}
      other {о}
    } {hour}:{minute}',
	'before-date' => ' ',
	'day-of-month+month' => '{day} {month, select,
      1 {січня}
      2 {лютого}
      3 {березня}
      4 {квітня}
      5 {травня}
      6 {червня}
      7 {липня}
      8 {серпня}
      9 {вересня}
      10 {жовтня}
      11 {листопада}
      12 {грудня}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'у часовому поясі {tz}',
];
