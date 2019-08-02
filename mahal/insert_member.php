<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["register"]))
{
	$first_name=test_input($_POST["first_name"]);
	$parent_contact=test_input($_POST["parent_contact"]);
	$member_type=test_input($_POST["member_type"]);
	//$address=test_input($_POST["address"]);
	//$dob=test_input($_POST["dob"]);
	$member_id=test_input($_POST["member_id"]);
	
	/* 
	$filetmp = $_FILES["photo"]["tmp_name"];

	$filename = $_FILES["photo"]["name"];

	$filetype = $_FILES["photo"]["type"];

	$filepath = "photo/".$filename;

	move_uploaded_file($filetmp,$filepath); */
	
	$sql="insert into members (first_name,member_type,parent_contact,member_id,committee_year) values('$first_name','$member_type','$parent_contact','$member_id','$cur_academic_year')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:register_member.php?success=.'success'");
    } 
	else 
	{
	var_dump($sql);			
		
	}
}
}else{
		header("Location:login.php");
	}
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>