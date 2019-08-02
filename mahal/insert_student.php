<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["register"]))
{
	$first_name=test_input($_POST["first_name"]);
	$roll_no=test_input($_POST["roll_no"]);
	$sex=test_input($_POST["sex"]);
	$dob=test_input($_POST["dob"]);
	$address=test_input($_POST["address"]);
	$father_name=test_input($_POST["father_name"]);
	$mother_name=test_input($_POST["mother_name"]);
	$section=test_input($_POST["section"]);
	$adhaar_no=test_input($_POST["adhaar_no"]);
	$present_class=test_input($_POST["present_class"]);
	$blood=test_input($_POST["blood"]);
	$parent_contact=test_input($_POST["parent_contact"]);
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");	
	
	$filetmp = $_FILES["photo"]["tmp_name"];
	$filename = $_FILES["photo"]["name"];
	$filetype = $_FILES["photo"]["type"];
	$filepath = "photo/".$filename;
	move_uploaded_file($filetmp,$filepath);
	
	$sql="insert into students (present_class,roll_no,blood,join_date,sex,dob,academic_year,father_name,mother_name,first_name,parent_contact,section,address,adhaar_no,photo_name,photo_path,photo_type) values('$present_class','$roll_no','$blood','$today_date','$sex','$dob','$cur_academic_year','$father_name','$mother_name','$first_name','$parent_contact','$section','$address','$adhaar_no','$filename','$filepath','$filetype')";
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:register_students.php?success=.'success'");
    } 
	else 
	{
	var_dump($sql);			
		
	}
}
}
else
{
header("Location:login.php");
}
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>