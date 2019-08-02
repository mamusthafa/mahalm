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
     <div class="panel-heading"><h4>Update / Edit Committee Member</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			  
			  $id=$_GET["id"];
			$sql="select * from committees where id='".$id."'";
			//var_dump($sql);
			$result=mysqli_query($conn,$sql);

			if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				
			  ?>		
				<p>First Name : <?php echo $row["first_name"];?>, Member ID : <?php echo $row["member_id"];?></p>			
<form action="update_committee_member.php" method="post" enctype="multipart/form-data">

     <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Committee Name:</label>
	<select class="form-control" name="committee_name">
	 <option value="<?php echo $row["committee_name"]; ?>"><?php echo $row["committee_name"]; ?>
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
	 
	 <input type="hidden" name="first_name" value="<?php echo $row['first_name'];?>"> 
	 <input type="hidden" name="member_id" value="<?php echo $row['member_id'];?>"> 
	 <input type="hidden" name="id" value="<?php echo $row['id'];?>"> 
	  
	 <div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Designation</label>
	<select class="form-control" name="designation" id="sel1">
	   <option value="<?php echo $row["designation"]; ?>"><?php echo $row["designation"]; ?>
	  <option value="president">President</option>
	  <option value="vise president">Vise President</option>
	  <option value="general secretary">General Secretary</option>
	  <option value="secretary">Secretary</option>
	  <option value="treasurer">Treasurer</option>
	  <option value="member">Member</option>
	   
		</select>
	  </div>
	  
	<input type="submit" name="committee_member" class="btn btn-success" value="Update Member">
	</form>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>




<?php
}
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  
