<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errors = [];

    if (empty($username) || empty($password)) {
        $errors[] = 'Please fill both fields';
    }

    if (!file_exists(DATABASE_ADMIN_PATH . $username)) {
        $errors[] = 'This user don`t exist';
    } else {
        $user = file_get_contents(DATABASE_ADMIN_PATH . $username);
        if($user){
            $user = explode('|', $user);
            if ($password != $user[2]) {
                $errors[] = 'Bad password';
            }
        }
    }

    if (empty($errors)) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }
}
?>

<form action="index.php?page=login" method="post">
    <table>
        <tr>
            <td>
                Username:
            </td>
            <td>
                <input type="text" name="username" value="<?php echo $_GET['username'] ?? null ?>">
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="text" name="password">
            </td>
        </tr>
    </table>
    <br/><br/>
    <button type="submit">Login</button>
</form>