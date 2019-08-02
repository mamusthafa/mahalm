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
	$member_fee_det=$fee_name." Rs ".$fee_amount;
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	
  $sql_fee="Select id,parent_contact from members where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$mob_number = $row_fee["parent_contact"];
		$id=$row_fee["id"];
	}
  
   
  $sql="insert into individual_collected_fee (first_name,member_id,fee_amount,fee_name,rec_date,rec_no,committee_year,updated_date) values('$first_name','$member_id','$fee_amount','$fee_name','$rec_date','$rec_no','$cur_committee_year','$today_date')";
  var_dump($sql);
  
if ($conn->query($sql) === TRUE) {

	
	$sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$city=$row_sch["city"];
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	
			$username ="ma.musthafa6@gmail.com";
			$password ="ajmal524";
			
			$message_detail=$member_fee_det." has been received.Rec No is ".$rec_no." , rec date is ".$rec_date;
			$message="Dear member, ".$message_detail."-".$sch_name;
			$enc_msg= rawurlencode($message); // Encoded message

			//Create API URL
			$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

			//Call API
			$ch = curl_init($fullapiurl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch); 
			curl_close($ch);
		
		header("Location:description.php?first_name=".$first_name."&member_id=".$member_id);
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
