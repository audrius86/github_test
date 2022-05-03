<?php
// ijungti klaidu pranesimus
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//prisijungimai prie duomenu bazes
$ip = 'localhost';
$username = 'root';
$password = '';
$database = 'web';

// jungiames prie duomenu bazes
$database = mysqli_connect($ip, $username, $password, $database);

// Tikrinam ar pavyko prisijungti prie duomenu bazes
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo 'pavyko prisijungti labai';
}
echo "<hr>";
//select gauti

$sql = 'select * from users LIMIT 3';
$result = mysqli_query($database, $sql);

//$a = mysqli_num_rows($results);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo '<pre>';
print_r($users);
echo '</pre>';

//update

//$sql = 'update users set name=\'Karolis\' where id = 5';
//$result = mysqli_query($database, $sql);
//var_dump($result);

//create

//$sql = 'insert into users (name, age, sex, password, email) values ("Saule", 30, "male", "123456", "saule@gmail.com")';
//$result = mysqli_query($database,$sql);
//var_dump($result);
//delete
//$sql = 'delete from users where id = 5';
//$result = mysqli_query($database, $sql);
//var_dump($result);