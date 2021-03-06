<?php

/**
 * LangRu rules 
 */

$globalExceptions = array(
    'MLN' => array(
        'гусь' => '*',
        'ремень' => '*',
        'камень' => '*',
        'онук' => '*',
        'богода' => '*',
        'нечипас' => '*',
        'маненок' => '*',
        'рева' => '*',
        'кива' => '*',
        'бра' => array(2 => 'бры', 3 => 'бре', 4 => 'бру', 5 => 'брой', 6 => 'бре'),
    ),
    'FLN' => array(
        'гусь' => '*',
        'ремень' => '*',
        'камень' => '*',
        'онук' => '*',
        'богода' => '*',
        'нечипас' => '*',
        'маненок' => '*',
        'рева' => '*',
        'кива' => '*',
//        'гладская' => array(2 => 'гладской', 3 => 'гладской', 4 => 'гладскую', 5 => 'гладской', 6 => 'гладской'),
    ),
    'FFN' => array(
        'рашель' => '*',
        'нинель' => '*',
        'николь' => '*',
        'габриэль' => '*',
        'даниэль' => '*',
//        'алла' => array(2 => 'аллы',3 => 'алле',4 => 'аллу',5 => 'аллой',6 => 'алле',),
//        'изабелла' => array(2 => 'изабеллы',3 => 'изабелле',4 => 'изабеллу',5 => 'изабеллой',6 => 'изабелле',),
//        'виталия' => array(2 => 'виталии',3 => 'виталии',4 => 'виталию',5 => 'виталией',6 => 'виталии',),
    ),
);

//$exceptions = array(
//    6 => array(
//        'моара' => '*',
//        'шинджя' => '*',
//        'лобня' => '*'
//    )
//);

// массив для быстрого поиска по ключам
$confArray = array();

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания 1 символ
            'б,в,г,д,ж,з,й,к,л,м,н,п,р,с,т,ф,х,ц,ч,ш,щ,ь' => '*' // не склоняется
        ),
    ),
    'exceptions' => array()
);
$confArray['F']['LN'][] = $rule; // #1
$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания 1 символ
            'б,в,г,д,ж,з,й,к,л,м,н,п,р,с,т,ф,х,ц,ч,ш,щ' => '*' // не склоняется
        ),
        2 => array(
            'ия' => array(
                2 => 'ии', 3 => 'ии', 4 => 'ию', 5 => 'ией', 6 => 'ии'
            ),
        ),
    ),
    'exceptions' => array()
);
$confArray['F']['FN'][] = $rule; // #2
$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        2 => array( // длина окончания
            'ых,их' => '*' // не склоняется
        ),
        3 => array( // длина окончания
            'ого,яго,ово' => '*' // не склоняется
        ),
    ),
    'exceptions' => array()
);
$confArray['M']['LN'][] = $rule; // #3
$confArray['F']['LN'][] = $rule; // #3-F-LN

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        2 => array( // длина окончания
            'иа,ия' => '*' // не склоняется
        ),
    ),
    'exceptions' => array()
);
$confArray['M']['LN'][] = $rule; // #4
$confArray['F']['LN'][] = $rule; // #4-F-LN

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        2 => array( // длина окончания
            'ко' => '*' // не склоняется
        ),
    ),
    'exceptions' => array()
);
$confArray['M']['LN'][] = $rule; // #5
$confArray['F']['LN'][] = $rule; // #5-F-LN

// отключил правило #6 - т.к. вроде так постабильнее работает. Всё что "непопало", можно добавить в глобальный список исключений
//$rule = array(
//    'suffix'        => '', // буква предш. оконч.
//    'ending'        => array(
//        1 => array( // длина окончания
//            'а,е,ё,и,о,у,ы,э,ю,я' => '*' // не склоняется
//        ),
//    ),
//    'exceptions' => $exceptions[6], // использовать список исключений для 6-го правила
//);
//$confArray['M']['LN'][] = $rule; // #6-M-LN
//$confArray['M']['FN'][] = $rule; // #6-M-FN
//
//
//$rule = array(
//    'suffix'        => 'а,е,ё,и,о,у,ы,э,ю,я', // буква предш. оконч.
//    'ending'        => array(
//        1 => array( // длина окончания
//            'а,е,ё,и,о,у,ы,э,ю,я' => '*' // не склоняется
//        ),
//    ),
//    'exceptions' => $exceptions[6], // использовать список исключений для 6-го правила
//);
//
//$confArray['F']['LN'][] = $rule; // #6-F-LN
//$confArray['F']['FN'][] = $rule; // #6-F-FN

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'х,ц' => '*' // не склоняется
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #7

