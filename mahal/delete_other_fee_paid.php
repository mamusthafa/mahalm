<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	}
	$sql_det="select first_name,member_id from addon_fee_received where id='".$id."'";
	$result_det=mysqli_query($conn,$sql_det);
	if($row_det=mysqli_fetch_array($result_det,MYSQLI_ASSOC))
	{
	$first_name=$row_det["first_name"];	
	$member_id=$row_det["member_id"];	
	}
	$sql = "DELETE FROM addon_fee_received WHERE id='".$id."'";
	if ($conn->query($sql) === TRUE)
	{
	
	header("Location:description.php?first_name=".$first_name."&member_id=".$member_id."&suceess=success");
	}
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo "Delete page";
}
?>