<?php

///*
// *
// */
////1.
//$counter = 0;
//$array = [];
//
//while($counter <= 21) {
//    $array[] = $counter;
//    $counter++;
//}
////print_r($array);
//
////2.
//foreach ($array as $key => $value){
//    if($value % 2 == 0){
//        $array[$key] = 'x';
//    }
//}
//print_r($array);
//
////3.
//$xCounter = 0;
//foreach ($array as $key => $value){
//    if($value == 'x'){
//        $xCounter++;
//    }
//}
//
//file_put_contents('test/text.txt', $xCounter);
//
//
//
//$counter = 0;
//$array = [];
//
//while($counter <= 21) {
//    if($counter % 2 == 0) {
//        $array[] = 'x';
//    }else{
//        $array[] = $counter;
//    }
//    $counter++;
//}

//
//exit;

/*
 * 1. Kaip ideti php koda is apacios i virsu
 * 2. Kaip refresinti
 *
 */


session_start();
$page = $_GET['page'] ?? null;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php include 'css/style.css'; ?>
    </style>

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index_mano.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="index_mano.php?page=about" class="nav-link px-2 link-dark">About</a></li>
        </ul>
        <?php
        if (isset($_SESSION['email'])) { ?>
        <a id="logout_link" href="pages/logout.php">Logout</a>
        <?php } else { ?>
        <div class="col-md-3 text-end">
            <a href="index_mano.php?page=login" class="btn btn-outline-primary me-2">Login</a>
            <a href="index_mano.php?page=register" class="btn btn-outline-primary me-2">Register</a>
        </div>
        <?php } ?>
    </header>

</div>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <?php

    switch ($page) {
        case null:
            include 'pages/home.php';
            break;

        case 'login':
            include 'pages/login.php';
            break;

        case 'register':
            include 'pages/register.php';
            break;

        case 'register_submit':
            echo "<pre>";
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $repeat_password = $_POST['repeat_password'] ?? null;
            $errors = [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email is wrong';
            }

            if (file_exists("database/users/$email")) {
                $errors[] = "Email is taken";
            }

            if (strlen($password) < 4) {
                $errors[] = "Password is too short";
            }

            if ($password != $repeat_password) {
                $errors[] = "Passwords not match";
            }

            if (!empty($errors)) {
                echo "<pre>";
                print_r($errors);
                echo "</pre>";
            } else {
                file_put_contents("database/users/$email", $password);
            }
            break;

        case 'login_submit':
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            $user_password = file_get_contents("database/users/$email");

            $errors = [];

            if (!file_exists("database/users/$email")) {
                $errors[] = "Email not found";
            }

            if ($password != $user_password) {
                $errors[] = "Wrong password";
            }

            if (!empty($errors)) {
                echo "<pre>";
                print_r($errors);
                echo "</pre>";
            } else {
                $_SESSION['email'] = $email;
                header("Location:http://localhost/CodeAcademy/svetaine/index_mano.php");
            }
            break;

    }
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</html>

