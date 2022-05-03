<?php
if (isLoged()) {
    $email = $_SESSION['email'];
    $userData = file_get_contents(DATABASE_USERS_PATH . $email);
//    var_dump($userData . '|' . 45);
}
?>


