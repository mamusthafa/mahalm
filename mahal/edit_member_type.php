<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$id = $_GET['id'];
require("header.php");	
require("connection.php");

$sql="select * from member_type where id='".$id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$member_type_name=$row["member_type_name"];
		
	}
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Edit Member Type</h4></div>
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
							
<form action="update_member_type.php" method="post" enctype="multipart/form-data">
        
	  <div class="form-group">
	    <label for="usr">Member Type Name:</label>
		<input type="text" name="member_type_name" value="<?php echo $member_type_name;?>" class="form-control" required>
	  </div>
	  <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	 
	<input type="submit" name="member_type" class="btn btn-success" value="Update Member Type">
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
