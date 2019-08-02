<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");	
?>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Register Committee Member</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			  
			  $first_name=$_GET["first_name"];
			$member_id=$_GET["member_id"];
			$mobile=$_GET["mobile"];
			  ?>		
							
<form action="insert_committee_member.php" method="post" enctype="multipart/form-data">

     <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Committee Name:</label>
	<select class="form-control" name="committee_name">
	  <?php
	  $sql_name="select distinct committee_name from committee_name order by committee_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["committee_name"]; ?>"><?php echo $row_name["committee_name"]; ?></option>
	   <?php
	  }
	   ?>
		</select>
	  </div>
	 
	 <input type="hidden" name="first_name" value="<?php echo $first_name;?>"> 
	 <input type="hidden" name="member_id" value="<?php echo $member_id;?>"> 
	 <input type="hidden" name="mobile" value="<?php echo $mobile;?>"> 
	  
	 <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Designation</label>
	<select class="form-control" name="designation" id="sel1">
	  
	  <option value="president">President</option>
	  <option value="vise president">Vise President</option>
	  <option value="general secretary">General Secretary</option>
	  <option value="secretary">Secretary</option>
	  <option value="treasurer">Treasurer</option>
	  <option value="member">Member</option>
	   
		</select>
	  </div>
	  
	<input type="submit" name="committee_member" class="btn btn-success" value="Register">
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
