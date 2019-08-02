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
     <div class="panel-heading"><h4>Add Bank Deposit</h4></div>
      <div class="panel-body">
		<?php
		if(isset($_GET["success"]))
			{
			$success=$_GET["success"];
			echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';
			}
		if(isset($_GET["failed"]))
			{
			$failed=$_GET["failed"];
			echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';
			}
			?>
								
							
<form action="insert_bank_deposit.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="" class="form-control">
	  </div>
	 
	<div class="form-group">
	    <label for="usr">Source:</label>
		<input type="text" name="source" value="" class="form-control">
	  </div>
	 
	  <div class="form-group">
	<label for="usr">Bank:</label>
	<select class="form-control" name="bank_name">
	<option value="">Select Bank</option>
	  <?php
	  $sql_name="select distinct bank_name from bank_det order by bank_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["bank_name"]; ?>"><?php echo $row_name["bank_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Deposit Date:</label>
		<input type="date" name="dep_date" value="" class="form-control">
	  </div>
	 
	<input type="submit" name="bank_deposit" class="btn btn-success" value="Submit Deposit">
	</form><br>
	<button class="btn btn-success" onclick="goBack()">Go Back</button>
    </div>
    </div>
    </div>
	<div class="col-sm-3">
		</div>
	  </div>
</div>


<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>