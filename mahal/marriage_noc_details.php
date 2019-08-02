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
     <div class="panel-heading"><h4>Marriage Certificate Details</h4></div>
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
							
<form action="insert_marriage_certificate.php" method="post" enctype="multipart/form-data">
		<?php
		 if(isset($_GET["non_member"])){
	/////////////////////////////////// Start of Non Member ////////////////////////////////////////////
		?>
	<div class="form-group">
	   <label for="usr">ವರನ ಹೆಸರು</label>
		<input type="text" name="first_name" class="form-control">
	  </div>
	  
	 <div class="form-group"> 
	 <label for="usr">ವರನ ಜನ್ಮ ದಿನಾಂಕ</label>
		<input type="date" name="dob" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವರನ ವಿಳಾಸ</label>
		<input type="text" name="address" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಂದೆಯ ಹೆಸರು</label>
		<input type="text" name="father_name" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	   <label for="usr">ವಧುವಿನ ಹೆಸರು</label>
		<input type="text" name="wife_first_name" class="form-control">
	  </div>
	  
	 <div class="form-group">
	   <label for="usr">ವಧುವಿನ ಜನ್ಮ ದಿನಾಂಕ</label>
		<input type="date" name="wife_dob" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವಧುವಿನ ವಿಳಾಸ</label>
		<input type="text" name="wife_address" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಂದೆಯ ಹೆಸರು</label>
		<input type="text" name="wife_father_name" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಮದುವೆ ರಿಜಿಸ್ಟೆರ್ ನಂ.</label>
		<input type="text" name="mar_reg_no" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಪ್ರಮಾಣ ಪತ್ರದ ನಂ</label>
		<input type="text" name="certificate_no" class="form-control" >
	  </div>
	  
	  
	  <input type="hidden" name="member_or_not" value="non_member">
		
	 <div class="form-group">
	    <label for="usr">ನಿಖಾಹ್  ದಿನಾಂಕ</label>
		<input type="date" name="nikah_date" class="form-control" >
	  </div>
	  
	<div class="form-group">
	    <label for="usr">ನಿಖಾಹ್ ನಡೆದ ಸ್ಥಳ</label>
		<input type="text" name="nikah_place" class="form-control" >
	  </div>
	  
	<div class="form-group">
	    <label for="usr">ಖಾಸಿ</label>
		<input type="text" name="khazi" class="form-control" >
	  </div>
	  
	<div class="form-group">
	    <label for="usr">ವಲಿಯ್ಯ್</label>
		<input type="text" name="valiyy" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಮದುವೆ ರಿಜಿಸ್ಟೆರ್ ನಂ.</label>
		<input type="text" name="mar_reg_no" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಪ್ರಮಾಣ ಪತ್ರದ ನಂ</label>
		<input type="text" name="certificate_no" class="form-control" >
	  </div>
	  
	 <input type="hidden" name="member_id" value="non_member"> 
	
	<input type="submit" class="btn btn-success" value="View Marriage Certificate">
	</form><br>
		<?php
		
		/////////////////////////////// End of Non Member /////////////////////////////////////////////
		  }
		  if(!isset($_GET["non_member"])){
	/////////////////////////////////// Start of Member ////////////////////////////////////////////
		?>
		
         
	 <div class="form-group">
	   <label for="usr">ವಧುವಿನ ಹೆಸರು</label>
		<input type="text" name="wife_first_name" class="form-control">
	  </div>
	  
	 <div class="form-group">
	   <label for="usr">ವಧುವಿನ ಜನ್ಮ ದಿನಾಂಕ</label>
		<input type="date" name="wife_dob" class="form-control">
	  </div>
	 
	  <div class="form-group">
	    <label for="usr">ವಧುವಿನ ವಿಳಾಸ</label>
		<input type="text" name="wife_address" class="form-control" >
	  </div>
	  
		<div class="form-group">
	    <label for="usr">ತಂದೆಯ ಹೆಸರು</label>
		<input type="text" name="wife_father_name" class="form-control" >
	  </div>
	  
	 	
	 <div class="form-group">
	    <label for="usr">ನಿಖಾಹ್  ದಿನಾಂಕ</label>
		<input type="date" name="nikah_date" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ನಿಖಾಹ್ ನಡೆದ ಸ್ಥಳ</label>
		<input type="text" name="nikah_place" class="form-control" >
	  </div>
	  
	<div class="form-group">
	    <label for="usr">ಖಾಸಿ</label>
		<input type="text" name="khazi" class="form-control" >
	  </div>
	  
	<div class="form-group">
	    <label for="usr">ವಲಿಯ್ಯ್</label>
		<input type="text" name="valiyy" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಮದುವೆ ರಿಜಿಸ್ಟೆರ್ ನಂ.</label>
		<input type="text" name="mar_reg_no" class="form-control" >
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">ಪ್ರಮಾಣ ಪತ್ರದ ನಂ</label>
		<input type="text" name="certificate_no" class="form-control" >
	  </div>
	  
	  
	  
	 <input type="hidden" name="first_name" value="<?php echo $first_name;?>">
	 <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
	<input type="submit" class="btn btn-success" value="View Marriage Certificate">
	</form><br>
	<?php
	}
	?>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>
    </div>
    </div>
    </div>

	<div class="col-sm-3" >
        
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
