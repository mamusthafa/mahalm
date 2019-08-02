<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$committee_name=$_POST["committee_name"];
$message_detail=$_POST["message_detail"];
$sql="select distinct mobile from committees where committee_name='".$committee_name."'";	
$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////// START SCHOOL DETAILS //////////////
	
	$sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
	$sch_name=$row_sch["sch_name"];
	$approved_senderid=$row_sch["sender_id"];
	}
	

foreach($result as $value)
{
$mob_number=$value["parent_contact"];

$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

$message="Dear member, ".$message_detail."-".$sch_name;
$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);
}
header("Location:send_noti.php?success=.'success'");
}

?>