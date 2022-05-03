<style>
<?php
include 'register.css';
?>
</style>
<?php

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $name_surname = $_POST['name_surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $code = $_POST['code'];

    $errors = [];

    if (file_exists(DATABASE_ADMIN_PATH . $username)) {
        $errors['username'][] = 'This user name is taken';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = 'Wrong email address';
    }

    if (strlen($password) < 5) {
        $errors['password'][] = 'Password should be longer than 4 symbols';
    }

    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors['password'][] = 'Password must have at least 1 letter and 1 number';
    }

    if ($email == $password) {
        $errors['password'][] = 'Email and password can`t match';
    }

    if ($password != $repeat_password) {
        $errors['password2'][] = 'Second password don`t match';
    }

    if ($_SESSION['code'] != $code) {
        $errors['code'] = 'Blogas saugos kodas';
    }

    if (empty($errors)) {
        if (file_put_contents(DATABASE_ADMIN_PATH . $username, implode('|', [$name_surname, $email, $password])) === false) {
            echo 'Something went wrong. Please try again!';
        } else {
            header('Location: index.php?page=login&username=' . $username);
        }
    }
}

$_SESSION['code'] = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
?>
<h1>Register form</h1>
<form action="index.php?page=register" method="post">
    <table class="register_table">
        <tr id="vienas">
            <td>
                User name:
            </td>
            <td>
                <input type="text" name="username" placeholder="Your user name" value="<?php echo $username ?? null ?>">
            </td>
            <td>
                <?php
                if (isset($errors['username'])) {
                    echo implode(',', $errors['username']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Name and Surname:
            </td>
            <td>
                <input type="text" name="name_surname" placeholder="Your name and surname">
            </td>
            <td>
                <?php
                if (isset($errors['name_surname'])) {
                    echo implode(',', $errors['name_surname']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="email" name="email" placeholder="Your email">
            </td>
            <td>
                <?php
                if (isset($errors['email'])) {
                    echo implode(',', $errors['email']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="text" name="password" placeholder="Create your password">
            </td>
            <td>
                Errors
            </td>
        </tr>
        <tr>
            <td>
                Repeat password:
            </td>
            <td>
                <input type="text" name="repeat_password" placeholder="Repeat password">
            </td>
            <td>
                Errors
            </td>
        </tr>
        <tr>
            <td>
                Code<b><u><?php echo $_SESSION['code'] ?></u></b>:
            </td>
            <td>
                <input type="text" name="code" placeholder="Enter security code">
            </td>
            <td>
                Errors
            </td>
        </tr>
    </table>
    <button type="submit">Register</button>
</form>
