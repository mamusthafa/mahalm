<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
//$dest_mobileno=$_GET['mob'];
require("connection.php");
$name=$_GET['name'];
$member_fee_type=$_GET['member_fee_type'];
$member_fee_amount=$_GET['member_fee_amount'];
$f2=$_GET['tot_paid'];
$f3=$_GET['rec_no'];
$f4=$_GET['rec_date'];
$member_id=$_GET['member_id'];

$member_fee_det=$_GET['member_fee_type']." Rs ".$_GET['member_fee_amount'];

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$city=$row_sch["city"];
		//$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

$sql="select parent_contact from members where committee_year='".$cur_academic_year."' and first_name='".$name."' and member_id='".$member_id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
	}

//require("sms.php");
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="DCOORG";


$message="Thank you ".$name.",".$member_fee_det." has been received.Rec no is ".$rec_no." and rec date is ".$rec_date."-".$sch_name;
$enc_msg= rawurlencode($message); // Encoded message

//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";
			
/*///////////////////////////////////////////////// sms end/////////////////////////////////////////////////////////////*/
header("Location:description.php?first_name=".$name."&member_id=".$member_id);

}


?>