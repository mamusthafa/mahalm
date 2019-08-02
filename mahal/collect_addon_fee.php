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
     <div class="panel-heading"><h4>Collect Addon Fee</h4></div>
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
							
	<form action="insert_addon_fee_received.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="member_id" value="<?php echo $member_id;?>" class="form-control" id="member_id" required>
	  </div>
	  
	<div class="form-group">
	    <label for="usr">Addon Fee Amount:</label>
		<input type="number" name="addon_fee_received_amount" class="form-control">
	  </div>
	  
	   <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Addon Fee Name:</label>
	<select class="form-control" name="addon_fee_received_name" id="sel1">
	  <?php
	  $sql="select distinct addon_fee_name from addon_fee order by addon_fee_name";
	  $result=mysqli_query($conn,$sql);
	  foreach($result as $row){
	  ?>
	  <option value="<?php echo $row["addon_fee_name"]; ?>"><?php echo $row["addon_fee_name"]; ?></option>
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
	 
	 
		
	<input type="submit" name="addon_received_fee" class="btn btn-success" value="Collect Addon Fee">
	
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