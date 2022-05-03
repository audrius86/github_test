<?php
session_start();
//https://codeacademy.ezoom.dev/code.php?file=/home/sarunas/domains/codeacademy.ezoom.dev/public_html/index.php

/*
 * Login metu patikrinimus padaryti, kai blogas passwordas arba tuscia ivestis
 * funkcija kuri pateikia info, be password. galima viskas arba viena kazkuri
 * jei perduodu, kad noriu amziaus grazina amziu, jei viska, tai viska.
 */

$page = $_REQUEST['page'] ?? null;

const DATABASE_USERS_PATH = __DIR__ . 'database/users';

if ($page === 'save_user') {
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $rand_code = $_POST['code'];

    $errors = [];

    if (strlen($name) < 3 or strlen($name) > 60) {
        $errors['name'][] = 'Name is too short or too long';
    }

    if (!in_array($sex, ['male', 'female'])) {
        $errors['sex'][] = 'Choose Male or Female';
    }

    if ((!is_int((int)$age)) or (int)$age < 14 or (int)$age > 60) {
        $errors['age'][] = 'Bad age value or not in 14-60 years range';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = 'Bad email address';
    }

    if (file_exists("database/users/$email")) {
        $errors['email'][] = 'Email is taken';
    }

    if (strlen($password) < 4) {
        $errors['password'][] = 'Password too short';
    }

    if (!(preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))) {
        $errors['password'][] = 'Password must contain numbers and letters';
    }

    $firstPartOfEmail = explode('@', $email);
    if ($password == $email or $password == $firstPartOfEmail[0]) {
        $errors['password'][] = 'Your email and password can`t match';
    }

    if ($password != $repeat_password) {
        $errors['repeat_password'][] = 'Passwords not match';
    }

    if ($_SESSION['code'] != $rand_code) {
        $errors['code'][] = 'You entered bad safety code';
    }

    if (!empty($errors)) {

    } else {
        file_put_contents("database/users/$email", 'name:' . $name . '|' . 'sex:' . $sex . '|' . 'age:' . $age . '|' . 'password:' . $password);
        header("Location:http://localhost/CodeAcademy/svetaine/index.php?page=login&email=$email");
    }
}


if ($page === 'login_user') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;


    $data = file_get_contents("database/users/$email");
    $items = ((explode("|", $data)));
    foreach ($items as $key => $item) {
        $item = explode(":", $item);
        $items[$item[0]] = $item[1];
        unset($items[$key]);
    }
    $user_password = $items['password'];
    $user_name = $items['name'];
    $user_age = $items['age'];
    $user_sex = $items['sex'];

    $errors = [];

    if (!file_exists("database/users/$email")) {
        $errors[] = 'Email not found';
    }

    if ($password != $user_password) {
        $errors[] = 'Wrong password';
    }

    if (!empty($errors)) {
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user_name;
        $_SESSION['sex'] = $user_sex;
        $_SESSION['age'] = $user_age;
    }
    header("Location:http://localhost/CodeAcademy/svetaine/index.php?page=home");
}

if ($page === 'save_about') {
    $about_me = $_POST['about_me'] ?? null;
    file_put_contents("database/data/about.txt", $about_me);
    header("Location:http://localhost/CodeAcademy/svetaine/index.php?page=about");
}

if ($page === 'update') {
    $data = file_get_contents('database/users/'.$_SESSION['email']);
    $items = ((explode("|", $data)));
    foreach ($items as $key => $item) {
        $item = explode(":", $item);
        $items[$item[0]] = $item[1];
        unset($items[$key]);
    }
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
}

if($page === 'save_update'){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    $data = file_get_contents('database/users/'.$_SESSION['email']);
    $items = ((explode("|", $data)));
    foreach ($items as $key => $item) {
        $item = explode(":", $item);
        $items[$item[0]] = $item[1];
        unset($items[$key]);
    }

    $user_password = $items['password'];

    $errors = [];

    if (strlen($name) < 3 or strlen($name) > 60) {
        $errors['name'][] = 'Name is too short or too long';
    }

    if ((!is_int((int)$age)) or (int)$age < 14 or (int)$age > 60) {
        $errors['age'][] = 'Bad age value or not in 14-60 years range';
    }

    if($password === '' and $repeat_password === ''){
        $password = $user_password;
    }else{
        if (strlen($password) < 4) {
            $errors['password'][] = 'Password too short';
        }

        if (!(preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password))) {
            $errors['password'][] = 'Password must contain numbers and letters';
        }

        $firstPartOfEmail = explode('@', $_SESSION['email']);
        if ($password == $_SESSION['email'] or $password == $firstPartOfEmail[0]) {
            $errors['password'][] = 'Your email and password can`t match';
        }

        if ($password != $repeat_password) {
            $errors['repeat_password'][] = 'Passwords not match';
        }
    }

    if (!empty($errors)) {
    } else {
        file_put_contents('database/users/'.$_SESSION['email'], 'name:' . $name . '|' . 'sex:' . $_SESSION['sex'] . '|' . 'age:' . $age . '|' . 'password:' . $password);
        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;

        header("Location:http://localhost/CodeAcademy/svetaine/index.php");
    }
}

