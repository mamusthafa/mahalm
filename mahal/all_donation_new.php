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

	 <div class="container" style="background-color:#eeeeee;padding:20px;">
	 <div class="row">
	 <div class="col-sm-12">
	 <form class="form-inline"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	  <div class="form-group">
			 
	 <select class="form-control" name="don_towards">
		<option value="">Select Fee Type</option>
		<option value="all">Select All Fee</option>
		<?php
		$sql_name="select distinct don_towards from donation where committee_year='".$cur_academic_year."'";
		$result_name=mysqli_query($conn,$sql_name);
		foreach($result_name as $value)
		{
		?>
	<option value='<?php echo $value["don_towards"];?>'><?php echo $value["don_towards"];?></option>
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
	 <center><h2>All Donation Details</h2></center>
	 <div class="table-responsive">
	 <table class="table table-bordered">
		 <tr>
		<th>SL No</th>
		<th>First Name</th>
		<th>Member ID</th>
		<th>Donation Amount</th>
		<th>Receipt Date</th>
		<th>Receipt No</th>
		<th>Towards</th>
		<th></th>
		</tr>
		<?php
if(isset($_GET["filter"]))
{
	$num_rec_per_page=100;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	if((isset($_GET['don_towards']))&&!empty($_GET['from'])&&!empty($_GET['to']))
	{	
	$don_towards=$_GET["don_towards"];
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	if($don_towards=="all")
		{
		$sql="select * from donation where committee_year='".$cur_academic_year."'  and (rec_date BETWEEN '$from' and '$to')  ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
		}
		else
		{
		$sql="select * from donation where committee_year='".$cur_academic_year."' and don_towards='".$don_towards."' and (rec_date BETWEEN '$from' and '$to')  ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
		}
	}
	
	
	else if(isset($_GET['don_towards']))
	{
	$don_towards=$_GET['don_towards'];
		if($don_towards=="all")
		{
		$sql="select * from donation where committee_year='".$cur_academic_year."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
		}
		else
		{
		$sql="select * from donation where committee_year='".$cur_academic_year."' and don_towards='".$don_towards."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";
		}
		
	}
}
else
{
			$num_rec_per_page=100;
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $num_rec_per_page;
			$sql="select * from donation where committee_year='".$cur_academic_year."' ORDER BY rec_date desc LIMIT $start_from, $num_rec_per_page";	
		
}
		
		
		
		$result=mysqli_query($conn,$sql);
		$row_count=1;
		foreach($result as $row){
			$id=$row["id"];
			$total_member_fee+=$row["don_amount"];
			$rec_date= date('d-m-Y', strtotime( $row['rec_date'] ));
		?>
		
		
		<tr>
		<td><?php echo $row_count;?></td>
		<td>
		<?php 
		if(($row["first_name"])!="")
		{ 
			echo $row["first_name"];
			$memb_type="member";
		}
		else
		{ 
			echo $row["non_name"];
			$memb_type="non_member";
		}
		?>
		</td>
		<td>
		<?php 
		if(($row["member_id"])!="")
		{ 
			echo $row["member_id"];
		}
		else
		{ 
			echo $row["non_location"];
		}
		?>
		
		</td>
		<td><?php echo $row["don_amount"];?></td>
		<td><?php echo $rec_date;?></td>
		<td><?php echo $row["rec_no"];?></td>
		<td><?php echo $row["don_towards"];?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_donation_new.php?id='.$id.'&memb_type='.$memb_type;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>
		</tr>
				
		<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_donation_new.php?id='+id+'';
			  }
		  }
		  
		  </script>
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
