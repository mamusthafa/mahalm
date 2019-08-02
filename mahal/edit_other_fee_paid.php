<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
		<div class="panel-heading"><h4>Edit Addon Fee</h4></div>
		<div class="panel-body">
			<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			
			$first_name=$_GET["first_name"];
			$member_id=$_GET["member_id"];
			$id=$_GET["id"];
			
			
			$sql="select * from addon_fee_received where id='".$id."'";
			$result_edit=mysqli_query($conn,$sql);
			if($row_edit=mysqli_fetch_array($result_edit,MYSQLI_ASSOC)){
			$addon_fee_received_amount = $row_edit["addon_fee_received_amount"];
			$addon_fee_received_name = $row_edit["addon_fee_received_name"];
			$rec_date = $row_edit["rec_date"];
			$rec_no = $row_edit["rec_no"];
			}
			?>
			Name : <?php echo $first_name;?> , Member ID : <?php echo $member_id;?> 
									
			<form action="update_other_fee_paid.php" method="post">
			<input type="hidden" name="name" value="<?php echo $first_name;?>">
			<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			 
			  
			<div class="form-group">
			<label for="usr">Fee Amount:</label>
			<input type="number" name="addon_fee_received_amount" value="<?php echo $addon_fee_received_amount;?>" class="form-control">
			</div>
			
			
			  
			<div class="form-group">
			<label for="usr">Select Fee Type:</label>
			<select class="form-control" name="addon_fee_received_name">
			  <?php
			  $sql="select distinct addon_fee_received_name from addon_fee_received order by addon_fee_received_name";
			  $result=mysqli_query($conn,$sql);
			  foreach($result as $row){
			  ?>
			  <option value="<?php echo $addon_fee_received_name; ?>"><?php echo $addon_fee_received_name; ?></option>
			  <option value="<?php echo $row["addon_fee_received_name"]; ?>"><?php echo $row["addon_fee_received_name"]; ?></option>
			   <?php
			  }
			   ?>
				</select>
			  </div>
			 
				
			  <div class="form-group">
				<label for="usr">Receipt Date:</label>
				<input type="date" name="rec_date" value="<?php echo $rec_date;?>" class="form-control">
			  </div>
			  
			 <div class="form-group">
				<label for="usr">Receipt No:</label>
				<input type="text" name="rec_no" value="<?php echo $rec_no;?>" class="form-control">
			  </div>
			 
			<input type="submit" name="update_indi_fee" class="btn btn-success" value="Update Addon Fee">
			
			</form><br>
			<button class="btn btn-primary" onclick="goBack()">Go Back</button>

			</div>
			</div>
			</div>
			<div class="col-sm-3"><br></div>
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