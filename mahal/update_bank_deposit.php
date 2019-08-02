<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
	if(isset($_POST["bank_deposit"]))
	{
		$bank_name=$_POST["bank_name"];
		$amount=$_POST["amount"];
		$source=$_POST["source"];
		$dep_date=$_POST["dep_date"];
		$id=$_POST["id"];
		
		$sql = "update bank_deposit set bank_name='".$bank_name."',amount='".$amount."',source='".$source."',dep_date='".$dep_date."',committee_year='".$cur_academic_year."' where id='".$id."'";
		if ($conn->query($sql) === TRUE) 
		{
		header("Location:all_bank_deposit.php?success=.'success'");
		} 
		else 
		{
		header("Location:all_bank_deposit.php?failed=.'failed'");	
		}
	}
}
else
{
header("Location:login.php");
}
	
?>