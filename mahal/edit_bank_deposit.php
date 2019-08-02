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
     <div class="panel-heading"><h4>Edit Bank Deposit</h4></div>
      <div class="panel-body">
		<?php
		
		if(isset($_GET["id"])){
		$id = $_GET["id"];	
		}
		
		$sql="select * from bank_deposit where id = '".$id."'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		$bank_name = $row["bank_name"];	
		$amount = $row["amount"];		
		$source = $row["source"];	
		$dep_date = $row["dep_date"];		
		}
		if(isset($_GET["success"]))
			{
			$success=$_GET["success"];
			echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Thank you. Updated successfully</span><br></p>';
			}
		if(isset($_GET["failed"]))
			{
			$failed=$_GET["failed"];
			echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong.</span><br></p>';
			}
			?>
								
							
<form action="update_bank_deposit.php" method="post">
 
	 
	  <div class="form-group">
	    <label for="usr">Amount:</label>
		<input type="number" name="amount" value="<?php echo $amount;?>" class="form-control">
	  </div>
	 
	<div class="form-group">
	    <label for="usr">Source:</label>
		<input type="text" name="source" value="<?php echo $source;?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	<label for="usr">Bank:</label>
	<select class="form-control" name="bank_name">
	<option value="<?php echo $bank_name;?>"><?php echo $bank_name;?></option>
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
		<input type="date" name="dep_date" value="<?php echo $dep_date;?>" class="form-control">
	  </div>
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" name="bank_deposit" class="btn btn-success" value="Update Deposit">
	</form>
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