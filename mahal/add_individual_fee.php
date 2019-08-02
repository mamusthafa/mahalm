<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Individual Fee</h4></div>
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
			$member_type=$_GET["member_type"];
			
			?>
	Name : <?php echo $first_name;?> , Member ID : <?php echo $member_id;?> , Member Type : <?php echo $member_type;?> 				
<form action="insert_individual_fee.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Fee Name:</label>
	<select class="form-control" name="fee_name">
	  <?php
	  $sql_name="select distinct fee_name from fee_name order by fee_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["fee_name"]; ?>"><?php echo $row_name["fee_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Fee Amount:</label>
		<input type="text" name="fee_amount" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Note (if any):</label>
		<input type="text" name="note" class="form-control" >
	  </div>
	  
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>" class="form-control" >
	  <input type="hidden" name="member_id" value="<?php echo $member_id;?>" class="form-control" >
	  <input type="hidden" name="member_type" value="<?php echo $member_type;?>" class="form-control" >
	  
	
	 
	<input type="submit" name="fee_type" class="btn btn-success" value="Update Fee">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
