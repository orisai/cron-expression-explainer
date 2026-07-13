<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} ve {lastValue}',
	'step-all-minute' => 'her {step} dakikada bir',
	'step-all-hour' => 'her {step} saatte bir',
	'step-all-day-of-week' => 'haftanın her {step}. günü',
	'step-all-day-of-month' => 'ayın her {step}. günü',
	'step-all-month' => 'her {step} ayda bir',
	'step-minute' => '{part} her {step} dakikada bir',
	'step-hour' => '{part} her {step} saatte bir',
	'step-day-of-week' => '{part} her {step} günde bir',
	'step-day-of-month' => 'ayın {part} her {step} günde bir',
	'step-month' => '{part} her {step} ayda bir',
	'range-minute' => '{left} ile {right} arasında',
	'range-minute-named' => '{left} ile {right} arasındaki her dakika',
	'range-hour' => 'saat {left} ile {right} arasında',
	'range-hour-named' => 'saat {left} ile {right} arasında',
	'range-day-of-week' => '{left} ile {right} arasında',
	'range-day-of-week-named' => '{left} ile {right} arasındaki her gün',
	'range-day-of-month' => '{left} ile {right} arasında',
	'range-day-of-month-named' => 'ayın {left} ile {right} arasındaki her günü',
	'range-month' => '{left} ile {right} arasında',
	'range-month-named' => '{left} ile {right} arasındaki her ay',
	'second' => '{second, plural,
      one {her saniye}
      other {her # saniyede bir}
    }',
	'before-minute' => '',
	'every-minute' => 'her dakika',
	'minute' => '{minute}',
	'minute-named' => '{minute}. dakikada',
	'before-hour' => ' ',
	'hour' => '{hour}',
	'hour-named' => 'saat {hour}',
	'between-day-of-month-and-week' => ' ve',
	'before-day-of-week' => ' ',
	'day-of-week' => '{context, select,
      value {{dayNumber, select,
        1 {pazartesi}
        2 {salı}
        3 {çarşamba}
        4 {perşembe}
        5 {cuma}
        6 {cumartesi}
        7 {pazar}
        other {{dayNumber} - unknown}
      } günü}
      step {{dayNumber, select,
        1 {pazartesiden}
        2 {salıdan}
        3 {çarşambadan}
        4 {perşembeden}
        5 {cumadan}
        6 {cumartesiden}
        7 {pazardan}
        other {{dayNumber} - unknown}
      } itibaren}
      other {{dayNumber, select,
        1 {pazartesi}
        2 {salı}
        3 {çarşamba}
        4 {perşembe}
        5 {cuma}
        6 {cumartesi}
        7 {pazar}
        other {{dayNumber} - unknown}
      }}
    }',
	'day-of-week-nth' => '{nth}. {day}',
	'day-of-week-last' => 'son {day}',
	'before-day-of-month' => ' ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'ayın {day}. günü',
	'day-of-month-last-day' => '{context, select,
      range {son günü}
      step {son günü}
      other {ayın son günü}
    }',
	'day-of-month-last-weekday' => '{context, select,
      range {son iş günü}
      step {son iş günü}
      other {ayın son iş günü}
    }',
	'day-of-month-nearest-weekday' => '{context, select,
      range {{day}. gününe en yakın iş günü}
      step {{day}. gününe en yakın iş günü}
      other {ayın {day}. gününe en yakın iş günü}
    }',
	'before-month' => ' ',
	'month' => '{context, select,
      range {{month, select,
        1 {ocak}
        2 {şubat}
        3 {mart}
        4 {nisan}
        5 {mayıs}
        6 {haziran}
        7 {temmuz}
        8 {ağustos}
        9 {eylül}
        10 {ekim}
        11 {kasım}
        12 {aralık}
        other {{month} - unknown}
      }}
      step {{month, select,
        1 {ocaktan}
        2 {şubattan}
        3 {marttan}
        4 {nisandan}
        5 {mayıstan}
        6 {hazirandan}
        7 {temmuzdan}
        8 {ağustostan}
        9 {eylülden}
        10 {ekimden}
        11 {kasımdan}
        12 {aralıktan}
        other {{month} - unknown}
      } itibaren}
      list {{month, select,
        1 {ocakta}
        2 {şubatta}
        3 {martta}
        4 {nisanda}
        5 {mayısta}
        6 {haziranda}
        7 {temmuzda}
        8 {ağustosta}
        9 {eylülde}
        10 {ekimde}
        11 {kasımda}
        12 {aralıkta}
        other {{month} - unknown}
      }}
      other {{month, select,
        1 {ocak}
        2 {şubat}
        3 {mart}
        4 {nisan}
        5 {mayıs}
        6 {haziran}
        7 {temmuz}
        8 {ağustos}
        9 {eylül}
        10 {ekim}
        11 {kasım}
        12 {aralık}
        other {{month} - unknown}
      } ayında}
    }',
	'hour+minute' => 'saat {hour}:{minute}',
	'day-of-month+month' => '{month, select,
      1 {ocak}
      2 {şubat}
      3 {mart}
      4 {nisan}
      5 {mayıs}
      6 {haziran}
      7 {temmuz}
      8 {ağustos}
      9 {eylül}
      10 {ekim}
      11 {kasım}
      12 {aralık}
      other {{month} - unknown}
    } ayının {day}. günü',
	'timezone' => '{tz} saat diliminde',
];
