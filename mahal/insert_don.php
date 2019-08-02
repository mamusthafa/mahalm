<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["donation"]))
{
	$first_name=$_POST["first_name"];
	$member_id=$_POST["member_id"];
	$location=$_POST["location"];
	$rec_date=$_POST["rec_date"];
	$rec_no=$_POST["rec_no"];
	$don_amount=$_POST["don_amount"];
	$don_towards=$_POST["don_towards"];
	
	$sql_contact="select parent_contact from members where committee_year='".$cur_academic_year."' and first_name='".$first_name."' and member_id='".$member_id."'";
	var_dump($sql_contact);
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$mob_number=$row_contact["parent_contact"];
	}
	
	$sql="INSERT INTO donation (first_name, member_id, rec_date, rec_no, don_amount, don_towards, mobile, committee_year) VALUES('$first_name','$member_id','$rec_date','$rec_no','$don_amount','$don_towards','$mob_number','$cur_academic_year')";
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:sms_don.php?name=".$first_name."&rec_no=".$rec_no."&rec_date=".$rec_date."&mob=".$mob_number."&amount=".$don_amount);
	} 
	else 
	{
	header("Location:collect_donation.php?failed=.'failed'");	
	}
}

	}else{
		header("Location:login.php");
	}
	
?>