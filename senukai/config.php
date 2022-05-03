<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ip = 'localhost';
$username = 'root';
$password = '';
$data_base = 'senukai';

$connection = mysqli_connect($ip, $username, $password, $data_base);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$page = $_REQUEST['page'] ?? null;