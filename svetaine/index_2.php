<?php
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

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index_mano.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="index_mano.php?page=about" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['email'])) { ?>
                <a href="index_mano.php?page=logout" class="btn btn-outline-primary me-2">Logout</a>
            <?php } else { ?>
                <a href="index_mano.php?page=login" class="btn btn-outline-primary me-2">Login</a>
                <a href="index_mano.php?page=register" class="btn btn-outline-primary me-2">Register</a>
            <?php } ?>
        </div>
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
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $repeat_password = $_POST['repeat_password'] ?? null;

            $errors = [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email is wrong';
            }

            if (file_exists("database/users/$email")) {
                $errors[] = 'Email is taken';
            }

            if (strlen($password) < 7) {
                $errors[] = 'Password too short';
            }

            if ($password != $repeat_password) {
                $errors[] = 'Passwords not match';
            }

            if (!empty($errors)) {
                echo '<pre>';
                print_r($errors);
                echo '</pre>';
            } else {
                file_put_contents("database/users/$email", $password);
                echo 'user created';
            }
            break;
        case 'login_submit':
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            $user_password = file_get_contents("database/users/$email");

            $errors = [];

            if (!file_exists("database/users/$email")) {
                $errors[] = 'Email not found';
            }

            if ($password != $user_password) {
                $errors[] = 'Wrong password';
            }

            if (!empty($errors)) {
                echo '<pre>';
                print_r($errors);
                echo '</pre>';
            } else {
                $_SESSION['email'] = $email;
            }
            break;
        case 'logout':
            session_destroy();
            header('Location: /');
            break;
    }

    if (isset($_SESSION['email'])) {
        echo 'prisijunges';
    } else {
        echo 'atsijunges';
    }
    ?>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
