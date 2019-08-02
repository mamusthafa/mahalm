<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
require("header.php");
require("connection.php");
$sql="select * from events where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Edit Upcoming Events</h4></div>
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
						
<form action="update_events.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">Event Name:</label>
		<input type="text" name="evt_name" value="<?php echo $value['evt_name'];?>" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Event Date:</label>
		<input type="date" name="evt_date"  value="<?php echo $value['evt_date'];?>" class="form-control">
	  </div>
	 
	  
	 
	   <div class="form-group">
	    <label for="usr">Event Time:</label>
		<input type="time" name="evt_time"  value="<?php echo $value['evt_time'];?>" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Venue:</label>
		<input type="text" name="evt_venue" value="<?php echo $value['evt_venue'];?>" class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="usr">Contact No:</label>
		<input type="text" name="evt_mob" value="<?php echo $value['evt_mob'];?>" class="form-control">
	  </div>
	
	<div class="form-group">
	    <label for="usr">Details:</label>
		<textarea rows="6" name="evt_details" class="form-control"><?php echo $value['evt_details'];?></textarea>
		</div>
		<input type="hidden" name="id" value="<?php echo $value['id'];?>">
		
		<input type="submit" name="events" class="btn btn-success" value="Update Event">
	</form>
	
	<?php
	}
	?>
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
