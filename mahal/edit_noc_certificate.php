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
$sql="select * from noc_certificate where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
?>

       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Member Fee</h4></div>
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
	
	<form action="update_noc_certificate.php" method="post">
      <div class="form-group">
	   <label for="usr">ವರನ ಹೆಸರು</label>
		<input type="text" name="first_name" value="<?php  echo $value['first_name'];?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ವಿಳಾಸ</label>
		<input type="text" name="member_id" value="<?php  echo $value['member_id'];?>" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಂದೆಯ ಹೆಸರು</label>
		<input type="text" name="father_name" value="<?php  echo $value['father_name'];?>" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಾಯಿಯ ಹೆಸರು</label>
		<input type="text" name="mother_name" value="<?php  echo $value['mother_name'];?>" class="form-control" >
	  </div>
		<input type="hidden" name="member_or_not"  value="non_member">
		<input type="hidden" name="id" value="<?php  echo $value['id'];?>">
		<input type="hidden" name="memb_id" value="<?php  echo $value['memb_id'];?>">
		 <div class="form-group">
	   <label for="usr">ವರನ ಆಶಯ:</label>
		<input type="text" name="ashaya" value="<?php  echo $value['ashaya'];?>" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ಮದ್ಹಬ್:</label>
		<input type="text" name="madh" value="<?php  echo $value['madh'];?>" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ವರನ ಮಹಲ್ ಕಮಿಟಿಯ ಪೂರ್ಣ ವಿಳಾಸ</label>
		<textarea rows="5" class="form-control"  name="mahal_address"><?php  echo $value['mahal_address'];?></textarea>
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ನಡೆಸಲು ತೀರ್ಮಾನಿಸಿದ ದಿನಾಂಕ:</label>
		<input type="date" name="mar_date" value="<?php  echo $value['mar_date'];?>" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ವರನಿಗೆ ಮೊದಲು ಮದುವೆಯಾಗಿದೆಯೆ?</label>
		<input type="text" name="before_married" value="<?php  echo $value['before_married'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆಯಾಗಿದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="mar_no" value="<?php  echo $value['mar_no'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಆ ಹೆಂಡತಿ ಇದ್ದಾರೆಯೆ?</label>
		<input type="text" name="wife_exist" value="<?php  echo $value['wife_exist'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ಮಾಡಿಕೊಡುವುದರಲ್ಲಿ ಎನಾದರೂ ತೊಂದರೆ ಇದಯೇ?</label>
		<input type="text" name="any_problem" value="<?php  echo $value['any_problem'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮಕ್ಕಳಿದ್ದಾರೆಯೇ? ಇದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="children_how_many" value="<?php  echo $value['children_how_many'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಬಿಟ್ಟು ಎಷ್ಟು ಕಾಲವಾಯಿತು?</label>
		<input type="text" name="divorce_since" value="<?php  echo $value['divorce_since'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ವರನು ಹೊಸದಾಗಿ ಸೇರಿದವನೇ?</label>
		<input type="text" name="new_comer" value="<?php  echo $value['new_comer'];?>" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಸೇರಿದವನಾಗಿದ್ದರೆ ಸರ್ಟಿಫಿಕೇಟ್ ನಂ.</label>
		<input type="text" name="certi_no" value="<?php  echo $value['certi_no'];?>" class="form-control" >
	  </div>
	
	<input type="submit" class="btn btn-success" value="Update NOC Certificate">
	</form><br>
	
	 <button class="btn btn-primary" onclick="goBack()">Go Back</button>
	</div>
		</div>
		</div>
	<div class="col-sm-3"><br>
	</div>
    </div>
    </div>
	</div>
</div>
<?php 

	}
require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>