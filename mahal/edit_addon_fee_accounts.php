<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
	require("header.php");	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
	require("connection.php");
	$sql="select * from addon_fee_received where id ='".$id."'  and committee_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);
	if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		$addon_fee_received_amount=$value["addon_fee_received_amount"];
		$addon_fee_received_name=$value["addon_fee_received_name"];
		$rec_date=$value["rec_date"];
		$rec_no=$value["rec_no"];
		$first_name=$value["first_name"];
		$member_id=$value["member_id"];
		
		
		}
?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Addon Fee</h4></div>
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
	Name : <?php echo $first_name;?> , Member ID : <?php echo $member_id;?> 
							
	<form action="update_addon_fee_received.php" method="post">
      <div class="form-group">
	  <input type="hidden" name="first_name" value="<?php echo $first_name;?>" class="form-control" id="name" required>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="member_id" value="<?php echo $member_id;?>" class="form-control" id="member_id" required>
	  </div>
	  
 
	 
		
		
	  <div class="form-group">
	    <label for="usr">Addon/Other Fee Amount:</label>
		<input type="number" value="<?php echo $value["addon_fee_received_amount"]; ?>" name="addon_fee_received_amount" class="form-control">
	  </div>
	  
	   <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Addon Fee Name:</label>
	<select class="form-control" name="addon_fee_received_name" id="sel1">
	<option value="<?php echo $value["addon_fee_received_name"]; ?>"><?php echo $value["addon_fee_received_name"]; ?></option>
	  <?php
	  $sql="select distinct addon_fee_received_name from addon_fee_received order by addon_fee_received_name";
	  $result=mysqli_query($conn,$sql);
	  foreach($result as $row){
	  ?>
	  <option value="<?php echo $row["addon_fee_received_name"]; ?>"><?php echo $row["addon_fee_received_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	 
		
	  <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="<?php echo $value["rec_date"]; ?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" value="<?php echo $value["rec_no"]; ?>" class="form-control">
	  </div>
	 <input type="hidden" name="id" value="<?php echo $value["id"]; ?>" class="form-control">
	 
		
	<input type="submit" name="addon_received_fee" class="btn btn-success" value="Update Addon Fee">
	
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