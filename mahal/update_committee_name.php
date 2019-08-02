<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$committee_name = test_input($_POST["committee_name"]);
	$added_date = test_input($_POST["added_date"]);
    
	
		$sql="update committee_name set committee_name='".$committee_name."',added_date='".$added_date."',committee_year='".$cur_academic_year."',updated_date='".$today."' where id='".$id."'";
		
		$conn->query($sql); 
    
header("Location:all_committee_name.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 