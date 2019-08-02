<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
ob_start();
date_default_timezone_set("Asia/Kolkata");
$added_date=date("Y-m-d");
	
    for($i=0;$i<$count;$i++){
	$first_name = test_input($_POST["first_name"][$i]);
	$member_id = test_input($_POST["member_id"][$i]);
	$member_type = test_input($_POST["member_type"][$i]);
	$fee_amount = test_input($_POST["fee_amount"][$i]);
	$fee_name = test_input($_POST["fee_name"][$i]);
	
	
    if($fee_amount!=""){
		$sql="insert into member_fee_type (member_fee_type_name,committee_year,first_name,member_id,fee_amount,member_type,added_date) values('$fee_name','$cur_committee_year','$first_name','$member_id','$fee_amount','$member_type','$added_date')";
		
		$conn->query($sql);
		var_dump($sql);
  }
 }
header("Location:bulk_individual_fee.php?success=success");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}