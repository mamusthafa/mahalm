<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$name = test_input($_POST["first_name"][$i]);
	$member_id = test_input($_POST["member_id"][$i]);
	$don_amount = test_input($_POST["don_amount"][$i]);
	$don_towards = test_input($_POST["don_towards"][$i]);
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	$mobile = test_input($_POST["mobile"][$i]);
	
	if($don_amount!=""){
		$sql_insert="insert into donation (first_name,member_id,rec_date,rec_no,don_amount,don_towards,mobile,committee_year) values('$name','$member_id','$rec_date','$rec_no','$don_amount','$don_towards','$mobile','$cur_committee_year')";
  	
	if ($conn->query($sql_insert) === TRUE) {
			////////////////////////// Start SMS Sending //////////////////////////////////////////////////
	
	$donation_det="Donation Rs ".$don_amount;
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

	$sql="select parent_contact,member_type from members where committee_year='".$cur_committee_year."' and first_name='".$name."' and member_id='".$member_id."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
		$member_type=$row["member_type"];
	}
	
	//API Details
	$username ="ma.musthafa6@gmail.com";
	$password ="ajmal524";
	$message_detail=$donation_det." has been received.Rec No is ".$rec_no." , rec date is ".$rec_date;
	$message="Dear member, ".$message_detail."-".$sch_name;
	//echo $message;
	$enc_msg= rawurlencode($message); // Encoded message
	$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
	$ch = curl_init($fullapiurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);

	/////////////////////////// End of SMS Sending ////////////////////////////////////////////////////////
	
	}
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
  }
  
 }
header("Location:bulk_donation.php?success=success");
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}