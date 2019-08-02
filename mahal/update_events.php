<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["events"]))
{
	$id=$_POST["id"];
	$evt_name=$_POST["evt_name"];
	$evt_date=$_POST["evt_date"];
	$evt_time=$_POST["evt_time"];
	$evt_details=$_POST["evt_details"];
	$evt_venue=$_POST["evt_venue"];
	$evt_mob=$_POST["evt_mob"];
	
	
	$sql="update events set evt_name='".$evt_name."',evt_date='".$evt_date."',evt_time='".$evt_time."',evt_details='".$evt_details."',evt_venue='".$evt_venue."',evt_mob='".$evt_mob."',committee_year='".$cur_academic_year."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:evt_description.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:evt_description.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>