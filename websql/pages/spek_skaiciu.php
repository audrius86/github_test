<h1>Atspek skaiciu</h1>
<?php
//pasiima faile esancia informacija
$lines = file_get_contents(DATABASE_NUMBERS);

//tiktinam ar vartotojas prisijunges
if (isLoged() === true) {

    //Tikrinam ar per forma buvo POST metodu perduotas 'number' parametras
    if (isset($_POST['number'])) {

        //sukuriam nauja kintamaji kuriam priskiriam perduoto paramertro reiksme
        $number = $_POST['number'];

        //TIkrinam ar kintamasis 'numbers' yra numeric
        if (!is_numeric($number)) {
            echo 'Klaida';
        } else {

            // gaunam random skaiciu nuo 0 iki 10
            $lucky_number = rand(0, 10);

            //tikrinam ar musu ivestas skaicius lygus sugeneruotam laimingam skaiciui
            if ($lucky_number == $number) {
                echo 'Rezultatas: Sveikiname, atspejote skaiciu';
            } else {
                echo 'Rezultatas: Bandyk dar karta';
            }

            echo '<hr>';
            echo 'Laimingas skaicius: ' . $lucky_number . '<br/>';
            echo 'Tavo spetas skaicius: ' . $number . '<br/>';
            echo '<br/><br/>';

            //sukuriamas naujas eilutes masyvas
            $lineArray = [
                $_SESSION['email'],
                $number,
                $lucky_number,
                date('Y-m-d H:i:s')
            ];

            //eilutes masyvas paverciamas i stringa
            $lineString = implode('|', $lineArray);

            //tikrinam ar failo vidus yra netuscias
            if (!empty($lines)) {
                $lines = $lineString . "\n" . $lines; // pridedam i prieki nauja eilute
            } else {
                $lines = $lineString;
            }

            //issaugom i faila atnaujinta lines masyvas
            file_put_contents(DATABASE_NUMBERS, $lines);
        }
    }
}
?>


<!--<fieldset>-->
<!--    <legend>Taisykles</legend>-->
<!--    <ul>-->
<!--        <li></li>-->
<!--    </ul>-->
<!--</fieldset>-->
<!--<br/>-->
<!--<br/>-->
<!--<big>Kreditai: -</big><br/>-->
<?php if (isLoged() === true) { ?>
    <form action="index.php?page=spek_skaiciu" method="post">
        <input type="text" name="number">
        <button type="submit">Speti</button>
    </form>
    <br/>
    <br/>
<?php } ?>
<fieldset>
    <legend>Top 3 daugiausiai atspejo</legend>
    <?php
    $users = [];
    $users_wins = [];

    //failo informacija paverciam i masyva
    $lines = explode("\n", $lines);

    foreach ($lines as $line) {
        $line = explode('|', $line);

        //pasiimam userio faila
        $user = file_get_contents(DATABASE_USERS_PATH . $line[0]);

        //paimta userio informacija (string), paverciam i masyva
        $user = explode('|', $user);

        if (!isset($users[$line[0]])) {
            $users[$line[0]] = [
                'name' => $user[0],
                'wins' => 0,
                'games' => 0,
            ];
        }

        if (!isset($users_wins[$line[0]])) {
            $users_wins[$line[0]] = 0;
        }

        if ($line[1] == $line[2]) {
            $users[$line[0]]['wins'] += 1;
            $users_wins[$line[0]] += 1;
        }

        $users[$line[0]]['games'] += 1;
    }
    ?>

    <table>
        <tr>
            <th>
                Vieta
            </th>
            <th>
                Vardas
            </th>
            <th>
                Laimejimai
            </th>
            <th>
                Tikimybe, kad atspes
            </th>
        </tr>
        <?php
        $place = 1;
        ksort($users_wins);
        foreach ($users_wins as $email => $wins) {
            ?>
            <tr>
                <td>
                    <?php echo $place ?>
                </td>
                <td>
                    <?php echo $users[$email]['name'] ?>
                </td>
                <td>
                    <?php echo $wins ?>
                </td>
                <td>
                    <?php echo round($wins * (100 / $users[$email]['games'])) ?> %
                </td>
            </tr>
            <?php
            if ($place == 3) {
                break;
            }
            $place += 1;
        }
        ?>
    </table>
</fieldset>
<br/>
<br/>
<fieldset>
    <legend>Skaiciu tikimybes</legend>
    <?php
    if (!empty($lines)) {
        $lucky_numbers = [];

        //pradedam eiti per visas failo eilutes
        foreach ($lines as $line) {

            // failo eilute kuri siuo metu yra string, paverciam i masyva
            $line = explode('|', $line);

            //pridedam i masyva lucky number
            $lucky_numbers[] = $line[2];
        }

        //gaunam pasikartojancius skaicius
        $lucky_numbers = array_count_values($lucky_numbers);
        ?>
        <table>
            <tr>
                <th>
                    Skaicius
                </th>
                <th>
                    Tikimybe
                </th>
            </tr>
            <?php
            for ($i = 0; $i <= 10; $i++) {
                //tikrinam ar $i yra tarp $lucky_number keys
                if (!in_array($i, array_keys($lucky_numbers))) {
                    $count = 0;
                } else {
                    $count = round($lucky_numbers[$i] * (100 / count($lines)));
                }
                ?>
                <tr>
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <?php echo $count ?> %
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</fieldset>
<br/>
<br/>

<fieldset>
    <legend>Spejimu istorija</legend>
    <?php if (!empty($lines)) { ?>
        <table>
            <tr>
                <th>
                    Vardas
                </th>
                <th>
                    Spetas skaicius
                </th>
                <th>
                    Teisingas skaicius
                </th>
                <th>
                    Rezultatas
                </th>
                <th>
                    Data
                </th>
            </tr>
            <?php

            //pradedam eiti per visas failo eilutes
            foreach ($lines as $line) {

                // failo eilute kuri siuo metu yra string, paverciam i masyva
                $line = explode('|', $line);

                //pasiimam userio faila
                $user = file_get_contents(DATABASE_USERS_PATH . $line[0]);

                //paimta userio informacija (string), paverciam i masyva
                $user = explode('|', $user);
                ?>
                <tr>
                    <td>
                        <?php echo $user[0] ?>
                    </td>
                    <td>
                        <?php echo $line[1] ?>
                    </td>
                    <td>
                        <?php echo $line[2] ?>
                    </td>
                    <td>
                        <?php
                        if ($line[1] == $line[2]) {
                            echo '+';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $line[3] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        Spejimu nera
    <?php } ?>
</fieldset>
