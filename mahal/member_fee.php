<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Collect Member Fee</h4></div>
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
			
			?>
	Name : <?php echo $first_name;?> , Member ID : <?php echo $member_id;?> 
							
	<form action="insert_member_fee.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="name" value="<?php echo $first_name;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="member_id" value="<?php echo $member_id;?>" class="form-control" id="member_id" required>
	  </div>
	  
 
	 
		
		
	  <div class="form-group">
	    <label for="usr">Member Fee Amount:</label>
		<input type="number" name="member_fee_amount" class="form-control">
	  </div>
	  
	   <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Fee Type:</label>
	<select class="form-control" name="member_fee_type" id="sel1">
	  <?php
	  $sql="select distinct member_fee_type_name from member_fee_type order by member_fee_type_name";
	  $result=mysqli_query($conn,$sql);
	  foreach($result as $row){
	  ?>
	  <option value="<?php echo $row["member_fee_type_name"]; ?>"><?php echo $row["member_fee_type_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" class="form-control">
	  </div>
	  
	  <div class="form-group">
	  <label for="sel1">Select Month:</label>
	  <select class="form-control" name="month">
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
	 </select>
	</div>
	 
	
		
	<input type="submit" name="student_fee" class="btn btn-success" value="Collect Fee">
	
	</form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>

	
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  
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