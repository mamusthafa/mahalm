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
     <div class="panel-heading"><h4>Add Fee Name</h4></div>
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
							
<form action="insert_fee_name.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Fee Name:</label>
		<input type="text" name="fee_name" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Fee Details:</label>
		<input type="text" name="fee_details" class="form-control" >
	  </div>
	 
	<input type="submit" class="btn btn-success" value="Add Fee Name">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
