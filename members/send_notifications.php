<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
	
	require("header.php");	

?>
       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		
		
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Send Notifications</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Assignments has been sent successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_notifications.php" method="post">
 
	  <div class="form-group">
	  <label for="sel1">Select Class</label>
	  <select class="form-control" name="class">
		<option value="">Select Class</option>
		<option value="all">All</option>
		<option value="lkg">LKG</option>
			<option value="ukg">UKG</option>
			 <option value="first standard">1st Standard</option>
				<option value="second standard">2nd Standard</option>
			  <option value="third standard">3rd Standard</option>
			  <option value="fourth standard">4th Standard</option>
			  <option value="fifth standard">5th Standard</option>
			  <option value="sixth standard">6th Standard</option>
			  <option value="seventh standard">7th Standard</option>
			  <option value="eighth standard">8th Standard</option>
			   <option value="ninth standard">9th Standard</option>
			  <option value="tenth standard">10th Standard</option>
			  <option value="first puc">1st PUC</option>
			  <option value="second puc">2nd PUC</option>
		</select><br>
		</div>
	  <div class="form-group">
	    <label for="usr">Title:</label>
		<input type="text" name="notifi_title" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Description:</label>
		 <textarea class="form-control" name="notifi_desc"  rows="5"></textarea>
	  </div>
	  
	  <div class="form-group">
	   <input type="hidden" name="notifi_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
		
	  </div>
	<input type="submit" name="notifications" class="btn btn-success" value="Update Notifications">
	</form>
    </div>
    </div>
    </div>
	
	
	

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>



    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>



<?php 



	}else{
		header("Location:login.php");
	}
	



?>