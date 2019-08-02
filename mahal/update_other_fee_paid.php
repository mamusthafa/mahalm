<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$first_name = test_input($_POST["name"]);
	$member_id = test_input($_POST["member_id"]);
	$addon_fee_received_amount = test_input($_POST["addon_fee_received_amount"]);
	$addon_fee_received_name = test_input($_POST["addon_fee_received_name"]);
	$rec_no = test_input($_POST["rec_no"]);
	$rec_date = test_input($_POST["rec_date"]);
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	
  $sql_fee="Select id,parent_contact from members where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$parent_contact=$row_fee["parent_contact"];
	}
	
	
  $sql="update addon_fee_received set first_name='".$first_name."',member_id='".$member_id."',addon_fee_received_amount='".$addon_fee_received_amount."',addon_fee_received_name='".$addon_fee_received_name."',committee_year='".$cur_committee_year."',updated_date='".$today_date."',rec_date='".$rec_date."',rec_no='".$rec_no."' where id = '".$id."'";
 
		  if ($conn->query($sql) === TRUE) {
			
			header("Location:description.php?first_name=".$first_name."&member_id=".$member_id);
			
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
