<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = test_input($_POST["name"]);
	$member_id = test_input($_POST["member_id"]);
	$fee_amount = test_input($_POST["fee_amount"]);
	$fee_name = test_input($_POST["fee_name"]);
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	$id = test_input($_POST["id"]);
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	
  $sql_fee="Select parent_contact from members where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
	$parent_contact=$row_fee["parent_contact"];
	}
	
	$sql="update individual_collected_fee  set first_name='".$first_name."',member_id='".$member_id."',fee_amount='".$fee_amount."',fee_name='".$fee_name."',rec_date='".$rec_date."',rec_no='".$rec_no."',committee_year='".$cur_committee_year."',updated_date='".$today_date."' where id='".$id."'";
	  if ($conn->query($sql) === TRUE) {
		header("Location:individual_fee_sms_paid.php?name=".$first_name."&fee_amount=".$fee_amount."&rec_no=".$rec_no."&rec_date=".$rec_date."&member_id=".$member_id."&fee_name=".$fee_name);
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	}
			
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
