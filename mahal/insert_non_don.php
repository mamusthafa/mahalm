<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["donation"]))
{
	$first_name=$_POST["first_name"];
	$non_location=$_POST["location"];
	$mobile=$_POST["mobile"];
	$rec_date=$_POST["rec_date"];
	$rec_no=$_POST["rec_no"];
	$don_amount=$_POST["don_amount"];
	$don_towards=$_POST["don_towards"];
	
	$sql="INSERT INTO donation (non_name, non_location, rec_date, rec_no, don_amount, don_towards, mobile, committee_year) VALUES('$first_name','$non_location','$rec_date','$rec_no','$don_amount','$don_towards','$mobile','$cur_academic_year')";
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	//header("Location:sms_don.php?success=.'success'");
	
	header("Location:sms_don.php?name=".$first_name."&rec_no=".$rec_no."&rec_date=".$rec_date."&mob=".$mobile."&amount=".$don_amount."&memb_type=non_member");
	} 
	else 
	{
	header("Location:collect_non_memb_don.php?failed=.'failed'");	
	}
}

	}else{
		header("Location:login.php");
	}
	
?>