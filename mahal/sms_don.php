<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");
$don_amount=$_GET["amount"];
$rec_no=$_GET["rec_no"];
$rec_date=$_GET["rec_date"];
$mob_number=$_GET["mob"];
$memb_type=$_GET["memb_type"];

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

/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

$message_detail=$donation_det." has been received.Rec No is ".$rec_no." , rec date is ".$rec_date;
$message="Dear member, ".$message_detail."-".$sch_detail;
echo $message;

$enc_msg= rawurlencode($message); // Encoded message
//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
echo $result ; // For Report or Code Check
curl_close($ch);
if($memb_type=="non_member"){
	header("Location:collect_non_memb_don.php?success=.'success'");
}
else
{
	header("Location:collect_donation.php?success=.'success'");
}
}
?>