<?php
$email = $_SESSION['email'];
$user = file_get_contents(DATABASE_USERS_PATH . $email);
$check_credits = explode('|', $user);


if(isset($_POST['number_of_credits']) and isset($_POST['number'])) {
if ($check_credits[4] > 0 and $check_credits[4] >= $_POST['number_of_credits']) {
//    if (isset($_POST['number'])) {


        if (is_numeric($_POST['number'])) {
            $userGuess = (int)$_POST['number'];
        }else{
            $userGuess = null;
        }

            if(isset($_POST['game_level']) and $_POST['game_level'] != ''){
                $option = $_POST['game_level'];
                switch ($option){
                    case 'easy':
                        $randomNumber = rand(1, 5);
                        if ($userGuess > 0 and $userGuess <= 5) {
                            if ($userGuess == $randomNumber) {
                                $result = 'Atspeta';
                                changeCreditsBalance('+', 2);
                            } else {
                                $result = 'Neatspeta';
                                changeCreditsBalance('-', 1);
                            }
                        } else{
                            echo 'In `Easy` level you should guess number from 1 to 5.';
                            echo '<br>';
                            echo 'Press `Atspek skaiciu` and try again!';
                            exit;
                        }
                        break;
                    case 'medium':
                        $randomNumber = rand(1, 10);
                        if ($userGuess > 0 and $userGuess <= 10) {
                        if ($userGuess == $randomNumber) {
                            $result = 'Atspeta';
                            changeCreditsBalance('+', 3);
                        } else {
                            $result = 'Neatspeta';
                            changeCreditsBalance('-', 1);
                        }
                        } else{
                            echo 'In `Medium` level you should guess number from 1 to 10.';
                            echo '<br>';
                            echo 'Press `Atspek skaiciu` and try again!';
                            exit;
                        }
                        break;
                    case 'hard':
                        $randomNumber = rand(1, 100);
                        if ($userGuess > 0 and $userGuess <= 100) {
                        if ($userGuess == $randomNumber) {
                            $result = 'Atspeta';
                            changeCreditsBalance('+', 10);
                        } else {
                            $result = 'Neatspeta';
                            changeCreditsBalance('-', 1);
                        }
                        } else{
                            echo 'In `Hard` level you should guess number from 1 to 100.';
                            echo '<br>';
                            echo 'Press `Atspek skaiciu` and try again!';
                            exit;
                        }
                        break;

                }

                if (isLoged()) {
                    $user = file_get_contents(DATABASE_USERS_PATH . $email);
                    $user = explode('|', $user);
                    $name = $user[0];
                }

                $allGuesses = file_get_contents(DATABASE_GUESS_LIST);
                $data = [$email, $userGuess, $randomNumber, $result, date('Y-m-d H:i:s')];
                $data = implode('|', $data);
                if (!empty($allGuesses)) {
                    $allGuesses .= '#' . $data;
                } else {
                    $allGuesses = $data;
                }
                file_put_contents(DATABASE_GUESS_LIST, $allGuesses);
            }else{
                echo 'Choose game level';
            };
} else {
    echo "Please fill your credits balance. Go to `Nustatymai`";
}

}

//pralaimeti pinigai kaupiasi superBanke, ji galima laimeti spejant nuo 1 iki 1000


function changeCreditsBalance($symbol, $number)
{
    $amount = $_POST['number_of_credits'];
    $email = $_SESSION['email'];
    $credits = file_get_contents(DATABASE_USERS_PATH . $email);
    $credits = explode('|', $credits);

    if ($credits[4] > 0) {
        if ($symbol === '+') {
            $credits[4] += (int)$amount * $number;
        } else {
            $credits[4] -= (int)$amount;
        }
    } else {
        echo 'Go to Nustatymai and add some credits';
    }
    file_put_contents(DATABASE_USERS_PATH . $email, implode("|", $credits));
}

?>

<h1>Atspek skaiciu</h1>
<!--<fieldset>-->
<!--    <legend>Taisykles</legend>-->
<!--    <ul>-->
<!--        <li></li>-->
<!--    </ul>-->
<!--</fieldset>-->
<!--<br/>-->
<!--<br/>-->

<big>Kreditai: <?php
    //    $email = $_SESSION['email'];
    $user = file_get_contents(DATABASE_USERS_PATH . $email);
    $user = explode('|', $user);
    if (!isset($user[4]) or $user[4] == null) {
        echo "0";
    } else {
        echo $user[4];
    } ?></big><br/>
