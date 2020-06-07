<?php

session_start();
$_SESSION = array90;

session_destroy();
header("location:admin_login.php");
exit;


?>