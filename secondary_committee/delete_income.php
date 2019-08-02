<?php
session_start();
if(isset($_SESSION['second_uname'])&&!empty($_SESSION['second_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM sec_income WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:all_incomes.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
?>