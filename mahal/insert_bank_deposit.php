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
		
		$sql="insert into bank_deposit (bank_name,amount,source,dep_date,committee_year) values('$bank_name','$amount','$source','$dep_date','$cur_academic_year')";
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