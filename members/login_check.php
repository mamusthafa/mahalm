<?php
session_start();

	$user=$_POST['parents_uname'];
	$log_pas=$_POST['parents_pass'];
	
//$password=md5($password);
	require("connection.php");
	$sql='select first_name,member_id from members where first_name="'.$user.'" and member_id="'.$log_pas.'"';
	$result=mysqli_query($conn,$sql);
	
	var_dump($sql);
	
	
	$f=false;
	if($row=mysqli_fetch_array($result))
		{
		header("location: index.php");
		$_SESSION['parents_uname']=$user;
		$_SESSION['parents_pass']=$log_pas;
		$f=true;
		}
		else
		{
		$status="User/Password incorrect1!";
		header("Location:login.php?failed=failed");
		}
	if($f)
		{	
		header("location: index.php");
		}
		else
		{
		$status="User/Password incorrect2!";
		header("Location:login.php?failed=failed");
		}
		
	
?>