<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
require("header.php");
$sql="select * from ad_members where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$username=$row["username"];
	$log_pas=$row["log_pas"];
	$user_access=$row["user_access"];
	$id=$row["id"];
	
	}
?>

<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Admin</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
                  echo '<div class="alert alert-success">
                   <strong>Success!</strong> Admin has been added successfully
                  </div>';
					

				}
		if(isset($_GET["failed"]))

				{

					echo '<div class="alert alert-danger">
                   <strong>Sorry!</strong> Something went wrong. try again.or contact your webmaster.
                  </div>';
			
				}
				?>
								
							
<form action="update_ad_members.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
	   <label for="usr">Username:</label>
		<input type="text" name="user_name" value="<?php echo $username;?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Password:</label>
		<input type="password" name="password" value="<?php echo $log_pas;?>" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label for="usr">User Access:</label>
		<select name="user_access" class="form-control" required>
			<option value="<?php echo $user_access; ?>"><?php echo $user_access; ?></option>
			<option value="admin">Admin</option>
			<option value="swalath_committee">Swalath Committee</option>
			
		</select>
	  </div>
	 <input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="submit" name="admin" class="btn btn-success" value="Update Admin">
	</form>
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
