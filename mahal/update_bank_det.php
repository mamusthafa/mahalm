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
	$id=$_POST["id"];
	
	
	$sql = "update bank_det set bank_name='".$bank_name."',branch='".$branch."',acc_no='".$acc_no."',acc_hold='".$acc_hold."' where id = '".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:all_banks.php?success=.'success'");
	} 
	else 
	{
	header("Location:all_banks.php?failed=.'failed'");	
	}
}

}
else
{
header("Location:login.php");
}
	
?>