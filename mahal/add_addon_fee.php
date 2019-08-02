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
     <div class="panel-heading"><h4>Add Addon Fee Type</h4></div>
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
							
<form action="insert_addon_fee_type.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Other Fee Name:</label>
		<input type="text" name="addon_fee_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Fee Amount:</label>
		<input type="text" name="addon_fee_amount" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Fee Details:</label>
		<input type="text" name="details" class="form-control" >
	  </div>
	 

	 <!--
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
	 -->
	 
	<input type="submit" name="addon_fee_type" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
