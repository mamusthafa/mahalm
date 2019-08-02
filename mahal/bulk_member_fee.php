<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	
	?>
	<head>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
			<div class="container">
                <div class="row">
                <div class="col-sm-12"><br>
				
				<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
					<div class="form-group">
					<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Member Type:</label>
					<select class="form-control" name="member_type">
					 <option value="">Select Member Type</option>
					  <?php
					  $sql="select distinct member_type from members order by member_type";
					  $result=mysqli_query($conn,$sql);
					  foreach($result as $row){
					  ?>
					  <option value="<?php echo $row["member_type"]; ?>"><?php echo $row["member_type"]; ?></option>
					   <?php
					  }
					   ?>
						</select>
					  </div>
					  <div class="form-group">
					<select class="form-control" name="member_fee_type">
					  <?php
					  $sql="select distinct fee_name from fee_name order by fee_name";
					  $result=mysqli_query($conn,$sql);
					  foreach($result as $row){
					  ?>
					  <option value="<?php echo $row["fee_name"]; ?>"><?php echo $row["fee_name"]; ?></option>
					   <?php
					  }
					   ?>
						</select>
					  </div>
					<input type="submit" class="btn btn-primary w3-card-4" name="filter" value="Get List">
					 
					</form>
					</div>
					</div>
					
					<div class="row">
					 <div class="col-sm-12">
					 <div class="table-responsive">


<br>
<table id="example" class="table table-bordered" />
<thead>
    <tr>
        <th>SL No</th>
        <th width="15%">Member Name</th>
        <th>Fee Amount</th>
        <th>Receipt Date</th>
        <th>Receipt No</th>
        <th>Select Month</th>
		
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	if(isset($_GET["member_type"]))
	{
		$member_type=$_GET["member_type"];
		
		
	}
	if(isset($_GET["member_fee_type"]))
	{
		$member_fee_type=$_GET["member_fee_type"];
		echo "<h2>Member Type: ".$member_type." and Fee Name: ".$member_fee_type."</h2>";
	}
	

	$sql="select * from members where committee_year='".$cur_academic_year."' and member_type='".$member_type."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_bulk_member_fee.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
		
	?>
	
    <tr>
		
		<td><?php echo $row_count;?></td>
		<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		<input type="text" name="member_id[]" value="<?php echo $row["member_id"];?>" class="form-control" readonly>
		</td>
	
		<td><input type="number" name="member_fee_amount[]" class="form-control"></td>
		<td><input type="date" name="rec_date[]" class="form-control"></td>
		<td><input type="text" name="rec_no[]" class="form-control"></td>
		<td>
		<div class="form-group">
		  <select class="form-control" name="month[]">
			<option value="">Select Month</option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		 </select>
		</div>
		</td>
		
		<input type="hidden" name="member_fee_type" value="<?php echo $member_fee_type;?>">
		<input type="hidden" name="member_type[]" value="<?php echo $member_type;?>">
		<input type="hidden" name="parent_contact[]" value="<?php echo $row["parent_contact"];?>">
		</tr>
		
		<?php 
		$row_count++; 
	}
		
	?>
		</table>
		<input type="submit" class="btn btn-primary" name="sub_att[]" value="Collect Fee">
	</form>
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
