<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["edit_addon_fee_type"]))
{
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$addon_fee_name=$_POST["addon_fee_name"];
	$addon_fee_amount=$_POST["addon_fee_amount"];
	$details=$_POST["details"];
	$id=$_POST["id"];
	
	$sql="update addon_fee set addon_fee_name='".$addon_fee_name."',addon_fee_amount='".$addon_fee_amount."',details='".$details."',updated_date='".$today_date."',committee_year='".$cur_academic_year."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:all_addon_fee.php?success=.'success'");
	} 
	else 
	{
	header("Location:all_addon_fee.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>