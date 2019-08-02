<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$member_id = test_input($_POST["member_id"]);
	$member_fee_amount = test_input($_POST["member_fee_amount"]);
	$member_fee_type = test_input($_POST["member_fee_type"]);
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	$month = test_input($_POST["month"]);
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	
  $sql_fee="Select id,parent_contact from members where first_name='".$name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$parent_contact=$row_fee["parent_contact"];
		$id=$row_fee["id"];
	}
  
   
  $sql="insert into member_fee (name,member_id,member_fee_amount,member_fee_type,rec_date,rec_no,mobile,committee_year,updated_date,memb_id,month) values('$name','$member_id','$member_fee_amount','$member_fee_type','$rec_date','$rec_no','$parent_contact','$cur_committee_year','$today_date','$id','$month')";
		  if ($conn->query($sql) === TRUE) {
			 
			header("Location:member_fee_sms.php?name=".$name."&member_fee_amount=".$member_fee_amount."&rec_no=".$rec_no."&rec_date=".$rec_date."&member_id=".$member_id."&member_fee_type=".$member_fee_type);
			
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
