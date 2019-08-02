<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
	
$cur_academic_year=$_SESSION['academic_year'];
require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

if(isset($_POST["contact"]))
{
	$subject=$_POST["subject"];
	$message=$_POST["message"];
	$message_id=$_POST["id"];
	$first_name=$_POST["first_name"];
	$member_id=$_POST["member_id"];

	
	$sql="insert into reply_applications (first_name,member_id,subject,message,message_id,sent_date,committee_year) values('$first_name','$member_id','$subject','$message','$message_id','$today','$cur_academic_year')";

	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:received_applications.php?success=.'success'");


	} 
	else 
	{
	var_dump($sql);			
	//header("Location:index.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>