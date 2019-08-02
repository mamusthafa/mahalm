<?php
function convertCharsn($string) {
	$in = '';
	$out = iconv('UTF-8', 'UTF-16BE', $string);
	for($i=0; $i<strlen($out); $i++) {
	$in .= sprintf("%02X", ord($out[$i]));
	}
	return $in;
}
$message_detail = "ಸಹೋದರ ಸಹೋದರಿಯರಿಗೆಲ್ಲರಿಗೂ ಶುಭೊಧಯ"; 
$sch_name="Mounathul Islam";

//YOUR_MESSAGE_CONTENT_IN_REGIONAL_LANGUAGE_HERE
$UTF16BE_chars = convertCharsn(html_entity_decode($unicode_chars, ENT_QUOTES | 'ENT_HTML401', 'UTF-8'));

//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$mob_number="8277021524";
// Sender ID
$approved_senderid="MAZJID";

//Approved Template
//$message = $UTF16BE_chars;
$message="Dear member, ".$UTF16BE_chars."-".$sch_name;
$enc_msg= rawurlencode($message); // Encoded message

//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg&type=2";

//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
//echo $result ; // For Report or Code Check
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";
?>
