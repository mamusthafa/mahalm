<?php
session_start();
//session_destroy();
if(isset($_SESSION['second_uname'])) unset($_SESSION['second_uname']);
if(isset($_SESSION['second_pass'])) unset($_SESSION['second_pass']);if(isset($_SESSION['academic_year'])) unset($_SESSION['academic_year']);
header("Location:login.php?status=Successfully Logged Out!");
?>