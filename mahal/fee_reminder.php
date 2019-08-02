<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$cur_committee_year = $_SESSION['academic_year'];
require("connection.php");

$member_type=$_POST['member_type'];

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
	
		$approved_senderid=$row_sch["sender_id"];
		
		
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

$sql="select * from members where committee_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
foreach($result as $row)
{
	$first_name=$row["first_name"];
	$member_id=$row["member_id"];
	$member_type=$row["member_type"];
	$mob_number =$row["parent_contact"];
			////////////////////////////////////////////////////////////////////////////////////
	
	$sql_fee="select sum(fee_amount) as total_fee  from member_fee_type where member_type='".$member_type."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
	var_dump($sql_fee);
		   $result_fee=mysqli_query($conn,$sql_fee);
		   if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
			{
			$total_fee=$row_fee["total_fee"];
			}
			
			
	$sql_individual_fee="select sum(fee_amount) as indi_total_fee  from individual_fee where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		   $result_individual_fee=mysqli_query($conn,$sql_individual_fee);
		   if($row_individual_fee=mysqli_fetch_array($result_individual_fee,MYSQLI_ASSOC))
			{
			$indi_total_fee=$row_individual_fee["indi_total_fee"];
			}
			
	$sql_ind_fee="select sum(member_fee_amount) as total_fee_paid  from member_fee where name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		   $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
		   if($row_fee_tot_paid=mysqli_fetch_array($result_ind_fee,MYSQLI_ASSOC))
			{
				$total_fee_paid=$row_fee_tot_paid["total_fee_paid"];
			}
			
	$total_fees_balance=$total_fee+$indi_total_fee-$total_fee_paid;
	////////////////////////////////////////////////////////////////////////////////////	
if($total_fees_balance > 0)
		{
			$username ="ma.musthafa6@gmail.com";
			$password ="ajmal524";

			$message_detail="Your fee balance is Rs ".$total_fees_balance." , Please pay the fee as soon as possible.";
			$message="Dear member, ".$message_detail."-".$sch_name;
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
		}

}		
/*///////////////////////////////////////////////// sms end/////////////////////////////////////////////////////////////*/
header("Location:send_noti.php?success=success");

}


?>