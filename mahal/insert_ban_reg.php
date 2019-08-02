<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$memb_id = test_input($_POST["memb_id"]);
	$fname = test_input($_POST["fname"]);
	$mobile = test_input($_POST["mobile"]);
	$ban_reason = test_input($_POST["ban_reason"]);
    $reg_date = test_input($_POST["reg_date"]);
	$banned_date = test_input($_POST["banned_date"]);
	$id = test_input($_POST["id"]);
	
 if(isset($_POST['edit_prog_reg'])){
	  $sql_edit="update banned_reg set name='".$name."',memb_id='".$memb_id."',fname='".$fname."',mobile='".$mobile."',reg_date='".$reg_date."',banned_date='".$banned_date."',ban_reason='".$ban_reason."' where id='".$id."'";
	    if ($conn->query($sql_edit) === TRUE) {
			header("Location:banned_reg.php?status=.'edit_submitted'");
			} else {
			echo "Error: " . $sql_edit . "<br>" . $conn->error;
			}
  }else{ 
  
   
  $sql="insert into banned_reg (name,memb_id,fname,mobile,reg_date,banned_date,ban_reason) values('$name','$memb_id','$fname','$mobile','$reg_date','$banned_date','$ban_reason')";
		  if ($conn->query($sql) === TRUE) {
			header("Location:banned_reg.php?status=.'submitted'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			}
			}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
