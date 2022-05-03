<?php
declare(strict_types=1);

/*
 * https://github.com/donatascn/ca-php-course
1.
- Patogioje vietoje susikurkite katalogą, kuriame talpinsite šios kurso dalies failus​
- Atsidarykite jį su kodo editoriumi​
- Kodo editoriaus failų naršyklėje susikurkite subdirektoriją 'test' bei failą joje - 'test.txt'.
Faile parašykite tekstą 'Hello world' ir išsaugokite​
- Atsidarykite į kodo editorių integruotą terminalą - naudokite Git Bash​ (jeigu naudojate VS Code)
- Pasitikrinkite, kurioje direktorijoje veikia terminalas.
Ar tai ta pati direktorija, kuri atidaryta kodo editoriuje?​
Jeigu ne, pakeiskite terminalo direktoriją, kad sutaptų su atidaryta kodo editoriuje.
- Komandinėje eilutėje pereikite į savo sukurtą subdirektoriją 'test'​
- Ten paleiskite komandą, kuri išspausdina direktorijos turinį. Ar matote ten savo sukurto failo pavadinimą? cmd -> ls
- Terminale išspausdinkite failo turinį - turėtu rodyti "Hello world" cmd -> type test.txt
- Terminale grįžkite į pradinę direktoriją
- Ištrinkite subdirektoriją 'test'
*/


/*
2. Paleiskite šį failą komandinės eilutės pagalba. Turėtumėte terminale matyti tekstą 'Hello'.
php index_mano.php
*/
//echo 'Hello';
//echo PHP_EOL;

/*
3. Šioje direktorijoje sukurkite dar vieną PHP failą pavadinimu file_to_load.php.
Jame pridėkite eilutę, kuri spausdintų tekstą 'Greetings from another file'.
Paleidus failą 'exercises.php' per CLI, turėtų išspausdinti faile 'file_to_load.php' esantį tekstą.
*/

//include 'file_to_load.php';


/*
4. Pridėkite kodo eilutę, kuri sustabdytų šio scripto vykdymą. Patikrinkite, ar sustabdymas veikia,
nuėmę komentarą (//) nuo eilutės nr. 54 . Paleidus kodą, atkomentuotos eilutės neturėtų matytis
*/
// jūsų kodas, sustabdantis programos vykdymą:
//exit;
//
//echo 'You should not be seeing this line printed';

/*
5. Pašalinkite/užkomentuokite praeitos užduoties eilutes, kad jos netrukdytų toliau tęsti darbo.
Išveskite į terminalą kintamojo $variableToDebug:
- tik reikšmę
- reikšmę kartu su duomens tipu
*/
//$variableToDebug = 15;
////echo $variableToDebug;
//var_dump($variableToDebug);