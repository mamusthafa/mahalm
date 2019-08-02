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
	$sql_est="select sum(member_fee_amount) as tot_member_fee from member_fee where committee_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
	
	//$sql_fee_total="select sum(fee_amount) as fee_amount_total from member_fee_type where committee_year='".$cur_academic_year."' and (added_date BETWEEN '$from' and '$to')";
	
	$sql_fee_total="select sum(fee_amount) as fee_amount_total from member_fee_type where committee_year='".$cur_academic_year."'";
	
	$sql_adm="select sum(addon_fee_received_amount) as tot_addon_fee from addon_fee_received where committee_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
	
	
	$sql_tot="select sum(amount) as total_amount from income where committee_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
	
	$sql_exp="select sum(amount) as total_amount from expense where committee_year='".$cur_academic_year."' and (exp_date BETWEEN '$from' and '$to')";
	
	$sql_don="select sum(don_amount) as total_donations from donation where committee_year='".$cur_academic_year."' and (rec_date BETWEEN '$from' and '$to')";
	
	$sql_bank_dep = "select sum(amount) as sum_bank_deposit from bank_deposit where committee_year='".$cur_academic_year."' and (dep_date BETWEEN '$from' and '$to')";
	
	$sql_bank_withdraw = "select sum(amount) as sum_bank_withdraw from bank_withdraw where committee_year='".$cur_academic_year."' and (withdraw_date BETWEEN '$from' and '$to')";
	//var_dump($sql_don);
	}
	else
	{
	$sql_est="select sum(member_fee_amount) as tot_member_fee from member_fee where committee_year='".$cur_academic_year."'";
	
	$sql_fee_total="select sum(fee_amount) as fee_amount_total from member_fee_type where committee_year='".$cur_academic_year."'";
	
	$sql_adm="select sum(addon_fee_received_amount) as tot_addon_fee from addon_fee_received where committee_year='".$cur_academic_year."'";
	
	$sql_tot="select sum(amount) as total_amount from income where committee_year='".$cur_academic_year."'";
	
	$sql_exp="select sum(amount) as total_amount from expense where committee_year='".$cur_academic_year."'";
	
	$sql_don="select sum(don_amount) as total_donations from donation where committee_year='".$cur_academic_year."'";
	
	$sql_bank_dep = "select sum(amount) as sum_bank_deposit from bank_deposit where committee_year='".$cur_academic_year."'";
	
	$sql_bank_withdraw = "select sum(amount) as sum_bank_withdraw from bank_withdraw where committee_year='".$cur_academic_year."'";
	}
	
	///////////////// Start of donation section  //////////////////////////////////////
	
	///////////////////////////////////////////////////////////
	$result_bank_dep=mysqli_query($conn,$sql_bank_dep);
	if($row_bank_dep=mysqli_fetch_array($result_bank_dep,MYSQLI_ASSOC))
	{
		$total_bank_dep=$row_bank_dep["sum_bank_deposit"];
	}
	
	$result_bank_withdraw=mysqli_query($conn,$sql_bank_withdraw);
	if($row_bank_withdraw=mysqli_fetch_array($result_bank_withdraw,MYSQLI_ASSOC))
	{
		$total_bank_withdraw=$row_bank_withdraw["sum_bank_withdraw"];
	}
	$bank_balance = $total_bank_dep-$total_bank_withdraw;
	
	$result_est=mysqli_query($conn,$sql_est);
	if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
	{
		$total_member_fee=$row_est["tot_member_fee"];
	}

	$result_fee_total=mysqli_query($conn,$sql_fee_total);
	if($row_fee_total=mysqli_fetch_array($result_fee_total,MYSQLI_ASSOC))
	{
		$fee_amount_total=$row_fee_total["fee_amount_total"];
	}
	///////////////////////////////////////////////////////////////////////////////////
	$memb_fee_balance = $fee_amount_total - $total_member_fee;
	///////////////// Start of donation section  //////////////////////////////////////
	
		$result_don=mysqli_query($conn,$sql_don);
		if($row_don=mysqli_fetch_array($result_don,MYSQLI_ASSOC))
		{
			$total_donations=$row_don["total_donations"];
		}
		///////////////// End of donation section  //////////////////////////////////////
		

	$result_adm=mysqli_query($conn,$sql_adm);
	if($row_adm=mysqli_fetch_array($result_adm,MYSQLI_ASSOC))
	{
		$total_addon_fee=$row_adm["tot_addon_fee"];
	}
	//////////////////////////////////////////////////////////////////////////////
	
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
		<center><h2 style="font-weight:bold;color:green;text-transform: uppercase;text-decoration:underline;">Total Accounts Overview</h2></center>
		
		<div class="table-reponsive" id="income">
			<table class="table table-bordered">
				<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
					<th>CATEGORY</th>
					<th>AMOUNTS <?php echo $cur_academic_year;?></th>
				</tr>
				<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
					<td>Total Bank Deposit</td>
					<td><?php echo $total_bank_dep;?></td>
				</tr>
				<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
					<td>Total Bank Withdrawal</td>
					<td><?php echo $total_bank_withdraw;?></td>
				</tr>
				<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
					<td>Bank Balance</td>
					<td><?php echo $bank_balance;?></td>
				</tr>
				<tr style="background:red;color:white;font-weight:bold;padding:5px;">
					<td>Total Member Fee</td>
					<td><?php echo $fee_amount_total;?></td>
				</tr>
				<tr style="background:green;color:white;font-weight:bold;padding:5px;">
					<td>Member Fee Collected</td>
					<td><?php echo $total_member_fee;?></td>
				</tr>
				<tr style="background:red;color:white;font-weight:bold;padding:5px;">
					<td>Pending Member Fee</td>
					<td><?php echo $memb_fee_balance;?></td>
				</tr>
				<tr style="background:green;color:white;font-weight:bold;padding:5px;">
					<td>Addon Fee Collected</td>
					<td><?php echo $total_addon_fee;?></td>
				</tr>
				<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
					<td>Total Fee Collected</td>
					<td><?php echo $total_member_fee+$total_addon_fee;?></td>
				</tr>
				<tr style="background:green;color:white;font-weight:bold;padding:5px;">
					<td>Total Dontions Collected</td>
					<td><?php echo $total_donations;?></td>
				</tr>
				<tr style="background:green;color:white;font-weight:bold;padding:5px;">
					<td>Total Income</td>
					<td><?php echo $total_income;?></td>
				</tr>
				<tr style="background:yellow;color:black;font-weight:bold;padding:5px;">
					<td>Total Fee & Income Collected </td>
					<td><?php echo $total_income+$total_member_fee+$total_addon_fee+$total_donations;?></td>
				</tr>
				<tr style="background:red;color:white;font-weight:bold;padding:5px;">
					<td>Total Expense</td>
					<td><?php echo $total_expense;?></td>
				</tr>
				<tr style="background:blue;color:white;font-weight:bold;padding:5px;">
					<td>Balance</td>
					<td><?php echo ($total_income+$total_member_fee+$total_addon_fee+$total_donations)-$total_expense;?></td>
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
