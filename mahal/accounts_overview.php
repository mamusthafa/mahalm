<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Income</h4></div>
      <div class="panel-body">
		<?php
		if(isset($_GET["success_income"]))
			{
			$success=$_GET["success_income"];
			echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';
			}
		if(isset($_GET["failed"]))
			{
			$failed=$_GET["failed"];
			echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';
			}
			?>
								
							
<form action="insert_income.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="" class="form-control">
	  </div>
	 
	  <div class="form-group">
	<label for="usr">Source:</label>
	<select class="form-control" name="source">
	<option value="">Select Income Source</option>
	  <?php
	  $sql_name="select distinct income_name from income_name order by income_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["income_name"]; ?>"><?php echo $row_name["income_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	  
	 <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="" class="form-control">
	  </div>
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="number" name="rec_no" value="" class="form-control">
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Added by:</label>
		<input type="text" name="added_by" value="" class="form-control">
	  </div>
	<input type="submit" name="income" class="btn btn-success" value="Update Income">
	</form>
    </div>
    </div>
    </div>
	
	
	<div class="col-sm-6"><br>
		<div class="panel panel-red">
     <div class="panel-heading"><h4>Update Expense</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success_exp"]))

				{

					$success=$_GET["success_exp"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_expense.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="" class="form-control">
	  </div>
	  
	
	  
	  <div class="form-group">
	<label for="usr">Towards:</label>
	<select class="form-control" name="towards">
	<option value="">Select Expense Towards</option>
	  <?php
	  $sql_exp_name="select distinct expense_name from expense_name order by expense_name";
	  $result_exp_name=mysqli_query($conn,$sql_exp_name);
	  foreach($result_exp_name as $row_exp_name){
	  ?>
	  <option value="<?php echo $row_exp_name["expense_name"]; ?>"><?php echo $row_exp_name["expense_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Expense Date:</label>
		<input type="date" name="exp_date" value="" class="form-control">
	  </div>
	 
	 <div class="form-group">
	    <label for="usr">Added by:</label>
		<input type="text" name="added_by" value="" class="form-control">
	 </div>
	 <input type="submit" name="expense" class="btn btn-danger" value="Update Expense">
	</form>
    </div>
    </div>
    </div>
	
	

	
    </div>
</div>


<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>