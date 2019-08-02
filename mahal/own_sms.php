<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////
	if(isset($_POST["own_sms"]))
	{
		require("connection.php");
		$member_type = test_input($_POST["member_type"]);
		$message_details = test_input($_POST["desc_sms"]);
		$sql_contact="select parent_contact from members where member_type='".$member_type."'";
		$result_contact=mysqli_query($conn,$sql_contact);
		foreach($result_contact as $value_cont)
		{
			$mob_number=$value_cont["parent_contact"];

			
			$sch_name="Mounathul Islam";
			$message_temp="Dear member, ".$message_details."-".$sch_name;

			//YOUR_MESSAGE_CONTENT_IN_REGIONAL_LANGUAGE_HERE
			$UTF16BE_chars = convertCharsn(html_entity_decode($message_temp, ENT_QUOTES | 'ENT_HTML401', 'UTF-8'));
			echo $UTF16BE_chars;
			 
			//API Details
			$username ="ma.musthafa6@gmail.com";
			$password ="ajmal524";
			$approved_senderid="MAZJID";

			//Approved Template
			$message = $UTF16BE_chars;
			$enc_msg= rawurlencode($message); // Encoded message
			$fullapiurl="http://smsc.biz/httpapi/send?api_key=2aad82f308626195f7a355215f123073&to=918277021524&sender=MAZJID&route=T&type=2&message=$enc_msg";

			//Call API
			$ch = curl_init($fullapiurl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			//echo $result ; // For Report or Code Check
			curl_close($ch);
			//echo "<p>SMS Request Sent - Message id - $result </p>"; 
		}
	}
	header("Location:send_noti.php?success=.'success'");
}

////////////////////////////  Functions /////////////////////////////////////////////
	function convertCharsn($string) {
		$in = '';
		$out = iconv('UTF-8', 'UTF-16BE', $string);
		for($i=0; $i<strlen($out); $i++) {
		$in .= sprintf("%02X", ord($out[$i]));
		}
		return $in;
	}
		
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}