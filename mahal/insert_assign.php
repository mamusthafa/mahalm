<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["assignment"]))
{
	
	
	$class=$_POST["class"];
	$assign_title=$_POST["assign_title"];
	$assign_desc=$_POST["assign_desc"];
	$assign_date=$_POST["assign_date"];
	
	$sql="insert into assign (class,assign_title,assign_desc,assign_date,academic_year) values('$class','$assign_title','$assign_desc','$assign_date','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	//header("Location:sms_assign.php?class=".$class."&assign_title=".$assign_title."&assign_date=".$assign_date);
	header("Location:index.php?success=success");

	} 
	else 
	{
				
	header("Location:add_holiday.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>