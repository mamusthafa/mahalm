<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
$sql="select * from marriage_certificate order by id desc";
$result=mysqli_query($conn,$sql);

?>
<div class="container-fluid"><br>
<div class="row">

    <div class="col-sm-12">
	<h3>All Marriage Certificates</h3>
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Name</th>
	<th>Address</th>
	<th>Wife Name</th>
	<th>Address</th>
	<th>Nikah Date</th>
	<th>Nikah Place</th>
	<th>Issued Date</th>
	<th></th>
	 </tr> 
	 <?php 
	 $row_count=1;
	foreach($result as $row)
	{
		 
	$updated_date= date('d-m-Y', strtotime( $row['updated_date'] ));
	 
	 ?>
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><?php echo $row["first_name"];?></td> 
	 <td><?php echo $row["address"];?></td> 
	 <td><?php echo $row["wife_first_name"];?></td> 
	 <td><?php echo $row["wife_address"];?></td>
	 <td><?php echo $row["nikah_date"];?></td>
	 <td><?php echo $row["nikah_place"];?></td>
	 <td><?php echo $updated_date;?></td> 
	<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_marriage_certificate.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
		
		<a href="<?php echo 'print_marriage_certificate.php?id='.$row['id']; ?>" title="Print">   <i class="fa fa-print fa-lg" style="color:green;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_marriage_certificate.php.php?id='+id+'';
					  }
				  }
				  
				  </script>



		 
	 </tr> 
	 <?php
	$row_count++;	 
	}
	 ?>
	</table>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>

  </div>
 
</div>



<?php require("footer.php"); } else { header("Location:login.php");} ?>  
