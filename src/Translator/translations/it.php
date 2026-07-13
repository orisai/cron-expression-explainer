<?php declare(strict_types = 1);

return [
	'parts-order' => 'second time minute hour date day-of-month day-of-week month timezone',
	'sentence-end' => '.',
	'listSeparator' => ', ',
	'list' => '{values} e {lastValue}',
	'step-all-minute' => 'ogni {step, plural,
      one {minuto}
      other {# minuti}
    }',
	'step-all-hour' => 'ogni {step, plural,
      one {ora}
      other {# ore}
    }',
	'step-all-day-of-week' => 'ogni {step, plural,
      one {giorno}
      other {# giorni}
    } della settimana',
	'step-all-day-of-month' => 'ogni {step, plural,
      one {giorno}
      other {# giorni}
    } del mese',
	'step-all-month' => 'ogni {step, plural,
      one {mese}
      other {# mesi}
    }',
	'step-minute' => 'ogni {step, plural,
      one {minuto}
      other {# minuti}
    } {part}',
	'step-hour' => 'ogni {step, plural,
      one {ora}
      other {# ore}
    } {part}',
	'step-day-of-week' => 'ogni {step, plural,
      one {giorno}
      other {# giorni}
    } della settimana {part}',
	'step-day-of-month' => 'ogni {step, plural,
      one {giorno}
      other {# giorni}
    } del mese {part}',
	'step-month' => 'ogni {step, plural,
      one {mese}
      other {# mesi}
    } {part}',
	'range-minute' => 'da {left} a {right}',
	'range-minute-named' => 'ogni minuto da {left} a {right}',
	'range-hour' => 'da {left} a {right}',
	'range-hour-named' => 'ogni ora da {left} a {right}',
	'range-day-of-week' => 'da{left} a{right}',
	'range-day-of-week-named' => 'ogni giorno da{left} a{right}',
	'range-day-of-month' => 'tra {left} e {right}',
	'range-day-of-month-named' => 'ogni giorno del mese tra {left} e {right}',
	'range-month' => 'da {left} a {right}',
	'range-month-named' => 'ogni mese da {left} a {right}',
	'second' => '{second, plural,
      one {ogni secondo}
      other {ogni # secondi}
    }',
	'before-second' => '',
	'before-minute' => '{position, select, first {} other { }}',
	'every-minute' => 'ogni minuto',
	'minute' => '{minute}',
	'minute-named' => '{valueCount, plural,
      one {al minuto {minute}}
      other {ai minuti {minute}}
    }',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => '{valueCount, plural,
      one {dell’ora {hour}}
      other {delle ore {hour}}
    }',
	'between-day-of-month-and-week' => ' e',
	'before-day-of-week' => ' ',
	'day-of-week' => '{context, select,
      range {{dayNumber, select,
        1 {l lunedì}
        2 {l martedì}
        3 {l mercoledì}
        4 {l giovedì}
        5 {l venerdì}
        6 {l sabato}
        7 {lla domenica}
        other {{dayNumber} - unknown}
      }}
      step {{dayNumber, select,
        1 {da lunedì}
        2 {da martedì}
        3 {da mercoledì}
        4 {da giovedì}
        5 {da venerdì}
        6 {da sabato}
        7 {da domenica}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {il lunedì}
        2 {il martedì}
        3 {il mercoledì}
        4 {il giovedì}
        5 {il venerdì}
        6 {il sabato}
        7 {la domenica}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{context, select,
      range {{dayNumber, select,
        1 {l {nth}º lunedì}
        2 {l {nth}º martedì}
        3 {l {nth}º mercoledì}
        4 {l {nth}º giovedì}
        5 {l {nth}º venerdì}
        6 {l {nth}º sabato}
        7 {lla {nth}ª domenica}
        other {{nth}º {day}}
      }}
      other {{dayNumber, select,
        1 {il {nth}º lunedì}
        2 {il {nth}º martedì}
        3 {il {nth}º mercoledì}
        4 {il {nth}º giovedì}
        5 {il {nth}º venerdì}
        6 {il {nth}º sabato}
        7 {la {nth}ª domenica}
        other {{nth}º {day}}
      }}
    }',
	'day-of-week-last' => '{context, select,
      range {{dayNumber, select,
        1 {ll’ultimo lunedì}
        2 {ll’ultimo martedì}
        3 {ll’ultimo mercoledì}
        4 {ll’ultimo giovedì}
        5 {ll’ultimo venerdì}
        6 {ll’ultimo sabato}
        7 {ll’ultima domenica}
        other {{dayNumber} - unknown}
      }}
      other {{dayNumber, select,
        1 {l’ultimo lunedì}
        2 {l’ultimo martedì}
        3 {l’ultimo mercoledì}
        4 {l’ultimo giovedì}
        5 {l’ultimo venerdì}
        6 {l’ultimo sabato}
        7 {l’ultima domenica}
        other {{dayNumber} - unknown}
      }}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{context, select,
      list {{valueCount, plural,
        one {{day}}
        other {{listPosition, select,
          last {{day, select,
            1 {il 1º del mese}
            8 {l’8 del mese}
            11 {l’11 del mese}
            other {il {day} del mese}
          }}
          middle {{day, select,
            1 {il 1º}
            8 {l’8}
            11 {l’11}
            other {il {day}}
          }}
          other {{day}}
        }}
      }}
      other {{day}}
    }',
	'day-of-month-named' => '{context, select,
      list {{valueCount, plural,
        one {il giorno {day}}
        other {{day, select,
          1 {il 1º}
          8 {l’8}
          11 {l’11}
          other {il {day}}
        }}
      }}
      other {{day, select,
        1 {il 1º del mese}
        8 {l’8 del mese}
        11 {l’11 del mese}
        other {il {day} del mese}
      }}
    }',
	'day-of-month-last-day' => 'l’ultimo giorno del mese',
	'day-of-month-last-weekday' => 'l’ultimo giorno lavorativo del mese',
	'day-of-month-nearest-weekday' => 'il giorno lavorativo più vicino {day, select,
      1 {al 1º}
      8 {all’8}
      11 {all’11}
      other {al {day}}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {{month, select,
        1 {gennaio}
        2 {febbraio}
        3 {marzo}
        4 {aprile}
        5 {maggio}
        6 {giugno}
        7 {luglio}
        8 {agosto}
        9 {settembre}
        10 {ottobre}
        11 {novembre}
        12 {dicembre}
        other {{month} - unknown}
      }}
      step {{month, select,
        1 {da gennaio}
        2 {da febbraio}
        3 {da marzo}
        4 {da aprile}
        5 {da maggio}
        6 {da giugno}
        7 {da luglio}
        8 {da agosto}
        9 {da settembre}
        10 {da ottobre}
        11 {da novembre}
        12 {da dicembre}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {a gennaio}
        2 {a febbraio}
        3 {a marzo}
        4 {ad aprile}
        5 {a maggio}
        6 {a giugno}
        7 {a luglio}
        8 {ad agosto}
        9 {a settembre}
        10 {a ottobre}
        11 {a novembre}
        12 {a dicembre}
        other {{month} - unknown}
      }}
    }',
	'before-time' => '{position, select, first {} other { }}',
	'hour+minute' => '{hourNumeric, select,
      1 {all’1:{minute}}
      other {alle {hour}:{minute}}
    }',
	'before-date' => ' ',
	'day-of-month+month' => '{day, select,
      1 {il 1º}
      8 {l’8}
      11 {l’11}
      other {il {day}}
    } {month, select,
      1 {gennaio}
      2 {febbraio}
      3 {marzo}
      4 {aprile}
      5 {maggio}
      6 {giugno}
      7 {luglio}
      8 {agosto}
      9 {settembre}
      10 {ottobre}
      11 {novembre}
      12 {dicembre}
      other {{month} - unknown}
    }',
	'before-timezone' => ' ',
	'timezone' => 'nel fuso orario {tz}',
];
