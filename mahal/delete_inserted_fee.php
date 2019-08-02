<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
	$member_fee_type_name=$_POST['member_fee_type_name'];
	$fee_amount=$_POST['fee_amount'];
	$member_type=$_POST['member_type'];
	$added_date=$_POST['added_date'];

$sql = "DELETE FROM member_fee_type WHERE member_fee_type_name='".$member_fee_type_name."' and fee_amount='".$fee_amount."' and member_type='".$member_type."' and committee_year='".$cur_academic_year."' and added_date='".$added_date."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:total_fee.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
?>