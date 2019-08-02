<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["addon_fee_type"]))
{
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$addon_fee_name=$_POST["addon_fee_name"];
	$details=$_POST["details"];
	$addon_fee_amount=$_POST["addon_fee_amount"];
	
	$sql="insert into addon_fee (addon_fee_name,details,addon_fee_amount,committee_year,updated_date) values('$addon_fee_name','$details','$addon_fee_amount','$cur_academic_year','$today_date')";
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:add_addon_fee.php?success=.'success'");
	} 
	else 
	{
	header("Location:add_addon_fee.php?failed=.'failed'");	
	}


}

}else{
	header("Location:login.php");
}
	
?>