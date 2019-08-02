<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

$row_count = 1;
?>
<div class="container"><br>
<div class="row">
<button onclick="goBack()" class="btn btn-primary">Go Back</button>
<button type="button"  class="btn btn-success btn-md" onclick="printDiv('pending_fee')">Print</button>

    <div class="col-sm-12" id="pending_fee">
	<h3>Pending Member Fee</h3>
	<table class="table table-bordered">
	<th>SL No</th>
	<th>Member Name</th>
	<th>Member ID</th>
	<th>Member Fee</th>
	<th>Member Fee Paid</th>
	<th>Balance</th>
	<th></th>
	 </tr> 
	<?php 
	
	$sql="select sum(fee_amount) as sum_fee_amount,first_name,member_id  from member_fee_type  group by member_id";
	$result=mysqli_query($conn,$sql);
	//var_dump($sql);
	foreach($result as $row)
	{
	$first_name = $row["first_name"];
	$member_id = $row["member_id"];
	
	$sql_amount="select sum(member_fee_amount) as sum_member_fee_amount,name,member_id  from member_fee where name='".$first_name."' and member_id='".$member_id."'";
	
	//var_dump($sql_amount);
	$result_amount=mysqli_query($conn,$sql_amount);
	foreach($result_amount as $row_amount)
	{
	$fee_paid=$row_amount["sum_member_fee_amount"];
	$fee=$row["sum_fee_amount"];
	$balance = $fee-$fee_paid;
	
	?>
	 <tr> 
	 <td><?php echo $row_count;?></td> 
	 <td><?php echo $first_name;?></td> 
	 <td><?php echo $member_id;?></td> 
	 <td><?php echo $fee;?></td> 
	 <td><?php echo $fee_paid;?></td> 
	 <td><?php echo $balance;?></td> 
	 <td><a href="<?php echo 'send_fee_reminder.php?balance='.$balance
	 .'&first_name='.$first_name.'&member_id='.$member_id;?>" class="btn btn-success btn-sm">Send Reminder SMS</a></td> 
	</tr> 
	 <?php 
	 $row_count++;
	}
	}
	?>
	</table>
	<button onclick="goBack()" class="btn btn-primary">Go Back</button>
	</div>

  </div>
 
</div>


<?php 
require("footer.php");
?>

<script>
function printDiv(pending_fee) {
     var printContents = document.getElementById('pending_fee').innerHTML;
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
