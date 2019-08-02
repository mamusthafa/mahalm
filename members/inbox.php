<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))
{
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
			<div class="container-fluid">
                <div class="row">
                <div class="col-sm-3">
				</div> 
				<div class="col-sm-6">
				<h2>Reply Received</h2>
				<h2 style="color:#fff;">Notices</h2><hr>
		<?php
			$sql_adv="select * from reply_message where first_name='".$name."' and member_id='".$member_id."' order by id desc limit 25";
			$result_adv=mysqli_query($conn,$sql_adv);

			foreach($result_adv as $value_adv)
			{
			$date= date('d-m-Y', strtotime( $value_adv['date'] ));
			$reply_date= date('d-m-Y', strtotime( $value_adv['reply_date'] ));
				
			?>
			<span style="color:#eee;font-size:10px;">Sent on <?php  echo $date;?></span> <br><span style="color:#fff;font-size:15px;font-weight:bold;"><?php  echo $value_adv['advice_sub']."</span> : <span style='color:#fff;font-size:15px;'>".$value_adv['advice_desc'];?><br> 
			<?php
			if(($value_adv['reply_desc'])!="")
			{
			?>
			<span style="color:yellow;font-size:15px;font-weight:bold;">Reply : <?php  echo $value_adv['reply_title']." </span>: <span style='color:yellow;font-size:15px;'>".$value_adv['reply_desc'];?></span> <span style="color:#eee;font-size:10px;">Replied on <?php  echo $reply_date;?></span>
			<?php
			}
			echo '<hr>';
			}
			?>
				
				</div>
				<div class="col-sm-3">
				</div>
				</div>
				</div>


	<?php
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