function isLogedIn() {
    if(isset($_SESSION['email'])){
        return true;
    }else{
        return false;
    }
}

// sekmingai pakeitete amziu ir pan pranesimai

function getUserFields(array $arrayOfKeys): array
{
    $data = file_get_contents('database/users/'.$_SESSION['email']);
    $items = ((explode("|", $data)));
    $resultArray = [];

    foreach ($items as $key => $item) {
        $item = explode(":", $item);

        if(in_array($item[0], $arrayOfKeys)){
            $resultArray[$item[0]] = $item[1];
        }
    }
    return $resultArray;
}

print_r(getUserFields(['name', 'sex']));


$_SESSION['code'] = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

?>
<hr>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        <?php include 'css/style.css'; ?>
    </style>

    <title>Hello, world!</title>
</head>
<body>
<style>
    table {
        padding: 10px;
    }

    td {
        padding: 10px;
    }
</style>
<!--menu-->
<table>
    <tr id="eilute">
        <td>
            <a href="index.php">Home</a>
        </td>
        <td>
            <a href="index.php?page=about">About</a>
        </td>
        <?php if (!isLogedIn()) { ?>
            <td>
                <a href="index.php?page=login">Login</a>
            </td>
            <td>
                <a href="index.php?page=register">Register</a>
            </td>
        <?php } else { ?>
            <td id="logout">
                <a href="pages/logout.php">Logout</a>
            </td>
            <td id="update">
                <a href="index.php?page=update">Update Data</a>
            </td>
        <?php } ?>
    </tr>
</table>

<!--content-->
<?php if ($page === null || $page === 'home') { ?>
<?php if (!isLogedIn()) { ?>
    <h1>Welcome</h1>
    <h4>Please <a href="http://localhost/CodeAcademy/svetaine/index.php?page=register">Register</a> or <a
                href="http://localhost/CodeAcademy/svetaine/index.php?page=login">Login</a></h4>
<?php } else { ?>
<h1>Welcome, <?php echo $_SESSION['name'];
    } ?>
    <?php } elseif ($page === 'register' || $page === 'save_user') { ?>
        <h1>Register</h1>
        <?php include 'pages/register_form.php' ?>
    <?php } elseif ($page === 'about') { ?>
        <?php if (!isLogedIn()) { ?>
            <h4><?php echo $data = file_get_contents("database/data/about.txt"); ?></h4>
        <?php } else { ?>
            <h1>About website</h1>
            <h4><?php echo $data = file_get_contents("database/data/about.txt"); ?></h4>
            <form action="index.php?page=save_about" method="post">
                <u>Change page `About` content here:</u><br><textarea type="text" cols="30" rows="10"
                                                                      name="about_me"></textarea>
                <br><br>
                <button type="submit">Išsaugoti</button>
            </form>
            <br/><br/>
        <?php } ?>
    <?php } elseif ($page === 'login') { ?>
        <h1>Login</h1>
        <form action="index.php?page=login_user" method="post">
            Paštas:<input type="text" value="<?php echo $_GET['email'] ?? null ?>" name="email">
            <br/><br/>
            Slaptažodis:<input type="text" name="password">
            <br/><br/>
            <button type="submit">Prisijungti</button>
        </form>
    <?php } elseif ($page === 'save_user') { ?>
        <h1>User saved</h1>
    <?php }
    elseif ($page === 'login_user') { ?>
    <h1>Welcome, <?php echo $_SESSION['name'];
        } elseif ($page === 'update' || $page === 'save_update') { ?></h1>
    <h1>Update</h1>
<?php include 'pages/update_form.php' ?>
<?php } ?>


    <!--footer-->
    <div id="footer">
        <h4>
        <?php
         echo date('Y-m-d H:i:s') ;
        ?>
        </h4>
    </div>
</body>
</html>


<!--//session_start();-->
<!--//$page = $_GET['page'] ?? null;-->
<!--//?>-->
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--     Required meta tags -->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!---->

