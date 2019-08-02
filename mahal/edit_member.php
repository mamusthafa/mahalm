<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

if(isset($_GET["id"])){
		$id=$_GET["id"];
		}
	$sql="select * from members where id ='".$id."'";
	$result=mysqli_query($conn,$sql);
	if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
		
		$first_name=$value["first_name"];
		$member_id=$value["member_id"];
		
		
		}
?>
<div class="container-fluid"><br>
<div class="row">
<div class="col-sm-3">
	
    </div>
 <form action="update_member.php" method="post" enctype="multipart/form-data" role="form">
    <div class="col-sm-6">
	  
		<div class="panel panel-primary">
		
			  <div class="panel-body">
			  <h3>Edit Member</h3>
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
					  <input type="text" placeholder="Member Name" name="first_name" value="<?php echo $value['first_name'];?>" required class="form-control" id="usr">
					</div>
					
					<div class="form-group">
					   <label for="sel1"><span style="color:red;font-size:18px;">*</span>Member ID:</label>
					  <input type="text" placeholder="Member ID" value="<?php echo $value['member_id'];?>" name="member_id" required class="form-control" id="usr">
					</div>
					
					
					<div class="form-group">
					<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
					<select class="form-control" name="member_type" id="sel1">
					<option value="<?php echo $value["member_type"]; ?>"><?php echo $value["member_type"]; ?></option>
					  <?php
					  $sql="select distinct member_type_name from member_type order by member_type_name";
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
					  <input type="text" placeholder="Contact No" value="<?php echo $value["parent_contact"]; ?>" name="parent_contact"  class="form-control" id="usr">
					</div> 
					<input type="hidden" name="id" value="<?php echo $value["id"]; ?>" >
					
					<Input type="submit" class="btn btn-primary" name="edit_member" value="Update" >
					</form><br><br>
					<a href="all_members.php" class="btn btn-success">Go Back</a>
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
