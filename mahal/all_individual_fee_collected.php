<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

	require("header.php");
	require("connection.php");
	error_reporting("0");
	$from=$_GET["from"];
	$to=$_GET["to"];
	
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
		
	 <div class="container-fluid" style="background-color:#eeeeee;padding:20px;">
	 <div class="row">
	 <div class="col-sm-12">
	 <form class="form-inline"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	  <div class="form-group">
			 
	 <select class="form-control" name="fee_name">
		<option value="">Select Fee Type</option>
		<option value="all">Select All Fee</option>
		<?php
		$sql_name="select distinct fee_name from individual_collected_fee where committee_year='".$cur_academic_year."'";
		$result_name=mysqli_query($conn,$sql_name);
		foreach($result_name as $value)
		{
		?>
	<option value='<?php echo $value["fee_name"];?>'><?php echo $value["fee_name"];?></option>
	<?php
	}
	echo '</select>';
	?></div>
	
	 <div class="form-group">
	 <label>From</label>
	   <input type="date" name="from" class="form-control">
	 </div>
	 
	<div class="form-group">
	 <label>To</label>
	   <input type="date" name="to" class="form-control">
	 </div>
	
	<input type="submit" class="btn btn-primary" name="filter" value="Filter">
	   <button type="button"  class="btn btn-success btn-md" onclick="printDiv('income')">Print</button> 
	 </form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>
	 </div>
	 </div>
	 </div>
	 
	 
	 
	 <div class="container" id="income">
	 <div class="row">
	 <div class="col-sm-12">
	 <center><h2 style="background-color:green;font-weight:bold;color:white;padding:10px;">All Individual Fee Collected</h2></center>
	 <div class="table-responsive">
	 <table class="table table-bordered">
		 <tr>
		<th>SL No</th>
		<th>First Name</th>
		<th>Member ID</th>
		<th>Fee Amount</th>
		<th>Receipt Date</th>
		<th>Receipt No</th>
		<th>Towards</th>
		
		</tr>
		<?php
if(isset($_GET["filter"]))
{
			$num_rec_per_page=100;
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $num_rec_per_page; 
			
			if((isset($_GET['fee_name']))&&!empty($_GET['from'])&&!empty($_GET['to']))
			{	
			$fee_name=$_GET["fee_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			if($fee_name=="all")
				{
				$sql="select * from individual_collected_fee where committee_year='".$cur_academic_year."'  and (rec_date BETWEEN '$from' and '$to')  ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
				}
				else
				{
				$sql="select * from individual_collected_fee where committee_year='".$cur_academic_year."' and fee_name='".$fee_name."' and (rec_date BETWEEN '$from' and '$to')  ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
				}
			}
			
			
			else if(isset($_GET['fee_name']))
			{
			$fee_name=$_GET['fee_name'];
				if($fee_name=="all")
				{
				$sql="select * from individual_collected_fee where committee_year='".$cur_academic_year."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
				}
				else
				{
				$sql="select * from individual_collected_fee where committee_year='".$cur_academic_year."' and fee_name='".$fee_name."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";
				}
				
			}
}
else
{
			$num_rec_per_page=100;
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $num_rec_per_page;
			$sql="select * from individual_collected_fee where committee_year='".$cur_academic_year."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
		
}
		
		
		
		$result=mysqli_query($conn,$sql);
		$row_count=1;
		foreach($result as $row){
			$id=$row["id"];
			$total_member_fee+=$row["fee_amount"];
			$rec_date= date('d-m-Y', strtotime( $row['rec_date'] ));
		?>
		
		
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["first_name"];?></td>
		<td><?php echo $row["member_id"];?></td>
		<td><?php echo $row["fee_amount"];?></td>
		<td><?php echo $rec_date;?></td>
		<td><?php echo $row["rec_no"];?></td>
		<td><?php echo $row["fee_name"];?></td>
		</tr>
				
		
		<?php
		$row_count++; 
		}
		echo "<h3 style='color:green;'>All Donation Details: ".$total_member_fee."</h3>";
		?>
	 </table>
	 </div>
	 </div>
	 <br>
	 
	 <?php
	
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='all_donation_new.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='all_donation_new.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_donation_new.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	?>
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