/// склоняемые окончания
$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            
            'ь' => array(
                2 => 'я', 3 => 'ю', 4 => 'я', 5 => 'ем', 6 => 'е'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #8
$confArray['M']['FN'][] = $rule; // #8-M-FN

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        2 => array( // длина окончания
            'ий,ой' => array(
                2 => 'ого', 3 => 'ому', 4 => 'ого', 5 => 'им', 6 => 'ом'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #9

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'й' => array(
                2 => 'я', 3 => 'ю', 4 => 'я', 5 => 'ем', 6 => 'е'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #10
$confArray['M']['FN'][] = $rule; // #10

$rule = array(
    'suffix'        => 'а', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'б,г,д,з,к,м,н,п,р,с,т,ф,х,ч' => array(
                2 => '+а', 3 => '+у', 4 => '+а', 5 => '+ом', 6 => '+е'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #11

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'ж,ч,ш,щ,ц' => array(
                2 => '+а', 3 => '+у', 4 => '+а', 5 => '+ем', 6 => '+е'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #12
$confArray['M']['FN'][] = $rule; // #12-M-FN

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'в,л,н' => array(
                2 => '+а', 3 => '+у', 4 => '+а', 5 => '+ым', 6 => '+е'
            ),
        ),
    ),
    'exceptions' => array(),
);
$confArray['M']['LN'][] = $rule; // #13

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'б,в,г,д,ж,з,й,к,л,м,н,п,р,с,т,ф,х,ц,ч,ш,щ' => array(
                2 => '+а', 3 => '+у', 4 => '+а', 5 => '+ом', 6 => '+е'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['M']['FN'][] = $rule; // #14

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'ь' => array(
                2 => 'и', 3 => 'и', 4 => '*', 5 => '*', 6 => 'и'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['F']['FN'][] = $rule; // #15

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        2 => array( // длина окончания
            'ая' => array(
                2 => 'ой', 3 => 'ой', 4 => 'ую', 5 => 'ой', 6 => 'ой'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['F']['LN'][] = $rule; // #16

$rule = array(
    'suffix'        => 'б,в,г,д,ж,з,й,к,л,м,н,п,р,с,т,ф,х,ц,ч,ш,щ', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'а' => array(
                2 => 'ой', 3 => 'ой', 4 => 'у', 5 => 'ой', 6 => 'ой'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['F']['LN'][] = $rule; // #17

$rule = array(
    'suffix'        => 'б,в,г,д,ж,з,й,к,л,м,н,п,р,с,т,ф,х,ц,ч,ш,щ', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'я' => array(
                2 => 'и', 3 => 'е', 4 => 'ю', 5 => 'ой', 6 => 'е'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['F']['LN'][] = $rule; // #18

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'а' => array(
                2 => 'ы', 3 => 'е', 4 => 'у', 5 => 'ой', 6 => 'е'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['M']['FN'][] = $rule; // #19
$confArray['F']['FN'][] = $rule; // #19

$rule = array(
    'suffix'        => '', // буква предш. оконч.
    'ending'        => array(
        1 => array( // длина окончания
            'я' => array(
                2 => 'и', 3 => 'е', 4 => 'ю', 5 => 'ей', 6 => 'е'
            ),
        ),
    ),
    'exceptions' => array(), // использовать список исключений для 6-го правила
);
$confArray['M']['FN'][] = $rule; // #20
$confArray['F']['FN'][] = $rule; // #20

$config = array(
    'globalExceptions' => $globalExceptions,
    'rules' => $confArray);