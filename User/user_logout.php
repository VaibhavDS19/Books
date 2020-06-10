<?php

session_start();
$_SESSION = array90;

session_destroy();
header("location:user_login.php");
exit;


?>