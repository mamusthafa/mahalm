<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Add Member Type</h4></div>
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

								
							
<form action="insert_member_type.php" method="post">
         <div class="form-group">
	   <label for="usr">Member Type Name:</label>
		<input type="text" name="member_type_name" class="form-control" required>
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Select Committee Year:</label>
		<select name="academic_year" class="form-control" required>
			<option value="2018-2019">2018-2019</option>
			<option value="2019-2020">2019-2020</option>
			<option value="2020-2021">2020-2021</option>
			<option value="2021-2022">2021-2022</option>
		</select>
	  </div>
	
	  
	<input type="submit" name="member_type" class="btn btn-success" value="Register">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php require("footer.php"); } else { header("Location:login.php");} ?>  