<form action="index.php?page=spek_skaiciu" method="post">
    <input type="number" name="number_of_credits" placeholder="Amount of credits">
    <br>
    <label for="game_level">Game level</label>
    <select name="game_level" id="game_level">
        <option value="">
            -
        </option>
        <option value="easy">
            Easy
        </option>
        <option value="medium">
            Medium
        </option>
        <option value="hard">
        Hard
        </option>
    </select>
    <br>
    <input type="text" name="number" placeholder="Guess a number">
    <br>
    <button type="submit">Speti</button>
</form>
<br/>
<br/>
<?php
$allGuessesData = file_get_contents(DATABASE_GUESS_LIST);
$allGuessesData = explode("#", $allGuessesData);

$userArray = [];

foreach ($allGuessesData as $key => $value) {
    $value = explode("|", $value);
    if ($value[3] == 'Atspeta') {
        if (isset($userArray[$value[0]])) {
            $userArray[$value[0]]++;
        } else {
            $userArray[$value[0]] = 1;
        }
    }
}
arsort($userArray);

?>

<fieldset>
    <legend>Top 3 daugiausiai atspejo</legend>
    <table>
        <tr>
            <th>
                Vieta
            </th>
            <th>
                Vardas
            </th>
            <th>
                Laimėjimai
            </th>
        </tr>
        <?php
        $counter = 0;
        foreach ($userArray as $key => $value) {
            $counter++;
            if ($counter <= 3) {
                ?>
                <tr>

                    <td>
                        <?php echo $counter ?>
                    </td>
                    <td>
                        <?php
                        $user = file_get_contents(DATABASE_USERS_PATH . $key);
                        $user = explode('|', $user);
                        echo $user[0] ?>
                    </td>
                    <td>
                        <?php echo $value ?>
                    </td>
                </tr>
            <?php }
        } ?>

    </table>
</fieldset>
<br/>
<?php
$guessesArray = [];
$allGuessesData = file_get_contents(DATABASE_GUESS_LIST);
$allGuessesData = explode("#", $allGuessesData);
$allGuessesData = array_reverse($allGuessesData);

foreach ($allGuessesData as $key => $value) {
    $value = explode("|", $value);
    $guessesArray[] = $value[2];
}

$numbersArray = array_count_values($guessesArray);
$allNumbers = count($guessesArray);

?>
<fieldset>
    <legend>Skaiciu tikimybes</legend>
    <table>
        <tr>
            <?php for ($counter = 0; $counter <= 10; $counter++) { ?>
                <th>
                    <?php echo $counter ?>
                </th>
            <?php } ?>
        </tr>
        <tr>
            <?php for ($counter = 0; $counter <= 10; $counter++) { ?>
                <td>
                    <?php echo round(($numbersArray[$counter] / $allNumbers) * 100, 1) . '%'; ?>
                </td>
            <?php } ?>
        </tr>
    </table>
</fieldset>
<br/>
<br/>

<fieldset>
    <legend>Spejimu istorija</legend>
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
        $allGuessesData = file_get_contents(DATABASE_GUESS_LIST);
        $allGuessesData = explode("#", $allGuessesData);
        $allGuessesData = array_reverse($allGuessesData);
        $counter = 0;

        foreach ($allGuessesData as $value) {
            $counter++;
            if ($counter <= 10) {
                $value = explode("|", $value);
                $user = file_get_contents(DATABASE_USERS_PATH . $value[0]);
                $user = explode('|', $user);
                ?>
                <tr>
                    <td>
                        <?php
                        echo $user[0];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value[1];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value[2];
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value[3] == 'Atspeta') {
                            echo '✌'; //✔
                        } else {
                            echo '⛔'; //✖
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $value[4];
                        ?>
                    </td>
                </tr>
            <?php } else {
                break;
            }
        } ?>
    </table>
</fieldset>
<br/>
<br/>
<fieldset>
    <legend>Skaiciu istorija:</legend>
    <?php
    $counter = 0;
    foreach ($allGuessesData as $key => $value) {
        if ($counter <= 100) {
            $counter++;
            $value = explode("|", $value);
            echo $value[2] . " | ";
        }
    }
    ?>
</fieldset>
</br>
