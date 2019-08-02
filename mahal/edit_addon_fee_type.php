<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$id = $_GET['id'];
require("header.php");	
require("connection.php");

$sql="select * from addon_fee where id='".$id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$addon_fee_name=$row["addon_fee_name"];
		$details=$row["details"];
		$addon_fee_amount=$row["addon_fee_amount"];
	}
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Edit Addon Fee Type</h4></div>
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
							
<form action="update_addon_fee_type.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Addon Fee Name:</label>
		<input type="text" name="addon_fee_name" value="<?php echo $addon_fee_name;?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Details:</label>
		<input type="text" name="details" value="<?php echo $details;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Addon Fee Amount:</label>
		<input type="text" name="addon_fee_amount" value="<?php echo $addon_fee_amount;?>" class="form-control">
	  </div>
	  
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	  
	 
	 
	<input type="submit" name="edit_addon_fee_type" class="btn btn-success" value="Update Fee Type">
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
