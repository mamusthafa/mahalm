<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid"><br>
<div class="row">
 <form action="insert_school.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6 col-sm-offset-3">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Add School/College Details</h3>
			  
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>School / College Name:</label>
					  <input type="text"  name="sch_name" required class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Primary DISE Code</label>
					  <input type="text"  name="sch_dise1"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>High school DISE Code</label>
					  <input type="text"  name="sch_dise2"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>PUC DISE Code</label>
					  <input type="text"  name="sch_dise3"  class="form-control">
					</div>
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Degree DISE Code</label>
					  <input type="text"  name="sch_dise4"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Location</label>
					  <input type="text"  name="location"  class="form-control">
					</div>
					
					
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>City:</label>
					  <input type="text"  name="city"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>District:</label>
					  <input type="text"  name="district"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>State:</label>
					  <input type="text"  name="state"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>PIN:</label>
					  <input type="text"  name="pin"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Office Phone:</label>
					  <input type="text"  name="phone"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">SMS Sender ID (only in Capital letters):</label>
					  <input type="text"  name="sender_id"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Mobile:</label>
					  <input type="text"  name="mob"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Email:</label>
					  <input type="text"  name="email"  class="form-control">
					</div>
					
					<div class="form-group">
					   <label for="sel1">Website:</label>
					  <input type="text"  name="web"  class="form-control">
					</div>
					
					
			        <input type="submit" class="form-control btn btn-primary" name="add_school" value="Update" >
					
										
			  </div>
		</div>
	</div>

  </div>
  </form>
</div>




<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
