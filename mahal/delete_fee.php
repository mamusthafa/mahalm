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
		<div class="panel panel-red">
     <div class="panel-heading"><h4>Delete Fee</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Selected Fee Deleted successfully.
			</div>
				  <?php
			  }
			  ?>		
							
<form action="delete_inserted_fee.php" method="post">

     <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Fee Name:</label>
	<select class="form-control" name="member_fee_type_name">
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
	    <label for="usr">Fee Date:</label>
		<input type="date" name="added_date" class="form-control" >
	  </div>
	  
	 <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
	<select class="form-control" name="member_type" id="sel1">
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
	  
	 
	<input type="submit"  class="btn btn-danger" value="Delete Fee">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
