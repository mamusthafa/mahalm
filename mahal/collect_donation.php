<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	$first_name=$_GET["first_name"];
	$member_id=$_GET["member_id"];
	$id=$_GET["id"];
?>

<div class="container-fluid">
<div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-6"><br><br>
	<div class="panel panel-green">
     <div class="panel-heading"><h4>Collect Donation</h4></div>
      <div class="panel-body">

	<form action="insert_don.php" method="post">
	
	<p style="font-weight:bold;color:blue;font-size:18px;">Member Name:<?php echo $first_name; ?> and  Member ID:<?php echo $member_id; ?></p>
	
	<input type="hidden" name="first_name" value="<?php echo $first_name;?>">
	<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
	
	<div class="form-group">
	<label>Donation Towards</label>
	<input type="text" name="don_towards" placeholder="Enter Donation Name Here" class="form-control">
	</div>	
	
	<div class="form-group">
	<label for="usr">Fee Amount:</label>
	<input type="text" name="don_amount"  class="form-control" >
	</div>
	
	<div class="form-group">
	<label for="usr">Receipt Date:</label>
	<input type="date" name="rec_date"  class="form-control" >
	</div>
	
	<div class="form-group">
	<label for="usr">Receipt No:</label>
	<input type="text" name="rec_no"  class="form-control" >
	</div>
	
<input type="submit" class="btn btn-primary" name="donation" value="Collect Donation">
</form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
</div>
<div class="col-md-3"></div>
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
