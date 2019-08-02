<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$member_or_not = test_input($_POST["member_or_not"]);
	if($member_or_not=="non_member")
	{
	
	
	$first_name = test_input($_POST["first_name"]);
	$member_id = test_input($_POST["member_id"]);
	$dob = test_input($_POST["dob"]);
	$address = test_input($_POST["address"]);
	$father_name = test_input($_POST["father_name"]);
	$wife_first_name = test_input($_POST["wife_first_name"]);
	$wife_dob = test_input($_POST["wife_dob"]);
	$wife_address = test_input($_POST["wife_address"]);
	$wife_father_name = test_input($_POST["wife_father_name"]);
	$nikah_date = test_input($_POST["nikah_date"]);
	$nikah_place = test_input($_POST["nikah_place"]);
	$khazi = test_input($_POST["khazi"]);
	$valiyy = test_input($_POST["valiyy"]);
	$mar_reg_no = test_input($_POST["mar_reg_no"]);
	$certificate_no = test_input($_POST["certificate_no"]);
	
	$sql="insert into marriage_certificate (first_name,member_id,dob,address,father_name,wife_first_name,wife_dob,wife_address,wife_father_name,nikah_date,nikah_place,khazi,valiyy,mar_reg_no,certificate_no) values('$first_name','$member_id','$dob','$address','$father_name','$wife_first_name','$wife_dob','$wife_address','$wife_father_name','$nikah_date','$nikah_place','$khazi','$valiyy','$mar_reg_no','$certificate_no')";
	
	}
	else
	{
	$first_name = test_input($_POST["first_name"]);
	$member_id = test_input($_POST["member_id"]);
	$wife_first_name = test_input($_POST["wife_first_name"]);
	$wife_dob = test_input($_POST["wife_dob"]);
	$wife_address = test_input($_POST["wife_address"]);
	$wife_father_name = test_input($_POST["wife_father_name"]);
	$nikah_date = test_input($_POST["nikah_date"]);
	$nikah_place = test_input($_POST["nikah_place"]);
	$khazi = test_input($_POST["khazi"]);
	$valiyy = test_input($_POST["valiyy"]);
	$mar_reg_no = test_input($_POST["mar_reg_no"]);
	$certificate_no = test_input($_POST["certificate_no"]);
	
	
	$sql_member = "SELECT * FROM members where first_name='".$first_name."' and member_id='".$member_id."'";
	$result_member=mysqli_query($conn,$sql_member);
	if($row_member=mysqli_fetch_array($result_member,MYSQLI_ASSOC))
	{
		$dob_member= date('d-m-Y', strtotime( $row_member['dob'] ));
		$address= $row_member['address'];
		$dob= $row_member['dob'];
		$father_name= $row_member['father_name'];
		$memb_id= $row_member['id'];
		
	}
	
	$sql="insert into marriage_certificate (first_name,member_id,dob,address,father_name,wife_first_name,wife_dob,wife_address,wife_father_name,nikah_date,nikah_place,khazi,valiyy,memb_id,mar_reg_no,certificate_no) values('$first_name','$member_id','$dob','$address','$father_name','$wife_first_name','$wife_dob','$wife_address','$wife_father_name','$nikah_date','$nikah_place','$khazi','$valiyy','$memb_id','$mar_reg_no','$certificate_no')";
	
	}
	  
	  if ($conn->query($sql) === TRUE) {
		 
		header("Location:all_marriage_certificate.php?success=success");
		
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
			
	}
	}
			//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
