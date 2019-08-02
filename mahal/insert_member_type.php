<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["member_type"]))
{
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$member_type_name=$_POST["member_type_name"];
	
	$sql="insert into member_type (member_type_name,committee_year,updated_date) values('$member_type_name','$cur_academic_year','$today_date')";
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:add_member_type.php?success=.'success'");
	} 
	else 
	{
	header("Location:add_member_type.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>