<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST["checked"])){
	$checkbox=$_POST["checkbox"];
	$meeting_name=$_POST["meeting_name"];
	
    $sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}  
	//print_r($checkbox);
	foreach($_POST["checkbox"] as $member_id){
	
	$sql_contact="select parent_contact,first_name,member_id from members where committee_year='".$cur_academic_year."' and member_id='".$member_id."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$mob_number=$row_contact["parent_contact"];
		$first_name=$row_contact["first_name"];
		
		$username ="ma.musthafa6@gmail.com";
        $password ="ajmal524";
	    $message="Dear member, ".$meeting_name."-".$sch_name;
		echo $mob_number;
		echo $message;
		 $enc_msg= rawurlencode($message); // Encoded message
		//Create API URL
		$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
		//Call API
		$ch = curl_init($fullapiurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); 
		curl_close($ch); 

	}
	}
}

}
header("Location:send_noti.php");
}