<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
<!---->
<!--    <title>Hello, world!</title>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!--    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">-->
<!--        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">-->
<!--            <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>-->
<!--            <li><a href="index.php?page=about" class="nav-link px-2 link-dark">About</a></li>-->
<!--        </ul>-->
<!---->
<!--        <div class="col-md-3 text-end">-->
<!--            --><?php //if (isset($_SESSION['email'])) { ?>
<!--                <a href="index.php?page=logout" class="btn btn-outline-primary me-2">Logout</a>-->
<!--            --><?php //} else { ?>
<!--                <a href="index.php?page=login" class="btn btn-outline-primary me-2">Login</a>-->
<!--                <a href="index.php?page=register" class="btn btn-outline-primary me-2">Register</a>-->
<!--            --><?php //} ?>
<!--        </div>-->
<!--    </header>-->
<!--</div>-->
<!--<div class="container col-xl-10 col-xxl-8 px-4 py-5">-->
<!--    --><?php
//
//    switch ($page) {
//        case null:
//            ?>
<!--            <h1>Home</h1>-->
<!--            --><?php
//            break;
//        case 'login':
//            ?>
<!--            <h1>Login</h1>-->
<!--            <div class="row align-items-center g-lg-5 py-5">-->
<!--                <div class="col-md-12 mx-auto col-lg-12">-->
<!--                    <form class="p-4 p-md-5 border rounded-3 bg-light" action="index.php?page=login_submit" method="post">-->
<!--                        <div class="form-floating mb-3">-->
<!--                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">-->
<!--                            <label for="floatingInput">Email address</label>-->
<!--                        </div>-->
<!--                        <div class="form-floating mb-3">-->
<!--                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">-->
<!--                            <label for="floatingPassword">Password</label>-->
<!--                        </div>-->
<!--                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php
//            break;
//        case 'register':
//            ?>
<!--            <h1>Register</h1>-->
<!--            <div class="row align-items-center g-lg-5 py-5">-->
<!--                <div class="col-md-12 mx-auto col-lg-12">-->
<!--                    <form class="p-4 p-md-5 border rounded-3 bg-light" action="index.php?page=register_submit" method="post">-->
<!--                        <div class="form-floating mb-3">-->
<!--                            <input name="email" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">-->
<!--                            <label for="floatingInput">Email address</label>-->
<!--                        </div>-->
<!--                        <div class="form-floating mb-3">-->
<!--                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">-->
<!--                            <label for="floatingPassword">Password</label>-->
<!--                        </div>-->
<!--                        <div class="form-floating mb-3">-->
<!--                            <input name="repeat_password"  type="password" class="form-control" id="floatingPassword" placeholder="Password">-->
<!--                            <label for="floatingPassword">Repeat Password</label>-->
<!--                        </div>-->
<!--                        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php
//            break;
//        case 'register_submit':
//            $email = $_POST['email'] ?? null;
//            $password = $_POST['password'] ?? null;
//            $repeat_password = $_POST['repeat_password'] ?? null;
//
//            $errors = [];
//
//            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                $errors[] = 'Email is wrong';
//            }
//
//            if (file_exists(__DIR__ . "/database/users/$email")) {
//                $errors[] = 'Email is taken';
//            }
//
//            if (strlen($password) < 7) {
//                $errors[] = 'Password too short';
//            }
//
//            if ($password != $repeat_password) {
//                $errors[] = 'Passwords not match';
//            }
//
//            if (!empty($errors)) {
//                echo '<pre>';
//                print_r($errors);
//                echo '</pre>';
//            } else {
//                file_put_contents(__DIR__ . "/database/users/$email", $password);
//                echo 'user created';
//            }
//            break;
//        case 'login_submit':
//            $email = $_POST['email'] ?? null;
//            $password = $_POST['password'] ?? null;
//
//            $user_password = file_get_contents(__DIR__ . "/database/users/$email");
//
//            $errors = [];
//
//            if (!file_exists(__DIR__ . "/database/users/$email")) {
//                $errors[] = 'Email not found';
//            }
//
//            if ($password != $user_password) {
//                $errors[] = 'Wrong passsword';
//            }
//
//            if (!empty($errors)) {
//                echo '<pre>';
//                print_r($errors);
//                echo '</pre>';
//            } else {
//                $_SESSION['email'] = $email;
//                header('Location: index.php');
//            }
//            break;
//        case 'logout':
//            session_destroy();
//            header('Location: index.php');
//            break;
//    }
//
//    if (isset($_SESSION['email'])) {
//        echo 'prisijunges';
//    } else {
//        echo 'atsijunges';
//    }
//    ?>
<!--</div>-->
<!---->
<!--//input, kai prisijungi, issaugoti i faila ir po to atvaizduoti about sekcijoje-->
<!---->
<!-- Optional JavaScript; choose one of the two! -->
<!---->
<!-- Option 1: Bootstrap Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"-->
<!--        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"-->
<!--        crossorigin="anonymous"></script>-->
<!---->
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!---->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
<!---->
<!--</body>-->
<!--</html>-->