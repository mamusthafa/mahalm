<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");
$sql="select * from noc_certificate order by id desc";
$result=mysqli_query($conn,$sql);
	
?>
<head>  
<script type="text/javascript">
function CheckExpense(val){
 var element=document.getElementById('reason_divorc');
 if(val==='second')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 
</head>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12"><br>
			<h2 style="font-weight:bold;color:green;">Marriage NOC issued and Received</h2>
				<table class="table table-bordered">
					<th>SL No</th>
					<th>Name</th>
					<th>Member ID/ Address</th>
					<th>Marriage Date</th>
					<th>Father Name</th>
					<th>Mother Name</th>
					<th>Certificate NO</th>
					<th>Issued Date</th>
					<th>Action</th>
					 </tr> 
					 <?php 
					 $row_count=1;
					 foreach($result as $row)
					 {
						 
					$issued_date= date('d-m-Y', strtotime( $row['issued_date'] ));
					$mar_date= date('d-m-Y', strtotime( $row['mar_date'] ));
					 $father_name=$row["father_name"];
					 $mother_name=$row["mother_name"];
					 $first_name=$row["first_name"];
					 $member_id=$row["member_id"];
					 $id=$row["id"];
					
					 ?>
					 <tr> 
					 <td><?php echo $row_count;?></td> 
					 <td><?php echo $first_name;?></td> 
					 <td><?php echo $member_id;?></td> 
					 <td><?php echo $mar_date;?></td> 
					 <td><?php echo $father_name;?></td> 
					 <td><?php echo $mother_name;?></td> 
					 <td><?php echo $id;?></td> 
					 <td><?php echo $issued_date;?></td> 
					<td>
						 <div class="btn-group">
						<a href="<?php echo 'edit_noc_certificate.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
						
						
						<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
						
					   <a href="<?php echo 'noc_certificate.php?id='.$row['id']; ?>" title="Print">   <i class="fa fa-print fa-lg" style="color:green;" aria-hidden="true"></i></a>
					   </div>
						
						 </td>

								
								<script>
								  function deleteme(id){
									  if(confirm("Do you want to delete?")){
										  window.location.href='delete_noc_certificate.php?id='+id+'';
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




<?php
require("footer.php");				
}
else
{
header("Location:login.php");
}
?>  
