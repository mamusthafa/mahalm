<?php


$servername = "localhost";
//$servername = "mahaldbtest.ckucl9xfmdhz.us-east-2.rds.amazonaws.com";


$username = "root";
//$username = "digit3vx_seaclg";


$password = "";
//$password = "vM8}-IXz%Tul";


$dbname = "mahal";
//$dbname = "digit3vx_seaclg";





// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection


if ($conn->connect_error) {


    die("Connection failed: " . $conn->connect_error);


}


?>