<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container"><br>

	<div class="row">
 
    <div class="col-sm-12">
	<a href="add_bank.php" class="btn btn-success">Add Bank</a>
	<center><h2>All Banks</h2></center>
	<center>
		<div class="table-responsive"> 
		<table class="table table-bordered table-striped">
		<tbody>
		<tr>
			<th>SL.No</th>
			<th>Bank Name</th>
			<th>Bank Branch</th>
			<th>Account No</th>
			<th>Account Holders Name</th>
			<th>Added at</th>
			<th></th>
		</tr>
		<?php
		$sql="select * from bank_det  ORDER BY bank_name";
		$result=mysqli_query($conn,$sql);
		$row_count =1;
		foreach($result as $value)
		{
		$created_at= date('d-m-Y', strtotime( $value['created_at'] ));
		?>
		<tr>
	
		<td><?php echo $row_count;?></td>
		<td><?php echo $value["bank_name"];?></td>
		<td><?php echo $value["branch"];?></td>
		<td><?php echo $value["acc_no"];?></td>
		<td><?php echo $value["acc_hold"];?></td>
		<td><?php echo $created_at;?></td>
		<td><div class="btn-group">
        <a href="<?php echo 'edit_bank.php?id='.$value['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="#" onclick="deletebank(<?php echo $value['id'];?>)" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
		</tr>
		
		<script>
		  function deletebank(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_bank.php?id='+id+'';
			  }
		  }
		  
		  </script>
		<?php
		$row_count++;
		}
		?>
		</tbody>
		</table>
		</div>
		</center>
		<br>
		<br>
		<br>
		<br>
	
    </div>
   
	
	</div>
	</div>

<?php require("footer.php"); } else { header("Location:login.php");} ?>  


