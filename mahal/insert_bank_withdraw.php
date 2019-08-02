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
		
		$sql="insert into bank_withdraw (bank_name,amount,towards,withdraw_date,committee_year) values('$bank_name','$amount','$towards','$withdraw_date','$cur_academic_year')";
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