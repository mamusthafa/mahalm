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
     <div class="panel-heading"><h4>Banned Registration</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{

					$success=$_GET["success"];

					echo '<p style="text-align: center;"><span style="color: green; font-size: 16px; font-weight: bold; text-align: center;">Congrajulation.Faculty has been added successfully</span><br></p>';

				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
								
								
								?>
								
							
<form action="insert_ban_reg.php" method="post">
        
	   <div class="form-group">
		  <label for="usr">Member Name:</label>
		  <input type="text" class="form-control" id="name" name="name" required>
		</div>
		
		<div class="form-group">
		  <label for="usr">Member ID:</label>
		  <input type="text" class="form-control" id="memb_id" name="memb_id">
		</div>


		<div class="form-group">
		  <label for="usr">Father Name:</label>
		  <input type="text" class="form-control" name="fname" required>
		</div>
		
		
		<div class="form-group">
		  <label for="usr">Mobile:</label>
		  <input type="text" class="form-control" name="mobile">
		</div>
		
		<div class="form-group">
		  <label for="usr">Ban Reason:</label>
		  <input type="text" class="form-control" name="ban_reason">
		</div>
		
		<div class="form-group">
		  <label for="usr">Banned Date:</label>
		  <input type="date" class="form-control" name="banned_date">
		</div>
		
		 <input type="hidden" class="form-control" name="reg_date" value="<?php echo date("Y-m-d");?>">	 
						
		<p><input type="submit" class="dc-button" value="Register"></p>
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
