<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
	if(isset($_POST["edit_fee"]))
	{
		$member_fee_type_name=$_POST["member_fee_type_name"];
		$fee_amount=$_POST["fee_amount"];
		$member_type=$_POST["member_type"];
		$added_date=$_POST["added_date"];
		$id=$_POST["id"];
		$first_name=$_POST["first_name"];
		$member_id=$_POST["member_id"];
		$note=$_POST["note"];
		
		
		$sql="update member_fee_type set member_fee_type_name='".$member_fee_type_name."',fee_amount='".$fee_amount."',member_type='".$member_type."',added_date='".$added_date."',note='".$note."' where id='".$id."'";
			
		if ($conn->query($sql) === TRUE) 
		{
		header("Location:description.php?first_name=".$first_name."&member_id=".$member_id);
		}  

	}
}
else
{
header("Location:login.php");
}
	
?>