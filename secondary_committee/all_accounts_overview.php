<?php
session_start();
if(isset($_SESSION['second_uname'])&&!empty($_SESSION['second_pass'])&&!empty($_SESSION['academic_year']))
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

 <div class="container"><br><br>
	 <div class="row">
	 <div class="col-sm-12 inline">
	 <form class="form-inline"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

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

	<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
<?php

	if((isset($_GET["from"]))&&(isset($_GET["to"])))
	{
	$sql_tot="select sum(amount) as total_amount from sec_income where committee_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
	
	$sql_exp="select sum(amount) as total_amount from sec_expense where committee_year='".$cur_academic_year."' and (exp_date BETWEEN '$from' and '$to')";
	}
	else
	{
	$sql_tot="select sum(amount) as total_amount from sec_income where committee_year='".$cur_academic_year."'";
	
	$sql_exp="select sum(amount) as total_amount from sec_expense where committee_year='".$cur_academic_year."'";
	}
	
	
	/////////////////////////////////////Start of total income /////////////////////////
	
	
   
	//var_dump($sql_amount);
	$result_tot=mysqli_query($conn,$sql_tot);
	if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	{
	
	$total_income= $row_tot["total_amount"];
	}
	////////////////////////// End of total income /////////////////////////////////
	/////////////////////Start of total Expense /////////////////////////////
	
	
   //var_dump($sql_exp);
	$result_exp=mysqli_query($conn,$sql_exp);
	if($row_exp=mysqli_fetch_array($result_exp,MYSQLI_ASSOC))
	{
	
	$total_expense= $row_exp["total_amount"];
	}
	
	$balance = ($total_income+$total_member_fee+$total_addon_fee+$total_donations)-$total_expense;
	
	/////////////////////////////////////End of total Expense ////////////////////////////////////////////
	?>			
					
	<div class="row">
		<div class="col-sm-12">
		<center><h2 style="font-weight:bold;color:green;text-transform: uppercase;text-decoration:underline;">Swalath Committee Accounts Overview</h2></center><br>
		
		<div class="table-reponsive" id="income">
			<table class="table table-bordered">
				<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
					<th>CATEGORY</th>
					<th>AMOUNTS <?php echo $cur_academic_year;?></th>
				</tr>
				
				<tr style="background:green;color:white;font-weight:bold;padding:5px;">
					<td>Total Income</td>
					<td><?php echo $total_income;?></td>
				</tr>
				
				<tr style="background:red;color:white;font-weight:bold;padding:5px;">
					<td>Total Expense</td>
					<td><?php echo $total_expense;?></td>
				</tr>
				<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
					<td>Balance</td>
					<td><?php echo ($total_income-$total_expense);?></td>
				</tr>
				
			</table>				
		</div>
		 <br><br>
		</div>
		
	</div>
		
	</div> 
	<div class="col-md-2">
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
