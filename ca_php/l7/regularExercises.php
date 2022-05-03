<?php

declare(strict_types=1);

$someProducts = [
    '000_product_1  ',
    ' 000_product_2',
    '000_product_3  ',
    '000_product_4',
    '  000_product_5 ',
    '000_product_20
    ',
];

function exercise1(): array
{
    /*
    Išskaidykite $longLine kintamajį į atskirus žodžius. Žodžiai turi grįžti iš funkcijos masyvo formoje. Skaidykite per underscore (_)
    */
    $longLine = 'Hello_how_are_you_doing?';

    return explode('_', $longLine);;
}
//echo '<pre>';
//print_r(exercise1());
//echo '<pre>';

function exercise2(): array
{
    /*
    Grąžinkite masyvą, kuris talpintų tik tuos žodžius, kurie panašūs į emailų adresus
    t.y. turi savyje simbolį @
    */
    $emails = [
        'some@email.com',
        'someAemail.com',
        'another@gmail.com',
        'notAreal.email.com',
        'real@gmail.com',
    ];

    foreach ($emails as $key => $value) {
        if(!str_contains($value, '@')){
            unset($emails[$key]);
        }
    }

    return array_values($emails);
}
//echo '<pre>';
//print_r(exercise2());
//echo '<pre>';


function exercise3(array $products): int
{
    /*
    Suskaičiuokite ir grąžinkite visų $products masyve esančių eilučių ilgių sumą.
    Naudokite $someProducts masyvą
    */
    $totalNumber = 0;
    foreach ($products as $key => $values){
        $totalNumber += strlen($values);
    }

    return $totalNumber;
}

//echo exercise3($someProducts);



function exercise4(array $products): int
{
    /*
    Suskaičiuokite ir grąžinkite visų $products masyve esančių eilučių ilgių sumą, BET
    į sumą neįtraukite tuščių simbolių - ty. tarpų, new line ir pan.
    Naudokite $someProducts masyvą.
    */
    $totalNumber = 0;
    foreach ($products as $key => $values){
        $totalNumber += strlen(trim($values));
    }

    return $totalNumber;
}

//echo exercise4($someProducts);

function exercise5(): int
{
    $text = 'The African  philosophy of Ubuntu has its roots in the Nguni word for being human. The concept emphasises the significance of our community and shared humanity and teaches us that "A person is a person through others". Many view the philosphy as a counterweight to the culture of individualism in our contemporary world.';

    /*
    Suskaičiuokite kiek balsių yra tekste
    */

    return preg_match_all('/[aeiou]/i',$text,$matches);
}

echo exercise5();