<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="main_container">
    <section class="section_header">
        <h1>Audriaus Blog'as</h1>
    </section>
    <section class="section_menu">
        <div class="left">
        <a href="index.php">Home</a>
        <a href="">About</a>
        </div>
        <div class="right">
            <?php if (isLoged() === false) { ?>
        <a href="index.php?page=login">Login</a>
        <a href="index.php?page=register">Register</a>
        <?php } else { ?>
        <a href="">Write Entry</a>
        <a href="">Update Entry</a>
        <a href="">Delete Entry</a>
        <a href="index.php?page=logout">Logout</a>
        <?php } ?>
        </div>
    </section>
    <?php

    if ($page == null) {
        include 'pages/home.php';
    } elseif ($page === 'register') {
        include 'pages/register.php';
    } elseif ($page === 'login') {
        include 'pages/login.php';
    }elseif ($page === 'logout') {
        include 'pages/logout.php';
    }
    ?>
</div>



<br/><br/>
<!--footer-->
<?php
echo date('Y-m-d H:i:s');
?>

</body>
</html>
