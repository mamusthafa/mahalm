<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from contact_mahal order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container"><br>
<div class="row">

    <div class="col-sm-12">
	<a href="all_reply_messages.php" title="Reply"> <button type="button" class="btn btn-success">View All Reply</button></a> <button onclick="goBack()" class="btn btn-primary">Go Back</button><br>
	<h3>All Messages</h3>
	 <div class="table-responsive">
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Subject</th>
	<th>Message</th>
	<th>Sent By</th>
	<th>Member ID</th>
	<th>Sent Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 $row_count=1;
	 foreach($result as $row)
	 {
	$sent_date= date('d-m-Y', strtotime( $row['sent_date'] ));
	$id=$row["id"];
	$subject=$row["subject"];
	$message=$row["message"];
	$first_name=$row["first_name"];
	$member_id=$row["member_id"];
	?>
	
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><?php echo $subject;?></td> 
	 <td><?php echo $message;?></td> 
	 <td><?php echo $first_name;?></td> 
	 <td><?php echo $member_id;?></td> 
	 <td><?php echo $sent_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'reply_messages.php?id='.$id; ?>" title="Reply"> <button type="button" class="btn btn-primary">Reply</button></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete"> <button type="button" class="btn btn-danger">Delete</button></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_message.php?id='+id+'';
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
