<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

?>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=421aa90e079fa326b6494f812ad13e79'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
<span id="qpd_banner">Kannada Typing On This Site Is Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>
<div class="container">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	<?php 
	if(isset($_GET["success"])){
	?>
	<div class="alert alert-success">
    <strong>Success!</strong> Message sent successfully.
     </div>
	<?php
	}
	?>
	
	
	
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<label>Select SMS Type</label>
		  <select class="form-control" name="meeting_type">
			<option value="">---------</option>
			<option value="Send SMS English">Member Type wise SMS</option>
			<option value="Send SMS">ಕನ್ನಡ ಮೆಸ್ಸೇಜ್</option>
			<option value="Individual SMS">Send Individual Member SMS</option>
			<option value="all">All Members SMS (Requires speed internet connection)</option>
			<option value="staff sms">Staff SMS</option>
			<option value="admin sms">Committee SMS</option>
			<option value="user_cred">Member Username & Passwords</option>
			
		  </select>
		</div>
		
	<button type="submit" name="filt_submit" class="btn btn-primary">Get Details</button>
	
	
       
       </div>
	</form>
	
</div><hr>

<div class="row"><br>
<div class="col-sm-3">


</div>
<div class="col-sm-6">

<?php
$meeting_type=$_GET["meeting_type"];

if(isset($_GET["filt_submit"])){
	
if($meeting_type=="Send SMS"){
?>
<form action="own_sms.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Type and send Kannada sms</div>
      <div class="panel-body">
	 
		<div class="form-group">
	    <label>Select Member Type</label>
		<?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select member_type</option>';
		$sql="select distinct member_type from members where committee_year='".$cur_academic_year."'";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["member_type"];?>'><?php echo $value["member_type"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	
	  
	  
	  <div class="form-group">
	  <label>Description</label>
		<textarea rows="5" class="form-control"  id="qpd_script" name="desc_sms" required></textarea>
	  </div>
	  
	  
	  
	  <input type="submit" class="btn btn-primary" name="own_sms" value="Send SMS">
</form>


<?php	
 }
 else if($meeting_type=="Send SMS English")
 {

?>
<form action="own_sms_english.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Member Type wise SMS</div>
      <div class="panel-body">
	  
	 
	  <div class="form-group">
	    <label>Select Member Type</label>
		<?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select Member Type</option>';
		$sql="select distinct member_type from members where committee_year='".$cur_academic_year."'";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["member_type"];?>'><?php echo $value["member_type"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	  
	
	  <div class="form-group">
	  <label>Description</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  
	  
	  
	  <input type="submit" class="btn btn-primary" name="sms_english" value="Send SMS">
</form>


<?php	
 }
else if($meeting_type=="fee_reminder")
 {

?>
<form action="fee_reminder.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Send Fee Remind SMS</div>
      <div class="panel-body">
	  
	 
	  <div class="form-group">
	    <label>Select Member Type</label>
		<?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select Member Type</option>';
		$sql="select distinct member_type from members where committee_year='".$cur_academic_year."'";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["member_type"];?>'><?php echo $value["member_type"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	  
	  
	  <input type="submit" class="btn btn-primary" name="fee_remind" value="Send Fee Remind SMS">
</form>


<?php	
 }
 else if($meeting_type=="Individual SMS")
 {
?>
<a href="individual_sms.php"><button type="button" class="btn btn-primary" value="Get Details">Continue</button></a>


<?php	
 }
 else if($meeting_type=="staff sms")
	{
     ?>
	 <h4>Staff SMS</h4>
	 <form action="staff_sms.php" method="post">
	 <div class="form-group">
	  <label>Message</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="staff_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="all")
	{
     ?>
	 <h4>All members SMS</h4>
	 <form action="all_student_sms.php" method="post">
	 <div class="form-group">
	  <label>Message </label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="all_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="admin sms")
	{
	 ?>
	  <h4>Committee SMS</h4>
	  <form action="admin_sms.php" method="post">
	  
	  <div class="form-group">
	    <label>Select Committee</label>
		<?php echo '<select class="form-control" name="committee_name">';
		echo '<option value="">Select Committee</option>';
		$sql="select distinct committee_name from committee_name";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["committee_name"];?>'><?php echo $value["committee_name"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	  
	  
	 <div class="form-group">
	  <label>Message</label>
		<textarea rows="5" class="form-control"  name="message_detail" required></textarea>
	  </div>
	  <button type="submit" name="admin_sms" class="btn btn-primary">Send SMS</button>
	  </form>
	 <?php
	}
	else if($meeting_type=="user_cred"){
		?>
		<form action="user_cred.php" method="post">

	  <div class="panel panel-primary">
      <div class="panel-heading">Members Username & Passwords</div>
      <div class="panel-body">
	 
	  <div class="form-group">
	    <label>Select Members Type</label>
		<?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select Member Type</option>';
		$sql="select distinct member_type from members where committee_year='".$cur_academic_year."'";
        $result=mysqli_query($conn,$sql);
         foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["member_type"];?>'><?php echo $value["member_type"];?></option>
		<?php
		}
		echo '</select>';
        ?>
		</div>
	  
	
	  
	  
	  <input type="submit" class="btn btn-primary" name="user_cred" value="Send SMS">
</form>


		<?php
	}
 }
?>	
</div>
</div>
<div class="col-sm-3"></div>
</div>
</div>
</div>
</div><br>
</div>
</div>
</div>
</div>
</div>
</div>


<?php 
require("footer.php");	
	}else{
		header("Location:login.php");
	}
	

?>