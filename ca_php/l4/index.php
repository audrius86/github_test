<?php
declare(strict_types=1);

// Visur sudėkite reikiamus parametrų bei return tipus

/*
1. Parašykite funkciją 'dividesBy5', kuri priimtų int tipo skaičių ir grąžintų jo dalybos iš 5 liekaną.
*/
///**
// * @param int $number
// * @return int
// */
//
//function dividesBy5 (int $number): int
//{
//    return $number % 5;
//}
//
//echo dividesBy5(11);

/*
2. Parašykite funkciją 'arrayPrinter', kuri priimtų array tipo parametrą ir
išspausdintų kiekvieną masyvo elementą naujoje eilutėje.
Funkcijos kvietimas: arrayPrinter(['some text', 'another text'])
Funkcija grąžina: funkcija nieko negrąžina - ji tik išspausdina masyvą į terminalą
'some text'
'another text'
*/

//function arrayPrinter (array $array){
//    foreach ($array as $value){
//        echo $value . PHP_EOL;
//    }
//}
//arrayPrinter(['some text', 'another text']);

/*
3. Parašykite funkciją 'stringEnhancer', kuri grąžintų pakeistą tekstą.
Funkcijos kvietimas: stringEnhancer('some text', '##')
Funkcija grąžina: '##some text##'
Funkcijos kvietimas: stringEnhancer('some text')
Funkcija grąžina: '**some text**'
*/

///**
// * @param string $string
// * @param string $symbols
// * @return string
// */
//
//function stringEnhancer (string $string, string $symbols):string
//{
//    return $symbols . $string . $symbols;
//}
//
////echo stringEnhancer('some text', '##');
//echo stringEnhancer('some text', '**');

/*
4. Parašykite funkciją 'stringModifier', kuri pakeistų paduotą string tipo kintamąjį.
Funkcijos kvietimas:
$x = 'some text';
stringModifier($x, '##');
echo $x; // '##some text##'
Funkcija grąžina: funkcija nieko negrąžina
*/
//function stringModifier (string $x, string $symbols){
//    global $x;
//    $x = $symbols . $x . $symbols;
//}
//$x = 'some text';
//stringModifier($x, '##');
//echo $x;

/*
5. Parašykite funkciją 'textReplicator', kuri grąžintų 'padaugintą' tekstą.
Funkcijos kvietimas:
textReplicator('some_text', 3);
Funkcija grąžina: 'some_text-some_text-some_text'
Funkcijos kvietimas:
textReplicator('some_text', null);
Funkcija grąžina: 'some_text'
*/

//function textReplicator (string $string, $counter):string
//{
//    if ($counter == null) {
//        $counter = 1;
//        $separator='';
//        return str_repeat($string.$separator, $counter);
//    }else{
//        $separator='-';
//        return str_repeat($string.$separator, $counter);
//    }
//
//}
//echo textReplicator('some_text', 2);
//echo textReplicator('some_text', null);
/*
6. Paverskite funkciją 'textReplicator', į veikiančią anoniminę funkciją.
*/

//$anonymousFunction = function (String $string, $counter):string
//{
//    if ($counter == null) {
//        $counter = 1;
//        $separator='';
//        return str_repeat($string.$separator, $counter);
//    }else{
//        $separator='-';
//        return rtrim(str_repeat($string.$separator, $counter), "-");
//    }
//
//};
//
//echo $anonymousFunction("Labas", 5);