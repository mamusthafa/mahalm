<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from member_fee_type order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>All Fee Types</h3>
	<table class="table table-bordered">
	<th>Fee Type Name</th>
	<th>Member Type</th>
	<th>Fee Amount</th>
	<th>Committee Year</th>
	<th>Added Date</th>
	<th>Updated Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
		 
	$updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
	$added_date= date('d-m-Y', strtotime( $row['added_date'] ));
	 $member_fee_type_name=$row["member_fee_type_name"];
	$member_type=$row["member_type"];
	$fee_amount=$row["fee_amount"];
	$committee_year=$row["committee_year"];
	
	
	 ?>
	 <tr> 
	 <td><?php echo $member_fee_type_name;?></td> 
	 <td><?php echo $member_type;?></td> 
	 <td><?php echo $fee_amount;?></td> 
	 <td><?php echo $committee_year;?></td> 
	 <td><?php echo $added_date;?></td> 
	 <td><?php echo $updated_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_fee_type.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
	 </td>
		<script>
			  function deleteme(id){
				  if(confirm("Do you want to delete?")){
					  window.location.href='delete_fee_type.php?id='+id+'';
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
