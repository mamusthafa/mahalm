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
	$id=$_POST["id"];
	
	$sql="update member_type set member_type_name='".$member_type_name."',committee_year='".$cur_academic_year."',updated_date='".$today_date."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:all_member_type.php?success=.'success'");
	} 
	else 
	{
	header("Location:all_member_type.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>