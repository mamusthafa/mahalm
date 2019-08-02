<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from mahal_det order by id desc limit 1";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$sch_name=$row["sch_name"];
	$city=$row["city"].", ".$row["location"];

	$phone=$row["phone"];
	$mob=$row["mob"];
	$email=$row["email"];
	$web=$row["web"];
	$sender_id=$row["sender_id"];
	}
?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>Mahal Details</h3>
	<table class="table table-bordered">
	<th>Mahal Name</th>
	
	<th>Location</th>
	<th>Contact Details</th>
	<th>Email & Web</th>
	<th>Sender ID</th>
	<th></th>
	 </tr> 
	 <tr> 
	 <td><?php echo $sch_name;?></td> 
	
	 <td><?php echo $city;?></td> 
	 <td>Phone : <?php echo $phone."<br>Mobile : ".$mob;?></td> 
	 <td>Email : <?php echo $email."<br>Web : ".$web;?></td> 
	 <td><?php echo $sender_id;?></td> 
	 <td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_confi.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'delete_confi.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td> 
	 </tr> 
	</table>
	</div>

  </div>
 
</div>



<?php
require("footer.php");				
}
else
{
header("Location:login.php");
}
?>  
