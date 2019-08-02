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
	
	 <div class="container"><br>
	 <div class="row"  style="background-color:#eeeeee;padding:20px;">
	 <div class="col-sm-12">
	 <form class="form-inline"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	  <div class="form-group">
			 
	 <select class="form-control" name="bank_name">
		<option value="">Select Bank Name</option>
		<option value="all">Select All</option>
		<?php
		$sql_name="select distinct bank_name from bank_det";
		$result_name=mysqli_query($conn,$sql_name);
		foreach($result_name as $value)
		{
		?>
	<option value='<?php echo $value["bank_name"];?>'><?php echo $value["bank_name"];?></option>
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
	 <a href="add_bank_withdraw.php" class="btn btn-success">+ Add Withdraw</a>
	 </div>
	 </div>
	 </div>
	 
	 
	 
	 <div class="container" id="income">
	 <div class="row">
	 <div class="col-sm-12">
	 <center><h2>All Bank Withdrawal Details</h2></center>
	 <div class="table-responsive">
	 <table class="table table-bordered">
		 <tr>
		<th>SL No</th>
		<th>Bank Name</th>
		<th>Amount</th>
		<th>Towards</th>
		<th>Withdrawal Date</th>
		<th>Added at</th>
		<th></th>
		</tr>
		<?php
if(isset($_GET["filter"]))
{
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	if((isset($_GET['bank_name']))&&!empty($_GET['from'])&&!empty($_GET['to']))
	{	
	$bank_name=$_GET["bank_name"];
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	if($bank_name=="all")
		{
		$sql="select * from bank_withdraw where committee_year='".$cur_academic_year."'  and (withdraw_date BETWEEN '$from' and '$to')  ORDER BY withdraw_date desc LIMIT $start_from, $num_rec_per_page";	
		}
		else
		{
		$sql="select * from bank_withdraw where committee_year='".$cur_academic_year."' and bank_name='".$bank_name."' and (withdraw_date BETWEEN '$from' and '$to')  ORDER BY withdraw_date desc LIMIT $start_from, $num_rec_per_page";
		
		}
	}
	else if(isset($_GET['bank_name']))
	{
	$bank_name=$_GET['bank_name'];
		if($bank_name=="all")
		{
		$sql="select * from bank_withdraw where committee_year='".$cur_academic_year."' ORDER BY withdraw_date desc LIMIT $start_from, $num_rec_per_page";
		
		}
		else
		{
		$sql="select * from bank_withdraw where committee_year='".$cur_academic_year."' and bank_name='".$bank_name."' ORDER BY withdraw_date desc LIMIT $start_from, $num_rec_per_page";
		}
		
	}
}
else
{
		$num_rec_per_page=500;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $num_rec_per_page; 
		$sql="select * from bank_withdraw where committee_year='".$cur_academic_year."' ORDER BY withdraw_date desc LIMIT $start_from, $num_rec_per_page";		
		
}
		$result=mysqli_query($conn,$sql);
		$row_count=1;
		foreach($result as $row){
			$id=$row["id"];
			$total_bank_withdraw+=$row["amount"];
			$withdraw_date= date('d-m-Y', strtotime( $row['withdraw_date'] ));
		?>
		
		
		<tr>
		<td><?php echo $row_count;?></td>
		<td><?php echo $row["bank_name"];?></td>
		<td><?php echo $row["amount"];?></td>
		<td><?php echo $row["towards"];?></td>
		<td><?php echo $withdraw_date;?></td>
		<td><?php echo $row["added_at"];?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_bank_withdraw.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deletebankwithdraw(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>
		</tr>
				
		<script>
		  function deletebankwithdraw(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_bank_withdraw.php?id='+id+'';
			  }
		  }
		  
		  </script>
		<?php
		$row_count++; 
		}
		echo "<h3 style='color:green;'>All Bank Withdrawal Details: ".$total_bank_withdraw."</h3>";
		?>
	 </table>
	 </div>
	 </div>
	 <br>
	 
	 <?php
	
	$total_records = mysqli_num_rows($result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='all_bank_deposit.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='all_bank_deposit.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='all_bank_deposit.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
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
