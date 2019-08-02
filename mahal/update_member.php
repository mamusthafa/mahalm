<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("connection.php");
if(isset($_POST["edit_member"]))
{
	$first_name=$_POST["first_name"];
	$member_id=$_POST["member_id"];
	
	$id=$_POST["id"];
	$parent_contact=$_POST["parent_contact"];
	$member_type=$_POST["member_type"];
	
	
	   $sql="Update members set first_name='".$first_name."',member_id='".$member_id."',parent_contact='".$parent_contact."',member_type='".$member_type."' where id='".$id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:all_members.php?success=.'success'");	
	}
	
}
}
else
{
header("Location:login.php");
}
	


?>