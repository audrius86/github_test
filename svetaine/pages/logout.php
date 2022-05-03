<?php
session_start();
unset($_SESSION['email']);
session_destroy();
//header("Location:http://localhost/CodeAcademy/svetaine/index_mano.php");
header("Location:http://localhost/CodeAcademy/svetaine/index.php");
?>