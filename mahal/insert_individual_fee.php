<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first_name = test_input($_POST["first_name"]);
		$member_id = test_input($_POST["member_id"]);
		
		$fee_amount = test_input($_POST["fee_amount"]);
		$member_fee_type_name = test_input($_POST["fee_name"]);
		$member_type = test_input($_POST["member_type"]);
		$note = test_input($_POST["note"]);
		
		$sql="insert into member_fee_type (member_fee_type_name,committee_year,first_name,member_id,fee_amount,member_type,note) values('$member_fee_type_name','$cur_committee_year','$first_name','$member_id','$fee_amount','$member_type','$note')";
		  if ($conn->query($sql) === TRUE) {
			 
			header("Location:description.php?first_name=".$first_name."&member_id=".$member_id);
			
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
