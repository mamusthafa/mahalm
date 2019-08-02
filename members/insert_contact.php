<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))

{
require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

if(isset($_POST["contact"]))
{
	
	
	$subject=$_POST["subject"];
	$message=$_POST["message"];
	$first_name=$_SESSION["parents_uname"];
	$member_id=$_SESSION["parents_pass"];
	
	
	
	$sql="insert into contact_mahal (first_name,member_id,subject,message,sent_date) values('$first_name','$member_id','$subject','$message','$today')";

	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:cont_mahal.php?success=.'success'");


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