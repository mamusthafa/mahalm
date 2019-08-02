<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$memb_type = test_input($_POST["memb_type"]);
	$don_amount = test_input($_POST["don_amount"]);
	$don_towards = test_input($_POST["don_towards"]);
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	$id = test_input($_POST["id"]);
	
	$sql_fee="Select id,parent_contact from members where first_name='".$name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."'";
	$result_fee=mysqli_query($conn,$sql_fee);
	if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
	$parent_contact=$row_fee["parent_contact"];
	}
  
	
	if($memb_type=="member"){
	$name = test_input($_POST["name"]);
	$member_id = test_input($_POST["member_id"]);
	$mobile = $row_fee["parent_contact"];
	
	$sql="update donation set first_name='".$name."',member_id='".$member_id."',don_amount='".$don_amount."',don_towards='".$don_towards."',rec_date='".$rec_date."',rec_no='".$rec_no."',mobile='".$mobile."',committee_year='".$cur_committee_year."' where id='".$id."'";
		  
	}
	else if($memb_type=="non_member"){
		$name = test_input($_POST["name"]);
		$member_id = test_input($_POST["member_id"]);
		$mobile = test_input($_POST["mobile"]);
		
		$sql="update donation set non_name='".$name."',non_location='".$member_id."',don_amount='".$don_amount."',don_towards='".$don_towards."',rec_date='".$rec_date."',rec_no='".$rec_no."',mobile='".$mobile."',committee_year='".$cur_committee_year."' where id='".$id."'";
		var_dump($sql);
	}
	
	if ($conn->query($sql) === TRUE) 
			{
			header("Location:sms_don.php?name=".$name."&rec_no=".$rec_no."&rec_date=".$rec_date."&mob=".$mobile."&amount=".$don_amount);
			} 
			else
			{
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
