<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from applications order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="all_reply.php" title="Reply"> <button type="button" class="btn btn-success">View All Reply</button></a><button onclick="goBack()" class="btn btn-primary">Go Back</button><br>
	<h3>All Aplications</h3>
	 <div class="table-responsive">
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Subject</th>
	<th width="40%">Message</th>
	<th>Sent By</th>
	<th>Member ID</th>
	<th>Sent Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 $row_count=1;
	 foreach($result as $row)
	 {
		 
	$sent_date= date('H:ia d-m-Y', strtotime( $row['message_time'] ));
	
	 $id=$row["id"];
	 $subject=$row["subject"];
	$message=$row["message"];
	$first_name=$row["first_name"];
	$member_id=$row["member_id"];
	
	
	 ?>
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><?php echo $subject;?></td> 
	 <td width="40%"><?php echo $message;?></td> 
	 <td><?php echo $first_name;?></td> 
	 <td><?php echo $member_id;?></td> 
	 <td><?php echo $sent_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'reply_applications.php?id='.$id; ?>" title="Reply"> <button type="button" class="btn btn-primary">Reply</button></a>
        
		<a href="#" onclick="deleteapp(<?php echo $row['id'];?>)" title="Delete"> <button type="button" class="btn btn-danger">Delete</button></a>
		<a href="<?php echo 'print_application.php?id='.$id; ?>" title="Reply"> <button type="button" class="btn btn-success">Print</button></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteapp(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_applications.php?id='+id+'';
					  }
				  }
				  
				  </script>



		 
	 </tr> 
	 <?php
$row_count++;	 
	}
	 ?>
	</table>
	</div>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
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
