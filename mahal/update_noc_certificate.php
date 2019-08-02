<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

//error_reporting("0");
require("connection.php");

$id = test_input($_POST["id"]);
$first_name = test_input($_POST["first_name"]);
$member_id = test_input($_POST["member_id"]);
$ashaya = test_input($_POST["ashaya"]);
$madh = test_input($_POST["madh"]);
$mar_date = test_input($_POST["mar_date"]);
$before_married = test_input($_POST["before_married"]);
$mar_no = test_input($_POST["mar_no"]);
$wife_exist = test_input($_POST["wife_exist"]);
$any_problem = test_input($_POST["any_problem"]);
$children_how_many = test_input($_POST["children_how_many"]);
$divorce_since = test_input($_POST["divorce_since"]);
$new_comer = test_input($_POST["new_comer"]);
$certi_no = test_input($_POST["certi_no"]);
$father_name = test_input($_POST["father_name"]);
$mother_name = test_input($_POST["mother_name"]);
$member_or_not = test_input($_POST["member_or_not"]);
$mahal_address = test_input($_POST["mahal_address"]);
$memb_id = test_input($_POST["memb_id"]);

	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	$sql="update noc_certificate set first_name='".$first_name."',member_id='".$member_id."',ashaya='".$ashaya."',madh='".$madh."',mar_date='".$mar_date."',before_married='".$before_married."',mar_no='".$mar_no."',wife_exist='".$wife_exist."',any_problem='".$any_problem."',children_how_many='".$children_how_many."',divorce_since='".$divorce_since."',new_comer='".$new_comer."',certi_no='".$certi_no."',issued_date='".$today_date."',father_name='".$father_name."',mother_name='".$mother_name."',memb_id='".$memb_id."',mahal_address='".$mahal_address."' where id='".$id."'";

	if ($conn->query($sql) === TRUE) {
			 header("Location:mar_noc_issue_reg.php?success=success");
			} 
			else 
			{
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}