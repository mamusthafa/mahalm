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
     <div class="panel-heading"><h4>Add Bank</h4></div>
      <div class="panel-body">
		<?php
		if(isset($_GET["success"]))
		{
	    echo '<div class="alert alert-success">
	    <strong>Success!</strong> Bank Details added successfully
	    </div>';
		}
		if(isset($_GET["failed"]))
		{
		echo '<div class="alert alert-danger">
	   <strong>Sorry!</strong> Something went wrong. try again.or contact your webmaster.
	  </div>';
		}
		?>
								
							
<form action="insert_bank_det.php" method="post">
       <div class="form-group">
	   <label for="usr">Bank name:</label>
		<input type="text" name="bank_name" class="form-control">
	  </div>
	 
	  <div class="form-group">
	   <label for="usr">Branch:</label>
		<input type="text" name="branch" class="form-control">
	  </div>
	 
	 
	  <div class="form-group">
	   <label for="usr">Account No:</label>
		<input type="text" name="acc_no" class="form-control">
	  </div>
	 
	  <div class="form-group">
	   <label for="usr">Account Holder Name:</label>
		<input type="text" name="acc_hold" class="form-control">
	  </div>
	 
	<input type="submit" name="bank" class="btn btn-success" value="Add Bank">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>
<?php require("footer.php"); } else { header("Location:login.php");} ?>  
