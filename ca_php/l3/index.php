<?php
declare(strict_types=1);

/*
1. Apskaičiuokite PHP pagalba ir išveskite į terminalą. Kiekvienas rezultatas turi būti naujoje eilutėje:
987 + 545 - 32 * 94
32 pakelkite laipsniu 3 ir pridėkite 18
120 padalinkite iš 4 ir dar karta padalinkite iš 3
kokia liekana lieka po skaičiaus 187 dalybos iš 5
skaičiui 3 tris kartus pritaikykite increment operatorių - koki skaičių gaunate?
skaičiui 12 keturis kartus pritaikykite decrement operatorių - koki skaičių gaunate?
*/

//echo 987 + 545 - 32 * 94 . PHP_EOL;
//echo pow(32, 3) + 18 . PHP_EOL;
//echo (120 / 4) / 3 . PHP_EOL;
//echo 187 % 5 . PHP_EOL;
//$num1 = 3;
//$num1++;
//$num1++;
//$num1++;
//echo $num1 . PHP_EOL;
//$num2 = 12;
//$num2--;
//$num2--;
//$num2--;
//$num2--;
//echo $num2 . PHP_EOL;

/*
2. Išspausdinkite skaičius nuo 1 iki 10 naudodamiesi ciklu. Panaudokite visus 4 būdus ciklams aprašyti.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.
1
2
3
...
*/

//$counter = 1;

//1
//while ($counter < 11){
//    echo $counter . PHP_EOL;
//    $counter++;
//}

//2
//do{
//    echo $counter . PHP_EOL;
//    $counter++;
//}while($counter < 11);

//3
//for ($i = 0; $i < 10; $i++){
//    echo $counter . PHP_EOL;
//    $counter++;
//}

//4
//$numbersArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
//foreach ($numbersArray as $number) {
//    echo $number . PHP_EOL;
//}
/*
3. Išspausdinkite skaičius nuo 15 iki 3 naudodamiesi ciklu. Panaudokite sau patogiausią ciklą.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.
*/

//$counter = 15;
//while ($counter >= 3) {
//    echo $counter . PHP_EOL;
//    $counter--;
//}

/*
4. Išspausdinkite kas antrą skaičių nuo 1 iki 20 naudodamiesi ciklu.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.
1
3
5
...
*/

//$counter = 1;
//while ($counter <= 20) {
//    echo $counter . PHP_EOL;
//    $counter += 2;
//}

/*
5. Išspausdinkite skaičius, nuo 1 iki 20, kurie dalijasi iš 3.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.
*/

//$counter = 1;
//while ($counter <= 20) {
//    if($counter % 3 == 0) {
//        echo $counter . PHP_EOL;
//    }
//    $counter++;
//}

/*
6. Išspausdinkite skaičius, nuo 1 iki 20, kurie dalijasi iš 3 arba iš 5.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.
*/

//$counter = 1;
//while ($counter <= 20) {
//    if($counter % 3 == 0 or $counter % 5 == 0) {
//        echo $counter . PHP_EOL;
//    }
//    $counter++;
//}

/*
7. Iteruokite per skaičius, nuo 1 iki 20.
Jeigu skaičius dalijasi iš 3, išspausdinkite žodį 'Hey'.
Jeigu skaičius dalijasi iš 5, išspausdinkite žodį Ho'.
Jeigu skaičius dalijasi ir iš 5, ir iš 3, išspausdinkite žodį 'HeyHo'.
Kitu atveju išspausdinkite skaičių.
Viskas turi būti atspausdinti vienoje eilutėje su tarpais:
1 2 Hey 4 Ho Hey 7 8 Hey Ho 11 Hey 13 14 HeyHo 16 17 Hey 19 Ho
*/

//$counter = 1;
//while ($counter <= 20) {
//    if($counter % 3 == 0) {
//        echo "Hey ";
//    }else if($counter % 5 == 0) {
//        echo "Ho ";
//    }else if($counter % 3 == 0 and $counter % 5 == 0) {
//        echo "HeyHo ";
//    }else{
//        echo "$counter ";
//    }
//    $counter++;
//}

/*
8. Raskite sveikų skaičių nuo 1 iki 100 sumą.
*/

//$sum = 0;
//$counter = 1;
//while ($counter <= 100){
//    $sum += $counter;
//    $counter++;
//}
//echo $sum;

/*
9. Pasinaudodami ciklu išspausdinkite savaitės dienas iš masyvo $days vienoje eilutėje:
monday-tuesday-wednesday-thursday-friday-saturday-sunday-
*/

//$days = [
//    'monday',
//    'tuesday',
//    'wednesday',
//    'thursday',
//    'friday',
//    'saturday',
//    'sunday',
//];
//
//foreach ($days as $day){
//    if(!next($days)){
//        echo "$day";
//    }
//    else{
//        echo "$day-";
//    }
//}

/*
10. Iteruokite sveikus skaičius nuo -5 iki 5.
Išspausdinkite skaičių dvejopai:
1. Pasinaudojant paprastu echo
2. Pasinaudojant funkcija var_dump ir prieš tai pavertus į 'bool' tipo reikšmę
-5
bool(true)
-4
bool(true)
...
HINT: atkreipkite dėmesį į ką pavirsta skaičius 0
*/

//$counter = -5;
//while ($counter <= 5){
//    echo $counter . PHP_EOL;
//    var_dump((bool)$counter) . PHP_EOL;
//    $counter++;
//}