<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} et {lastValue}',
	'step-all-minute' => 'toutes les {step} minutes',
	'step-all-hour' => 'toutes les {step} heures',
	'step-all-day-of-week' => 'tous les {step} jours de la semaine',
	'step-all-day-of-month' => 'tous les {step} jours du mois',
	'step-all-month' => 'tous les {step} mois',
	'step-minute' => 'toutes les {step} minutes {part}',
	'step-hour' => 'toutes les {step} heures {part}',
	'step-day-of-week' => 'tous les {step} jours de la semaine {part}',
	'step-day-of-month' => 'tous les {step} jours du mois {part}',
	'step-month' => 'tous les {step} mois {part}',
	'range-minute' => 'de {left} à {right}',
	'range-minute-named' => 'à chaque minute de {left} à {right}',
	'range-hour' => 'de {left} à {right}',
	'range-hour-named' => 'de chaque heure de {left} à {right}',
	'range-day-of-week' => 'du {left} au {right}',
	'range-day-of-week-named' => 'chaque jour de la semaine du {left} au {right}',
	'range-day-of-month' => 'du {left} au {right}',
	'range-day-of-month-named' => 'chaque jour du mois du {left} au {right}',
	'range-month' => '{left, select,
      avril {d’avril}
      août {d’août}
      octobre {d’octobre}
      other {de {left}}
    } à {right}',
	'range-month-named' => 'chaque mois {left, select,
      avril {d’avril}
      août {d’août}
      octobre {d’octobre}
      other {de {left}}
    } à {right}',
	'second' => '{second, plural,
      one {chaque seconde}
      other {toutes les # secondes}
    }',
	'before-minute' => '',
	'every-minute' => 'à chaque minute',
	'minute' => '{minute}',
	'minute-named' => 'à la minute {minute}',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'de l’heure {hour}',
	'between-day-of-month-and-week' => ' et',
	'before-day-of-week' => '{dayNumber, select,
      NaN { }
      other { le }
    }',
	'day-of-week' => '{dayNumber, select,
      1 {lundi}
      2 {mardi}
      3 {mercredi}
      4 {jeudi}
      5 {vendredi}
      6 {samedi}
      7 {dimanche}
      other {{dayNumber} - unknown}
    }',
	'day-of-week-nth' => '{context, select,
      range {{nth, selectordinal, one {#er} other {#e}} {day}}
      other {le {nth, selectordinal, one {#er} other {#e}} {day}}
    }',
	'day-of-week-last' => '{context, select,
      range {dernier {day}}
      other {le dernier {day}}
    }',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day, select,
      1 {1er}
      other {{day}}
    }',
	'day-of-month-named' => 'le jour {day} du mois',
	'day-of-month-last-day' => '{context, select,
      range {dernier jour du mois}
      other {le dernier jour du mois}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {dernier jour ouvré du mois}
      other {le dernier jour ouvré du mois}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {jour ouvré le plus proche du {day, select, 1 {1er} other {{day}}}}
      other {le jour ouvré le plus proche du {day, select, 1 {1er} other {{day}}}}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {{month, select,
        1 {janvier}
        2 {février}
        3 {mars}
        4 {avril}
        5 {mai}
        6 {juin}
        7 {juillet}
        8 {août}
        9 {septembre}
        10 {octobre}
        11 {novembre}
        12 {décembre}
        other {{month} - unknown}
      }}
      step {{month, select,
        1 {janvier}
        2 {février}
        3 {mars}
        4 {avril}
        5 {mai}
        6 {juin}
        7 {juillet}
        8 {août}
        9 {septembre}
        10 {octobre}
        11 {novembre}
        12 {décembre}
        other {{month} - unknown}
      }}
      other {en {month, select,
        1 {janvier}
        2 {février}
        3 {mars}
        4 {avril}
        5 {mai}
        6 {juin}
        7 {juillet}
        8 {août}
        9 {septembre}
        10 {octobre}
        11 {novembre}
        12 {décembre}
        other {{month} - unknown}
      }}
    }',
	'hour+minute' => 'à {hour}:{minute}',
	'day-of-month+month' => 'le {day, select,
      1 {1er}
      other {{day}}
    } {month, select,
      1 {janvier}
      2 {février}
      3 {mars}
      4 {avril}
      5 {mai}
      6 {juin}
      7 {juillet}
      8 {août}
      9 {septembre}
      10 {octobre}
      11 {novembre}
      12 {décembre}
      other {{month} - unknown}
    }',
	'timezone' => 'dans le fuseau horaire {tz}',
];
