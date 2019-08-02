<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");	
require("connection.php");	
?>
<head>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=16d7aa60d85914d3f362710f2d7b92a5'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
<span id="qpd_banner">Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>

</head>
<div class="container-fluid">
		<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>NOC Certificate Details</h4></div>
      <div class="panel-body">
		<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			  if(isset($_GET["first_name"])){
				  $first_name=$_GET["first_name"];
			  }
			  if(isset($_GET["member_id"])){
				  $member_id=$_GET["member_id"];
			  }
			 
			  ?>		
							
<form action="noc_certificate.php" method="post" enctype="multipart/form-data">
		<?php
		 if(isset($_GET["non_member"])){
	/////////////////////////////////// Start of Non Member ////////////////////////////////////////////
		?>
	<div class="form-group">
	   <label for="usr">ವರನ ಹೆಸರು</label>
		<input type="text" name="first_name" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ವಿಳಾಸ</label>
		<input type="text" name="member_id" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಂದೆಯ ಹೆಸರು</label>
		<input type="text" name="father_name" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಾಯಿಯ ಹೆಸರು</label>
		<input type="text" name="mother_name" class="form-control" >
	  </div>
		<input type="hidden" name="member_or_not" value="non_member">
		 <div class="form-group">
	   <label for="usr">ವರನ ಆಶಯ:</label>
		<input type="text" name="ashaya" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ಮದ್ಹಬ್:</label>
		<input type="text" name="madh" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ವರನ ಮಹಲ್ ಕಮಿಟಿಯ ಪೂರ್ಣ ವಿಳಾಸ</label>
		<textarea rows="5" class="form-control" name="mahal_address"></textarea>
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ನಡೆಸಲು ತೀರ್ಮಾನಿಸಿದ ದಿನಾಂಕ:</label>
		<input type="date" name="mar_date" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ವರನಿಗೆ ಮೊದಲು ಮದುವೆಯಾಗಿದೆಯೆ?</label>
		<input type="text" name="before_married" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆಯಾಗಿದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="mar_no" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಆ ಹೆಂಡತಿ ಇದ್ದಾರೆಯೆ?</label>
		<input type="text" name="wife_exist" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ಮಾಡಿಕೊಡುವುದರಲ್ಲಿ ಎನಾದರೂ ತೊಂದರೆ ಇದಯೇ?</label>
		<input type="text" name="any_problem" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮಕ್ಕಳಿದ್ದಾರೆಯೇ? ಇದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="children_how_many" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಬಿಟ್ಟು ಎಷ್ಟು ಕಾಲವಾಯಿತು?</label>
		<input type="text" name="divorce_since" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ವರನು ಹೊಸದಾಗಿ ಸೇರಿದವನೇ?</label>
		<input type="text" name="new_comer" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಸೇರಿದವನಾಗಿದ್ದರೆ ಸರ್ಟಿಫಿಕೇಟ್ ನಂ.</label>
		<input type="text" name="certi_no" class="form-control" >
	  </div>
	
	<input type="submit" class="btn btn-success" value="View NOC Certificate">
	</form><br>
		<?php
		
		/////////////////////////////// End of Non Member /////////////////////////////////////////////
		  }
		  if(!isset($_GET["non_member"])){
	/////////////////////////////////// Start of Member ////////////////////////////////////////////
		?>
		
         <div class="form-group">
	   <label for="usr">ವರನ ಆಶಯ:</label>
		<input type="text" name="ashaya" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ಮದ್ಹಬ್:</label>
		<input type="text" name="madh" class="form-control" >
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ನಡೆಸಲು ತೀರ್ಮಾನಿಸಿದ ದಿನಾಂಕ:</label>
		<input type="date" name="mar_date" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ವರನಿಗೆ ಮೊದಲು ಮದುವೆಯಾಗಿದೆಯೆ?</label>
		<input type="text" name="before_married" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆಯಾಗಿದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="mar_no" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಆ ಹೆಂಡತಿ ಇದ್ದಾರೆಯೆ?</label>
		<input type="text" name="wife_exist" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮದುವೆ ಮಾಡಿಕೊಡುವುದರಲ್ಲಿ ಎನಾದರೂ ತೊಂದರೆ ಇದಯೇ?</label>
		<input type="text" name="any_problem" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಮಕ್ಕಳಿದ್ದಾರೆಯೇ? ಇದ್ದರೆ ಎಷ್ಟು?</label>
		<input type="text" name="children_how_many" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಬಿಟ್ಟು ಎಷ್ಟು ಕಾಲವಾಯಿತು?</label>
		<input type="text" name="divorce_since" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ವರನು ಹೊಸದಾಗಿ ಸೇರಿದವನೇ?</label>
		<input type="text" name="new_comer" class="form-control" >
	  </div>
	 <div class="form-group">
	    <label for="usr">ಸೇರಿದವನಾಗಿದ್ದರೆ ಸರ್ಟಿಫಿಕೇಟ್ ನಂ.</label>
		<input type="text" name="certi_no" class="form-control" >
	  </div>
	 <input type="hidden" name="first_name" value="<?php echo $first_name;?>">
	 <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
	<input type="submit" class="btn btn-success" value="View NOC Certificate">
	</form><br>
	<?php
	}
	?>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
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
