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
     <div class="panel-heading"><h4>Add Upcoming Events</h4></div>
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
							
<form action="insert_events.php" method="post" enctype="multipart/form-data">
  
	
	
	
	   <div class="form-group">
	   <label for="usr">Event Name:</label>
		<input type="text" name="evt_name" class="form-control" required>
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Event Date:</label>
		<input type="date" name="evt_date" class="form-control" required>
	  </div>
	 
	  
	 
	   <div class="form-group">
	    <label for="usr">Event Time:</label>
		<input type="time" name="evt_time" class="form-control">
	  </div>

	  <div class="form-group">
	    <label for="usr">Venue:</label>
		<input type="text" name="evt_venue" class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="usr">Contact No:</label>
		<input type="text" name="evt_mob" class="form-control" required>
	  </div>
	
	<div class="form-group">
	    <label for="usr">Details:</label>
		<textarea rows="6" name="evt_details" class="form-control"></textarea>
		</div>
		
		
		<input type="submit" name="events" class="btn btn-success" value="Register Event">
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
