<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["committee_member"]))
{
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$committee_name=$_POST["committee_name"];
	$designation=$_POST["designation"];
	$first_name=$_POST["first_name"];
	$member_id=$_POST["member_id"];
	$mobile=$_POST["mobile"];
	
	
	$sql="insert into committees (committee_name,designation,first_name,member_id,added_date,committee_year,updated_date,mobile) values('$committee_name','$designation','$first_name','$member_id','$today_date','$cur_academic_year','$today_date','$mobile')";
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:all_committee_members.php?success=success");
	} 
	else 
	{
	header("Location:register_committee.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>