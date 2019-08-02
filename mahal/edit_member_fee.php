<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");

	if(isset($_GET["id"])){
		$id = $_GET["id"];
	}
	$sql="select * from member_fee_type where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$first_name = $row["first_name"];
	$member_id = $row["member_id"];
	$member_fee_type_name = $row["member_fee_type_name"];
	$fee_amount = $row["fee_amount"];
	$added_date = $row["added_date"];
	$member_type = $row["member_type"];
	$note = $row["note"];
	}
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Edit Fee</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			  ?>		
							
<form action="update_fee_member.php" method="post">

	<h4 style="color:red;font-weight:bold;">First Name: <?php echo $first_name;?> Member ID: <?php echo $member_id;?></h4>

     <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Fee Name:</label>
	<select class="form-control" name="member_fee_type_name">
	 <option value="<?php echo $member_fee_type_name; ?>"><?php echo $member_fee_type_name; ?></option>
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
		<input type="text" name="fee_amount" value="<?php echo $fee_amount;?>" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Fee Date:</label>
		<input type="date" name="added_date" value="<?php echo $added_date;?>" class="form-control" >
	  </div>
	  
	 <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
	<select class="form-control" name="member_type">
	<option value="<?php echo $member_type; ?>"><?php echo $member_type; ?></option>
	  <?php
	  $sql="select distinct member_type_name from member_type order by member_type_name";
	  $result=mysqli_query($conn,$sql);
	  foreach($result as $row){
	  ?>
	  <option value="<?php echo $row["member_type_name"]; ?>"><?php echo $row["member_type_name"]; ?></option>
	   <?php
	  }
	   ?>
	</select>
	   </div>
	   
	   <div class="form-group">
	    <label for="usr">Note(if any):</label>
		<input type="text" name="note" value="<?php echo $note;?>" class="form-control" >
	  </div>
	  
	  <input type="hidden" name="id" value="<?php echo $id;?>">
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>">
	  <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
	  
	 
	<input type="submit" name="edit_fee" class="btn btn-success" value="Update Fee">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
