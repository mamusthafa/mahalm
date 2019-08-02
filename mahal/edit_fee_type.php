<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$id = $_GET['id'];
require("header.php");	
require("connection.php");

$sql="select * from member_fee_type where id='".$id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$member_fee_type_name=$row["member_fee_type_name"];
		$fee_amount=$row["fee_amount"];
		$member_type=$row["member_type"];
		$added_date=$row["added_date"];
	}
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Edit Fee Type</h4></div>
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
							
<form action="update_fee_type.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Fee Name:</label>
		<input type="text" name="member_fee_type_name" value="<?php echo $member_fee_type_name;?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Fee Amount:</label>
		<input type="text" name="fee_amount" value="<?php echo $fee_amount;?>" class="form-control">
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	 <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
	<select class="form-control" name="member_type" id="sel1">
	  <?php
	  $sql="select distinct member_type_name from member_type order by member_type_name";
	  $result=mysqli_query($conn,$sql);
	  foreach($result as $row){
	  ?>
	  <option value="<?php echo $member_type; ?>"><?php echo $member_type; ?></option>
	  <option value="<?php echo $row["member_type_name"]; ?>"><?php echo $row["member_type_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Added Date:</label>
		<input type="date" name="added_date" value="<?php echo $added_date;?>" class="form-control">
	  </div>
	 
	 
	<input type="submit" name="fee_type" class="btn btn-success" value="Update Fee Type">
	</form><br>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
