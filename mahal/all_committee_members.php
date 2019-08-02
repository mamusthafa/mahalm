<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from committees order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>All Committee Members</h3>
	<table class="table table-bordered">
	<th>Committee Name</th>
	<th>Member Name</th>
	<th>Designation</th>
	<th>Mobile</th>
	<th>Added Date</th>
	<th>Updated Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
	$added_date= date('d-m-Y', strtotime( $row['added_date'] ));
	$updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
	 $committee_name=$row["committee_name"];
	$first_name=$row["first_name"];
	$designation=$row["designation"];
	$member_id=$row["member_id"];
	$committee_year=$row["committee_year"];
	
	$sql_cont="select parent_contact from members where first_name='".$first_name."' and member_id='".$member_id."'";
	$result_cont=mysqli_query($conn,$sql_cont);
	if($row_cont=mysqli_fetch_array($result_cont,MYSQLI_ASSOC))
	{
	$parent_contact=$row_cont["parent_contact"];	
	}
	?>
	 <tr> 
	 <td><?php echo $committee_name;?></td> 
	 <td><?php echo $first_name;?></td> 
	 <td><?php echo $designation;?></td> 
	 <td><?php echo $parent_contact;?></td> 
	 <td><?php echo $added_date;?></td> 
	 <td><?php echo $updated_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_committee_member.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_committee_member.php?id='+id+'';
					  }
				  }
				  
				  </script>



		 
	 </tr> 
	 <?php 
	}
	 ?>
	</table>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>

  </div>
 
</div>



<?php require("footer.php"); } else { header("Location:login.php");} ?>  
