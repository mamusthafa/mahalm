<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["fee_type"]))
{
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$member_fee_type_name=$_POST["member_fee_type_name"];
	$fee_amount=$_POST["fee_amount"];
	$member_type=$_POST["member_type"];
	$added_date=$_POST["added_date"];
	$id=$_POST["id"];
	
	$sql="update member_fee_type set member_fee_type_name='".$member_fee_type_name."',committee_year='".$cur_academic_year."',fee_amount='".$fee_amount."',updated_date='".$today_date."',member_type='".$member_type."',added_date='".$added_date."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:all_fee_type.php?success=.'success'");
	} 
	else 
	{
	header("Location:all_fee_type.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>