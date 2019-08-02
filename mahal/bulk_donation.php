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
    </tr>
</thead>
<tbody>

<?php
	
	$sql="select * from members where committee_year='".$cur_academic_year."' ORDER BY first_name";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	
	$total_students=mysqli_num_rows($result);
    $row_count =1;
	?>
	
	<form action="<?php echo 'insert_bulk_donation.php?count='.$count;?>" method="post">
	<div class="form-group">
	<label>Donation Towards</label>
	<input type="text" name="don_towards" placeholder="Enter Donation Name Here" class="form-control">
	</div>
	<?php
	foreach($result as $row)
	{
	?>
	
    <tr>
		<td><?php echo $row_count;?></td>
		<td width="15%"><input type="text" name="first_name[]" value="<?php echo $row["first_name"];?>" class="form-control" readonly>
		<input type="text" name="member_id[]" value="<?php echo $row["member_id"];?>" class="form-control" readonly></td>
		<td><input type="number" name="don_amount[]" class="form-control"></td>
		<td><input type="date" name="rec_date[]" class="form-control"></td>
		<td><input type="text" name="rec_no[]" class="form-control"></td>
		<input type="hidden" name="mobile[]" value="<?php echo $row["parent_contact"];?>">
		<input type="hidden" name="id[]" value="<?php echo $row["id"];?>">
		</tr>
				
		<?php 
		$row_count++; 
		}
		?>
		</table>
		<input type="submit" class="btn btn-primary"  value="Collect Donation">
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
