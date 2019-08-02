<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

?>
<div class="container-fluid">
<div class="row"><br>
    <div class="col-sm-12" style="padding-top:30px;">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	 
		<div class="form-group">
	   <?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select Member Type</option>';
		$sql="select distinct member_type from members where committee_year='".$cur_committee_year."'";
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
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>

	
       
       </div>
	</form>
	</div>
	</div><br>
<div class="row">
<div class="col-sm-12" style="padding-left:30px;padding-right:30px;">
<h3>Send Individual or group of Members sms</h3>
<div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        
        <th>SL.No & Select Member</th>
		
        <th>Member Name</th>
       
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if(isset($_GET["member_type"])){
		$member_type=$_GET["member_type"];
	}else{
		$member_type="Main Member";
	}
	
	$sql="select id,first_name,member_id from members where committee_year='".$cur_committee_year."' and member_type='".$member_type."' ORDER BY first_name";
	
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	?>
	
	<form action="send_individual_sms.php" method="post">
	
	
	<div class="form-group">
	  <label>Message</label>
		<input type="text" class="form-control" name="meeting_name" required>
	  </div>
	<br>
	<br>
	
	<?php
	$row_count = 1;
	foreach($result as $row)
	{
		
	?>
	
    <tr>
		<td><?php echo $row_count; ?>
		<input type="checkbox" class="form-control" name="checkbox[]" value="<?php echo $row["member_id"];?>">
		</td>
		
		<td>
		<div class="form-group">
		<input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly><br>
		<input type="text" name="member_id[]" value="<?php echo $row["member_id"];?>" class="form-control" readonly>
		</div>
		</td>
		</tr>
		
		<?php 
		$row_count++;
		 }
         ?>
		
		</table>
		
		<input type="submit" class="btn btn-primary" name="checked[]" value="Send SMS">
	</form>
</div>
</div>
</div>




<?php 
require("footer.php");
	}else{
		header("Location:login.php");
	}
	

?>