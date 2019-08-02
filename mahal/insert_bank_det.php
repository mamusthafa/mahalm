<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["bank"]))
{
	$bank_name=$_POST["bank_name"];
	$branch=$_POST["branch"];
	$acc_no=$_POST["acc_no"];
	$acc_hold=$_POST["acc_hold"];
	
	$sql="insert into bank_det (bank_name,branch,acc_no,acc_hold) values('$bank_name','$branch','$acc_no','$acc_hold')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:add_bank.php?success=.'success'");
	} 
	else 
	{
	header("Location:add_bank.php?failed=.'failed'");	
	}
}

}
else
{
header("Location:login.php");
}
	
?>