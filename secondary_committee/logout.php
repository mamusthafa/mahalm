<?php
session_start();
//session_destroy();
if(isset($_SESSION['second_uname'])) unset($_SESSION['second_uname']);
if(isset($_SESSION['second_pass'])) unset($_SESSION['second_pass']);
header("Location:login.php?status=Successfully Logged Out!");
?>