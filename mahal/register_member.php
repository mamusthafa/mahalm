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
<div class="col-sm-3">
	
    </div>
 <form action="insert_member.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
<div class="panel panel-primary">

	  <div class="panel-body">
	  <h3>Member Registration Form</h3>
	   <?php
	  if(isset($_GET["success"])){
		  ?>
		  <div class="alert alert-success">
		<strong>Success</strong> Updated successfully.
	</div>
		  <?php
	  }
	  ?>

			<div class="form-group">
			   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Member Name:</label>
			  <input type="text" placeholder="Member Name" name="first_name" required class="form-control" id="usr">
			</div>
			
			<div class="form-group">
			   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Member ID:</label>
			  <input type="text" placeholder="Member ID" name="member_id" class="form-control" id="usr">
			</div>
			
			
			<div class="form-group">
			<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
			<select class="form-control" name="member_type" id="sel1">
			  <?php
			  $sql="select distinct member_type_name from member_type order by member_type_name desc";
			  $result=mysqli_query($conn,$sql);
			  foreach($result as $row){
			  ?>
			  <option value="<?php echo $row["member_type_name"]; ?>"><?php echo $row["member_type_name"]; ?></option>
			   <?php
			  }
			   ?>
				</select>
			  </div>
			
			<div class="form-group">
				<label><span style="color:red;font-size:18px;">*</span>Mobile</label>
			  <input type="text" placeholder="Contact No" name="parent_contact"  class="form-control" id="usr">
			</div> 
			

			<Input type="submit" class="btn btn-primary" name="register" value="Register" >
			</form>
	</div>
</div>
</div>
    <div class="col-sm-3">
	
    </div>
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
