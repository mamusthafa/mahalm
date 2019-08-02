<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM contact_mahal WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:received_messages.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>