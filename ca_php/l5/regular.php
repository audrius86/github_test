<?php
declare(strict_types=1);

//function exercise1(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 3 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//    $numbers = [0, 1, 2, 3, 4];
//    return $numbers[3];
//}
//echo exercise1();

//function exercise2(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 3 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//
//    $numbers = ['zero' => 0, 'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4];
//
//    return $numbers['three'];
//}
//echo exercise2();

//function exercise3(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//
//    $numbers = [
//        [0, 1],
//        [1, 0, 2],
//        [
//            0,
//            [
//                0, 1, 99
//            ],
//        ],
//    ];
//    return $numbers[2][1][2];
//}
//
//echo exercise3();

//function exercise4(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//
//    $numbers = [
//        'first' => [0, 1],
//        'third' => [1, 0, 2],
//        'fourth' => [
//            'value_1' => 0,
//            'value_2' => [
//                'zero' => 0, 'one' => 1, 'ninetynine' => 99
//            ],
//        ],
//    ];
//
//    return $numbers['fourth']['value_2']['ninetynine'];
//}
//
//echo exercise4();


//function exercise5(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//
//    $numbers = [
//        'first' => [0, 1],
//        'third' => [1, 0, 2],
//        'fourth' => [
//            'value_1' => 0,
//            'value_6' => [
//                'zero' => 0, 'one' => 1, 99
//            ],
//        ],
//    ];
//
//    return $numbers['fourth']['value_6'][0];
//}

//echo exercise5();

//function exercise6(): int
//{
//    /*
//    Pasinaudodami masyvo operatoriumi paimkite elementą, kurio reikšmė yra 99 ir grąžinkite tą reikšmę iš funkcijos.
//    */
//
//    $numbers = [
//        'first' => [0, 1],
//        'third' => [1, 0, 2],
//        'fourth' => [
//            'value_1' => 0,
//            'value_6' => [
//                5 => 0, 'one' => 1, 99
//            ],
//        ],
//    ];
//
//    return $numbers['fourth']['value_6'][6];
//}
//
//echo exercise6();

//function exercise7(): array
//{
//    /*
//    Sunaikinkitę reikšmę 2 ir grąžinkite masyvą
//    Turėtumėte gauti masyvą: ['zero' => 0, 'one' => 1, 'three' => 3, 'four' => 4]
//    */
//
//    $numbers = ['zero' => 0, 'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4];
//    unset($numbers['two']);
//    return $numbers;
//}
//
//print_r(exercise7());

//function exercise8(): array
//{
//    /*
//    Sunaikinkitę visas reikšmes, kurios dalijasi 2 ir grąžinkite masyvą
//    Turėtumėte gauti masyvą: ['one' => 1, 'three' => 3, 'four' => 4, 'five' => 5]
//    */
//
//    $numbers = ['ninety' => 90, 'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5];
//    foreach ($numbers as $key => $value){
//        if($value % 2 == 0){
//            unset($numbers[$key]);
//        }
//    }
//
//    return $numbers;
//}
//
//print_r(exercise8());

//function exercise9(int $start, int $end): void
//{
//    /*
//    Išspausdinkite skaičius nuo $start iki $end pasinaudodami ciklu.
//    Jeigu $start yra mažiau nei $end, funkcija nieko nespausdina.
//    */
//    if($start < $end) {
//      }else if($start == $end) {
//        echo $start;
//    }else{
//        while ($start >= $end){
//            echo $start . PHP_EOL;
//            $start--;
//        }
//    }
//
//}
//
//echo exercise9(7, 2);

//function exercise10(int $number): void
//{
//    /*
//    Išspausdinkite skaičius, kurie yra mažesni nei $number ir dalijasi iš 3. Jeigu paduotas skaičius mažesnis nei 0, funkcija nieko nespausdina.
//    Funkcijos kvietimas: exercise10(60)
//    Funkcija spausdina:
//    3
//    6
//    9
//    12
//    ...
//    60
//    */
//    $tempNumber = 1;
//
//    if ($number < 0) {
//
//    } else {
//        while ($tempNumber < $number){
//            if($tempNumber % 3 == 0){
//                echo $tempNumber . PHP_EOL;
//            }
//            $tempNumber++;
//        }
//    }
//}
//
//exercise10(10);

//function exercise11(int $number): void
//{
//    /*
//    Išspausdinkite skaičius nuo $number iki 0 pasinaudodami ciklu. Jeigu paduotas skaičius neigiamas, funkcija nieko nespausdina.
//    Funkcijos kvietimas: exercise11(21)
//    Funkcija spausdina:
//    21
//    20
//    19
//    ...
//    1
//    0
//    */
//
//    if($number < 0){
//
//    }else{
//        while ($number >= 0){
//            echo $number . PHP_EOL;
//            $number--;
//        }
//    }
//}
//
//exercise11(21);

function getNumbers(): array
{
    return [
        99,
        15,
        28,
        13,
        145,
        99,
        12,
        -57,
        -36,
    ];
}
/*
Kiekviena užduoties dalis turi būti funkcija. Tęskite funkcijų numeraciją: exercise12, exercise13 ir t.t.
Masyvą gausite iškvietę funkciją 'getNumbers'
*/

/*
 * 12. Raskite ir grąžinkite visų masyvo narių sumą
 */

//function exercise12(): int
//{
//    $sum = 0;
//    $array = getNumbers();
//    foreach ($array as $value) {
//        $sum += $value;
//    }
//    return $sum;
//}
//
//print_r(exercise12());

//13. Raskite ir grąžinkite lyginių masyvo narių sumą

//function exercise13(): int
//{
//    $sum = 0;
//    $array = getNumbers();
//    foreach ($array as $value) {
//        if($value % 2 == 0) {
//            $sum += $value;
//        }
//    }
//    return $sum;
//}
//
//print_r(exercise13());

//14. Raskite ir grąžinkite teigiamų masyvo narių sumą

//function exercise14(): int
//{
//    $sum = 0;
//    $array = getNumbers();
//    foreach ($array as $value) {
//        if($value > 0) {
//            $sum += $value;
//        }
//    }
//    return $sum;
//}
//
//print_r(exercise14());

//15. Raskite ir grąžinkite sandaugą tų masyvo narių, kurie dalijasi iš 5

//function exercise15(): int
//{
//    $multiply = 1;
//    $array = getNumbers();
//    foreach ($array as $value) {
//        if($value % 5 == 0) {
//            $multiply *= $value;
//        }
//    }
//    return $multiply;
//}
//
//print_r(exercise15());

//16. Raskite ir grąžinkite masyvo narių vidurkį. Neigiamus skaičius paverskite į teigiamus

//function exercise16(): int
//{
//    $array = getNumbers();
//    $sum = 0;
//    $arraySize = count($array);
//
//
//    foreach ($array as $value) {
//           $sum += abs($value);
//    }
//    return $sum / $arraySize;
//}
//
//print_r(exercise16());

//17. Į masyvą pridėkite naują narį - skaičiu 255 - ir išspausdinkite masyva pasinaudodami funkcija 'printr'

//function exercise17()
//{
//    $array = getNumbers();
//    $array[] = 255;
//    print_r($array);
//}
//
//print_r(exercise17());