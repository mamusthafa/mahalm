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
     <div class="panel-heading"><h4>Update Student Remarks</h4></div>
      <div class="panel-body">
		<?php
		
			if(isset($_GET["success"]))

				{
					?>

					<div class="alert alert-success">
  <strong>Success!</strong> Update Successful...
</div>

					
<?php
				}
		if(isset($_GET["failed"]))

				{

					$failed=$_GET["failed"];

					echo '<p style="text-align: center;"><span style="color: red; font-size: 16px; font-weight: bold; text-align: center;">Sorry. Something went wrong. try again.or contact your webmaster.</span><br></p>';

				}
				if((isset($_GET["first_name"]))&&(isset($_GET["roll_no"])))

				{
					$first_name=$_GET["first_name"];
					$roll_no=$_GET["roll_no"];
					$present_class=$_GET["class"];
					$section=$_GET["section"];
				
				}
				
				
				
				if(isset($_GET["id"])){
					$id=$_GET["id"];
				}
				
				$sql="select * from remarks where id='".$id."'";
				$result=mysqli_query($conn,$sql);
				//var_dump($sql);
				if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						$remark_title=$row["remarks_title"];
						$remark_desc=$row["remarks_desc"];
						$first_name=$row["first_name"];
						$roll_no=$row["roll_no"];
						$section=$row["section"];
					}
								
								?>
								
							
<form action="update_remarks.php" method="post">
 
	 
		
	 <div class="form-group">
	    <label for="usr">Title:</label>
		<input type="text" name="remark_title" value="<?php echo $remark_title; ?>"  class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">Details:</label>
		 <textarea class="form-control"  name="remark_desc"  rows="5"><?php echo $remark_desc; ?></textarea>
	  </div>
	  
	  
	   <input type="hidden" name="remark_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
	   <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" class="form-control">
	   <input type="hidden" name="roll_no" value="<?php echo $roll_no; ?>" class="form-control">
	   <input type="hidden" name="present_class" value="<?php echo $present_class; ?>" class="form-control">
	   <input type="hidden" name="section" value="<?php echo $section; ?>" class="form-control">
	   <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
		
	 
	<input type="submit" name="update_remarks" class="btn btn-primary" value="Update Remarks">
	</form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
    </div>
    </div>
    </div>
	
	
	

	<div class="col-sm-3" >
        
    </div>
    </div>
</div>



<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>