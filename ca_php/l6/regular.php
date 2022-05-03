<?php
declare(strict_types=1);

function getCities(): array
{
    return [
        [
            'name' => 'Tokyo',
            'population' => 37435191,
        ],
        [
            'name' => 'Delhi',
            'population' => 29399141,
        ],
        [
            'name' => 'Shanghai',
            'population' => 26317104,
        ],
        [
            'name' => 'Sao Paulo',
            'population' => 21846507,
        ],
        [
            'name' => 'Mexico City',
            'population' => 21671908,
        ],
        [
            'name' => 'New York',
            'population' => 25000000,
        ],
    ];
}

//function exercise1(): int
//{
//    /*
//    Suskaičiuokite bendrą miestų populiaciją pasinaudodami paprastu 'foreach' ir grąžinkite ją iš funkcijos.
//    Miestus pasiimkite iškvietę funkciją 'getCities'
//    */
//
//    $citiesArray = getCities();
//    $sumOfPopulation = 0;
//
//    foreach ($citiesArray as $value){
//        $sumOfPopulation += $value['population'];
//    }
//
//    return $sumOfPopulation;
//}
//
//echo exercise1();

//function exercise2(): int
//{
//    /*
//    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcijomis array_column ir array_sum
//    ir grąžinkite ją iš funkcijos
//    */
//    $citiesArray = getCities();
//
//    return array_sum(array_column($citiesArray, 'population'));;
//}
//
//echo exercise2();


//function suma($prev, $curr){
//    return $prev + $curr;
//}

//NOT FINISHED!!!!!!!!!!!!!!!!!!!!!!!

//function exercise3(): int
//{
//    /*
//    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcija array_reduce ir grąžinkite ją iš funkcijos
//    */
//    $citiesArray = getCities();
//
//    $modifiedArray = var_export(array_column($citiesArray, 'population'));
//
//
//   return 0;
////       array_reduce($modifiedArray, "suma", 0);
//}
//
//echo exercise3();

//function exercise4(): int
//{
//    /*
//    Suskaičiuokite populiaciją miestų, kurie yra didesni nei 25,000,000 gyventojų.
//    Rinkites sau patogiausią skaičiavimo būdą.
//    */
//
//    $citiesArray = getCities();
//    $sumOfPopulation = 0;
//
//    foreach ($citiesArray as $value){
//        if($value['population'] > 25000000) {
//            $sumOfPopulation += $value['population'];
//        }
//    }
//
//    return $sumOfPopulation;
//}
//
//echo exercise4();

//function exercise5():array
//{
//    /*
//    Grąžinkite masyvą, kuriame būtų tik tie miestai, kurie yra didesni nei 25,000,000 gyventojų
//    Rezultatas turi būti tokios pat struktūros, kaip ir pradinis miestų masyvas:
//    [
//        [
//            'name' => 'Tokyo',
//            'population' => 37435191,
//        ],
//        ...
//    ]
//    */
//        $citiesArray = getCities();
//
//    foreach ($citiesArray as $key => $value){
//        if($value['population'] <= 25000000) {
//            unset($citiesArray[$key]);
//        }
//    }
//
//      return $citiesArray;
//}
//
//print_r(exercise5());

//function exercise6(): int
//{
//
//    /*
//    Suskaičiuokite ir grąžinkite bendrą užsakymo sumą.
//    Prekėms, kurių pavadinimai nurodyti masyve $lowPriceItems, taikykite kainą 'priceLow'.
//    Kitoms prekėms taikykite kainą 'priceRegular'.
//    Bandykite panaudoti array_* funkcijas.
//    */
//
//    $lowPriceItems = ['t-shirt', 'shoes'];
//
//    $orderItems = [
//        [
//            'name' => 't-shirt',
//            'priceRegular' => 15,
//            'priceLow' => 13,
//            'quantity' => 3,
//        ],
//        [
//            'name' => 'coat',
//            'priceRegular' => 74,
//            'priceLow' => 60,
//            'quantity' => 6,
//        ],
//        [
//            'name' => 'shirt',
//            'priceRegular' => 25,
//            'priceLow' => 20,
//            'quantity' => 2,
//        ],
//        [
//            'name' => 'shoes',
//            'priceRegular' => 115,
//            'priceLow' => 100,
//            'quantity' => 1,
//        ],
//    ];
//    $totalPrice = 0;
//
//    foreach ($orderItems as $value){
//        if(in_array(($value['name']), $lowPriceItems)){
//            $totalPrice += ($value['priceLow'] * $value['quantity']);
//        }else{
//            $totalPrice += ($value['priceRegular'] * $value['quantity']);
//        }
//    }
//
//    return $totalPrice;
//}
//
//echo exercise6();