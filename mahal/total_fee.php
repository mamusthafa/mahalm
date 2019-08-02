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

</head>

	 <div class="container" style="background-color:#eeeeee;padding:20px;">
	 <div class="row">
	 <div class="col-sm-12">
	 <form class="form-inline"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	 <div class="form-group">
	<select class="form-control" name="member_fee_type_name">
		<option value="">Select Fee Type</option>
		<option value="all">Select All Fee</option>
		<?php
		$sql_name="select distinct member_fee_type_name from member_fee_type where committee_year='".$cur_academic_year."'";
		$result_name=mysqli_query($conn,$sql_name);
		foreach($result_name as $value)
		{
		?>
	<option value='<?php echo $value["member_fee_type_name"];?>'><?php echo $value["member_fee_type_name"];?></option>
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
	 <a href="delete_fee.php" class="btn btn-danger">Delete Fee</a>
	 </div>
	 </div>
	 </div>
	 
	 
	 
	 <div class="container" id="income">
	 <div class="row">
	 <div class="col-sm-12">
	 <center><h2>Fee Details</h2></center>
	 <table class="table table-bordered">
		 <tr>
		<th>SL No</th>
		<th>First Name</th>
		<th>Member ID</th>
		<th>Fee Amount</th>
		<th>Fee Type</th>
		<th>Applied Date</th>
		<th></th>
		</tr>
		<?php
if(isset($_GET["filter"]))
{
			$num_rec_per_page=1000;
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $num_rec_per_page; 
			
			if((isset($_GET['member_fee_type_name']))&&!empty($_GET['from'])&&!empty($_GET['to']))
			{	
			$member_fee_type_name=$_GET["member_fee_type_name"];
			$from=$_GET["from"];
			$to=$_GET["to"];
			
			if($member_fee_type_name=="all")
				{
				$sql="select * from member_fee_type where committee_year='".$cur_academic_year."'  and (added_date BETWEEN '$from' and '$to')  ORDER BY added_date desc LIMIT $start_from, $num_rec_per_page";
				//var_dump($sql);
				}
				else
				{
				$sql="select * from member_fee_type where committee_year='".$cur_academic_year."' and member_fee_type_name='".$member_fee_type_name."' and (added_date BETWEEN '$from' and '$to')  ORDER BY added_date desc LIMIT $start_from, $num_rec_per_page";	
				}
			}
			
			
			else if(isset($_GET['member_fee_type_name']))
			{
			$member_fee_type_name=$_GET['member_fee_type_name'];
				if($member_fee_type_name=="all")
				{
				$sql="select * from member_fee_type where committee_year='".$cur_academic_year."' ORDER BY added_date desc LIMIT $start_from, $num_rec_per_page";	
				}
				else
				{
				$sql="select * from member_fee_type where committee_year='".$cur_academic_year."' and member_fee_type_name='".$member_fee_type_name."' ORDER BY added_date desc LIMIT $start_from, $num_rec_per_page";
				}
				
			}
		}
		else
		{
			$num_rec_per_page=1000;
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
			$start_from = ($page-1) * $num_rec_per_page;
			$sql="select * from member_fee_type where committee_year='".$cur_academic_year."' ORDER BY added_date desc LIMIT $start_from, $num_rec_per_page";	
				
		}
		$result=mysqli_query($conn,$sql);
		$row_count=1;
		foreach($result as $row){
			$id=$row["id"];
			$total_member_fee+=$row["fee_amount"];
			$added_date= date('d-m-Y', strtotime( $row['added_date'] ));
		?>
		
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["first_name"];?></td>
		<td><?php echo $row["member_id"];?></td>
		<td><?php echo $row["fee_amount"];?></td>
		<td><?php echo $row["member_fee_type_name"];?></td>
		<td><?php echo $added_date;?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_member_fee.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>
		</tr>
				
		<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_fee_memb.php?id='+id+'';
			  }
		  }
		  
		  </script>
		
		<?php
		$row_count++; 
		}
		echo "<h3 style='color:green;'>Total Fee Details: ".$total_member_fee."</h3>";
		?>
	 </table>
	 </div>
	 <br>
	 
	 <?php
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='total_fee.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='total_fee.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='total_fee.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	?>
	</div>
	</div>
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
require("footer.php");
}
else
{
header("Location:login.php");
}
?>  
