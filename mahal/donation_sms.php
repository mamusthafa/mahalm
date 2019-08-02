<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
	$cur_academic_year = $_SESSION['academic_year'];
	require("connection.php");
	$name=$_GET['name'];
	$don_towards=$_GET['don_towards'];
	$don_amount=$_GET['don_amount'];
	$rec_no=$_GET['rec_no'];
	$rec_date=$_GET['rec_date'];
	$member_id=$_GET['member_id'];

	
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
	
	$sql="select parent_contact,member_type from members where committee_year='".$cur_academic_year."' and first_name='".$name."' and member_id='".$member_id."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$mob_number=$row["parent_contact"];
	$member_type=$row["member_type"];
	}
	$username ="ma.musthafa6@gmail.com";
	$password ="ajmal524";
	$message_detail="Donation towards ".$don_towards." Rs. ".$don_amount." has been received.Rec No is ".$rec_no." , rec date is ".$rec_date;
	$message="Dear member, ".$message_detail."-".$sch_name;
	$enc_msg= rawurlencode($message);
	$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
	$ch = curl_init($fullapiurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);
	header("Location:all_donation_new.php");
}
?>