<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["fee_type"]))
{
	$member_fee_type_name=$_POST["member_fee_type_name"];
	$fee_amount=$_POST["fee_amount"];
	$member_type=$_POST["member_type"];
	$added_date=$_POST["added_date"];
	
	$sql_select="select first_name,member_id from members where member_type='".$member_type."'";
	$result_select = mysqli_query($conn,$sql_select);

	foreach($result_select as $row_select){
		
		$first_name = $row_select["first_name"];
		$member_id = $row_select["member_id"];
		$sql="insert into member_fee_type (member_fee_type_name,committee_year,first_name,member_id,fee_amount,member_type,added_date) values('$member_fee_type_name','$cur_academic_year','$first_name','$member_id','$fee_amount','$member_type','$added_date')";
		//var_dump($sql);	
		if ($conn->query($sql) === TRUE) 
		{
		header("Location:add_fee_type.php?success=.'success'");
		}  
}
}
}
else
{
	header("Location:login.php");
}
	
?>