<?php
session_start();
unset($_SESSION['a_email']);
unset($_SESSION['a_id']);
unset($_SESSION['a_pass']);
header("location:../login/1_login.html");
exit();
?>