<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from addon_fee order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>Update Addon Fee Type</h3>
	<table class="table table-bordered">
	<th>Addon Fee Name</th>
	<th>Details</th>
	<th>Addon Fee Amount</th>
	<th>Committee Year</th>
	<th>Updated Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 foreach($result as $row)
	 {
		 
	$updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
	 $addon_fee_name=$row["addon_fee_name"];
	$details=$row["details"];
	$addon_fee_amount=$row["addon_fee_amount"];
	$committee_year=$row["committee_year"];
	
	 ?>
	 <tr> 
	 <td><?php echo $addon_fee_name;?></td> 
	 <td><?php echo $details;?></td> 
	 <td><?php echo $addon_fee_amount;?></td> 
	 <td><?php echo $committee_year;?></td> 
	 <td><?php echo $updated_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_addon_fee_type.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_addon_fee.php?id='+id+'';
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
