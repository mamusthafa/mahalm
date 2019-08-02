<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("connection.php");
if(isset($_POST["upd_register"]))
{
	$first_name=$_POST["first_name"];
	$sex=$_POST["sex"];
	$section=$_POST["section"];
	$address=$_POST["address"];
	$blood=$_POST["blood"];
	$id=$_POST["id"];
	$dob=$_POST["dob"];
	$present_class=$_POST["present_class"];
	$parent_contact=$_POST["parent_contact"];
	$father_name=$_POST["father_name"];
	$roll_no=$_POST["roll_no"];
	$adhaar_no=$_POST["adhaar_no"];
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
	
	if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
	//echo "set";
    $filetmp = $_FILES["photo"]["tmp_name"];

	$filename = $_FILES["photo"]["name"];

	$filetype = $_FILES["photo"]["type"];

	$filepath = "photo/".$filename;

	move_uploaded_file($filetmp,$filepath);	
	
     $sql="Update students set first_name='".$first_name."',join_date='".$today_date."',present_class='".$present_class."',sex='".$sex."',dob='".$dob."',parent_contact='".$parent_contact."',father_name='".$father_name."',address='".$address."',section='".$section."',adhaar_no='".$adhaar_no."',blood='".$blood."',roll_no='".$roll_no."' ,photo_name='".$filename."',photo_path='".$filepath."',photo_type='".$filetype."' where id='".$id."'";	
	}
	else
	{
	//echo "Not set";
	   $sql="Update students set first_name='".$first_name."',join_date='".$today_date."',present_class='".$present_class."',sex='".$sex."',dob='".$dob."',parent_contact='".$parent_contact."',father_name='".$father_name."',address='".$address."',section='".$section."',adhaar_no='".$adhaar_no."',blood='".$blood."',roll_no='".$roll_no."' where id='".$id."'";	
	}
	

	
	if ($conn->query($sql) === TRUE) 
	{
	//var_dump($sql);
    header("Location:all_students.php?success=.'success'");	
	}
	}
	}else
	{
		header("Location:login.php");
	}
	


?>