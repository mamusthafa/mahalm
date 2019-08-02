<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$committee_name = test_input($_POST["committee_name"]);
	$added_date = test_input($_POST["added_date"]);
    
	
		
		$sql="insert into committee_name (committee_name,committee_year,added_date,updated_date) values('$committee_name','$cur_academic_year','$added_date','$today')";
		$conn->query($sql); 
    
header("Location:add_committee_name.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 