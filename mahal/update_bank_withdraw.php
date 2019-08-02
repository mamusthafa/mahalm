<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
	if(isset($_POST["bank_withdraw"]))
	{
		$bank_name=$_POST["bank_name"];
		$amount=$_POST["amount"];
		$towards=$_POST["towards"];
		$withdraw_date=$_POST["withdraw_date"];
		$id=$_POST["id"];
		
		$sql = "update bank_withdraw set bank_name='".$bank_name."',amount='".$amount."',towards='".$towards."',withdraw_date='".$withdraw_date."',committee_year='".$cur_academic_year."' where id='".$id."'";
		if ($conn->query($sql) === TRUE) 
		{
		header("Location:all_withdrawals.php?success=.'success'");
		} 
		else 
		{
		header("Location:all_withdrawals.php?failed=.'failed'");	
		}
	}
}
else
{
header("Location:login.php");
}
	
?>