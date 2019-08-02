<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	error_reporting("0");
	require("header.php");
	require("connection.php");
	if(isset($_GET["member_type"]))
	{
		$member_type=$_GET["member_type"];
		
	}
	if(isset($_GET["fee_name"]))
	{
		$fee_name=$_GET["fee_name"];
		
	}

	?>
	
<div class="container">
	<div class="row">
	<div class="col-sm-12"><br>
	
	<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
	<div class="form-group">
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
			echo '</select><br>';
			?>
	</div>
	<div class="form-group">
	<label for="usr"><span style="color:red;font-size:18px;">*</span>Select Fee Name:</label>
	<select class="form-control" name="fee_name">
	  <?php
	  $sql_name="select distinct fee_name from fee_name order by fee_name";
	  $result_name=mysqli_query($conn,$sql_name);
	  foreach($result_name as $row_name){
	  ?>
	  <option value="<?php echo $row_name["fee_name"]; ?>"><?php echo $row_name["fee_name"]; ?></option>
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
        
    </tr>
</thead>
<tbody>

<?php
	require("connection.php");
	$sql="select * from members where committee_year='".$cur_academic_year."' and member_type='".$member_type."'  ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_bulk_individual_fee.php?count='.$count;?>" method="post">
	<?php
	foreach($result as $row)
	{
	
	?>
	<tr>
	<td><?php echo $row_count;?></td>
	<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
	<input type="text" name="member_id[]" value="<?php echo $row["member_id"];?>" class="form-control" readonly>
	</td>
	
	
	</td>
	<td><input type="number" name="fee_amount[]" class="form-control"></td>
	<input type="hidden" name="member_type[]" value="<?php echo $member_type;?>">
	<input type="hidden" name="fee_name[]" value="<?php echo $fee_name;?>" >
	</tr>
		
	<?php 
	$row_count++; 
	}
	?>
	</table>
	<input type="submit" class="btn btn-primary" name="sub_att[]" value="Update Old/Addon Fee"><br><br><br>
</form>
</div>
</div>
</div>
</div>

<?php
require("footer.php");
?>
<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
	}
    else
	{

	header("Location:login.php");

	}

?>			
