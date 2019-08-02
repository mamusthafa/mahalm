<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$member_type=$_POST["member_type"];

$sql="select first_name,member_id,parent_contact,member_type from members where member_type='".$member_type."'";	
$result=mysqli_query($conn,$sql);
/////////////////////////////////START Mahal DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END Mahal DETAILS ///////////////////////////////////////////


foreach($result as $value)
  {
	$first_name=$value["first_name"];
	$member_id=$value["member_id"];
	$mob_number=$value["parent_contact"];
	$message_detail="username = ".$first_name." and password = ".$member_id;

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