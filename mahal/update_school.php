<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$mark_uname=$_SESSION['lkg_uname'];
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("Y/m/d");

require("connection.php");
if(isset($_POST["add_school"]))
{
	$sch_name=$_POST["sch_name"];
	$location=$_POST["location"];
	$city=$_POST["city"];
	$district=$_POST["district"];
	$state=$_POST["state"];
	$pin=$_POST["pin"];
	$phone=$_POST["phone"];
	$mob=$_POST["mob"];
	$email=$_POST["email"];
	$web=$_POST["web"];
	$sender_id=$_POST["sender_id"];
	$id=$_POST["id"];
	
	$sql="update mahal_det set sch_name='".$sch_name."',location='".$location."',city='".$city."',district='".$district."',state='".$state."',pin='".$pin."',phone='".$phone."',mob='".$mob."',email='".$email."',web='".$web."',sender_id='".$sender_id."' where id='".$id."'";
	var_dump($sql);
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:mahals.php?success=.'success'");


	} 
	else 
	{
			
	header("Location:mahals.php?failed=.'failed'");	
		
	}

}

}else{
		header("Location:login.php");
	}
	
?>