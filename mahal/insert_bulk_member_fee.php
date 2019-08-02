<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	$member_fee_type = test_input($_POST["member_fee_type"]);
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$name = test_input($_POST["first_name"][$i]);
	$member_id = test_input($_POST["member_id"][$i]);
	$member_type = test_input($_POST["member_type"][$i]);
	$member_fee_amount = test_input($_POST["member_fee_amount"][$i]);
	//$member_fee_type = test_input($_POST["member_fee_type"][$i]);
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	$parent_contact = test_input($_POST["parent_contact"][$i]);
	$month = test_input($_POST["month"][$i]);
	
	if($member_fee_amount!=""){
		$sql_insert="insert into member_fee (name,member_id,member_fee_amount,member_fee_type,rec_date,rec_no,mobile,committee_year,updated_date,month) values('$name','$member_id','$member_fee_amount','$member_fee_type','$rec_date','$rec_no','$parent_contact','$cur_committee_year','$today_date','$month')";
  	
	if ($conn->query($sql_insert) === TRUE) {
			////////////////////////// Start SMS Sending //////////////////////////////////////////////////
	
	$member_fee_det=$member_fee_type." Rs ".$member_fee_amount;
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
	//echo $mob_number;
	
	$sql_fee="select sum(fee_amount) as total_fee  from member_fee_type where member_type='".$member_type."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
	//var_dump($sql_fee);
   $result_fee=mysqli_query($conn,$sql_fee);
   if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
	$total_fee=$row_fee["total_fee"];
	}
	$sql_individual_fee="select sum(fee_amount) as indi_total_fee  from individual_fee where first_name='".$name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
   $result_individual_fee=mysqli_query($conn,$sql_individual_fee);
   if($row_individual_fee=mysqli_fetch_array($result_individual_fee,MYSQLI_ASSOC))
	{
	$indi_total_fee=$row_individual_fee["indi_total_fee"];
	}
	$sql_ind_fee="select sum(member_fee_amount) as total_fee_paid  from member_fee where name='".$name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
   $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
   if($row_fee_tot_paid=mysqli_fetch_array($result_ind_fee,MYSQLI_ASSOC))
	{
		$total_fee_paid=$row_fee_tot_paid["total_fee_paid"];
	}
	$total_fees_balance=$total_fee+$indi_total_fee-$total_fee_paid;

	//API Details
	$username ="ma.musthafa6@gmail.com";
	$password ="ajmal524";
	$message_detail=$member_fee_det." has been received.Rec No is ".$rec_no." , rec date is ".$rec_date." Remaining Balance is ".$total_fees_balance;
	$message="Dear member, ".$message_detail."-".$sch_name;
	//echo $message;
	$enc_msg= rawurlencode($message); // Encoded message
	$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
	$ch = curl_init($fullapiurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);

	/////////////////////////// End of SMS Sending ////////////////////////////////////////////////////////
	
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
  }
  
 }
header("Location:bulk_member_fee.php?success=success");
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}