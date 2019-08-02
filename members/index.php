<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))

{
error_reporting("0");
$first_name=$_SESSION['parents_uname'];
$member_id=$_SESSION['parents_pass'];
require("header.php");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');


$sql_mess="select * from contact_mahal where first_name='".$first_name."' and member_id='".$member_id."'";
$result_mess=mysqli_query($conn,$sql_mess);
$contact_messages=mysqli_num_rows($result_mess);

$sql_applic="select * from applications where  first_name='".$first_name."' and member_id='".$member_id."'";
$result_applic=mysqli_query($conn,$sql_applic);
$applications=mysqli_num_rows($result_applic);

				$sql_est="select sum(member_fee_amount) as tot_est_fee from member_fee where name='".$first_name."' and member_id='".$member_id."'";
				$result_est=mysqli_query($conn,$sql_est);
				if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
				{
					$tot_est_fee=$row_est["tot_est_fee"];
					//echo $tot_est_fee." Rupees";
				}
				
				
				$sql_addon_tot="select sum(addon_fee_received_amount) as total_addon_paid_fee from addon_fee_received where first_name='".$first_name."' and member_id='".$member_id."'";
				//var_dump($sql_addon_tot);
				$result_addon_tot=mysqli_query($conn,$sql_addon_tot);
				foreach($result_addon_tot as $row_addon_tot)
				{
				
				$total_addon_paid += $row_addon_tot["total_addon_paid_fee"];
				
				}
				
				
				///////////////// Start of donation section  //////////////////////////////////////
				$sql_don="select sum(don_amount) as total_donations from donation where first_name='".$first_name."' and member_id='".$member_id."'";
				$result_don=mysqli_query($conn,$sql_don);
				if($row_don=mysqli_fetch_array($result_don,MYSQLI_ASSOC))
				{
					$total_donations=$row_don["total_donations"];
				}
			///////////////// End of donation section  //////////////////////////////////////
				
				
			///////////// Start of individual fee collected section  ////////////////////////
			$sql_member_fee = "select sum(fee_amount) as total_fee_amount from member_fee_type where first_name='".$first_name."' and member_id='".$member_id."'";
			$result_member_fee=mysqli_query($conn,$sql_member_fee);
			if($row_member_fee=mysqli_fetch_array($result_member_fee,MYSQLI_ASSOC))
			{
				$total_fee_amount_all=$row_member_fee["total_fee_amount"];
				
			}
			///////////////// End of individual fee collected section  ///////////////////////
							
			///////////////// For Account Section Fee paid total  ////////////////////////////
			
			$sql_est="select sum(member_fee_amount) as tot_member_fee from member_fee where name='".$first_name."' and member_id='".$member_id."'";
			$result_est=mysqli_query($conn,$sql_est);
			if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
			{
				$total_member_fee=$row_est["tot_member_fee"];
			}
			///////////////////////////////////////////////////////////////////////////////////
			
			$pending_member_fee = $total_fee_amount_all-$total_member_fee;
			
			///////////////////////////////////////////////////////////////////////////////////
			$sql_adm="select sum(addon_fee_received_amount) as tot_addon_fee from addon_fee_received where first_name='".$first_name."' and member_id='".$member_id."'";
			$result_adm=mysqli_query($conn,$sql_adm);
			if($row_adm=mysqli_fetch_array($result_adm,MYSQLI_ASSOC))
			{
				$total_addon_fee=$row_adm["tot_addon_fee"];
			}
			//////////////////////////////////////////////////////////////////////////////
			



?>
<br>
<div class="container-fluid">
<?php
		
	$sql_marq="select * from events where evt_date > now()  ORDER BY id DESC LIMIT 5";	
	$result_marq=mysqli_query($conn,$sql_marq);
	$row_count =1;
	$total_events=mysqli_num_rows($result_marq);
	$rowcount_evt=mysqli_num_rows($result_marq);
	if($rowcount_evt>=1)
	{
	?>
	<div class="row">
	<div class="col-lg-12 col-md-12">
	<div class="panel panel-primary" style="background:red;">
	<div class="panel-heading">
	<marquee>
	<?php
	$row_noti = 1;
    foreach($result_marq as $row)
	{
	$time = $row["evt_time"];
	$time_new = date('h:i:s a', strtotime($time));
	$evt_date= date('d-m-Y', strtotime( $row['evt_date'] ));
	?>				      
	<?php echo $row_noti.". ".$row["evt_name"].", Date: ".$evt_date.", Time: ".$time_new.", Location: ".$row["evt_venue"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";?> 
	<?php
	$row_noti++;
	}
	}
	?>
	</marquee>
	</div>
	</div>
	</div>
	</div>

<div class="row">

<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary" style="background:red;">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-bar-chart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>Member Profile</div>
					   </div>
				</div>
			</div>
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

<!------------------Start of Fee Collected Today--------------------------->
 <div class="col-lg-3 col-md-6">
		 <div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Total Fee</div>
						<div style="font-size:26px;"><?php echo $total_fee_amount_all;?></div>
					</div>
				</div>
			</div>
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!------------------End of Fee Collected Today--------------------------->


<!------------------Start of Addon / Other Fee Collected----------------->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>Total Fee Paid</div>
						<div style="font-size:26px;"><?php echo $tot_est_fee;?></div>   
					</div>
				</div>
			</div>
		
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!-----------------End of Addon / Other Fee Collected-------------------->




<!------------------Start of Accounts Balance--------------------------->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					   
						<i class="fa fa-calculator fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Pending Fee</div>
					 <div style="font-size:26px;"><?php echo $pending_member_fee;?></div>     
					   
					</div>
				</div>
			</div>
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!------------------End of Accounts Balance--------------------------->

</div>
				
				
<div class="row">

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>SMS Notifications</div>
						
					   
					</div>
				</div>
			</div>
			<a href="mes_report.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-print fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>Send Aplications</div>
						<div class="huge"><?php echo $applications;?></div>
					   </div>
				</div>
			</div>
			<a href="send_application.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
  
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Contact Mahal</div>
					<div class="huge"><?php echo $contact_messages;?></div>    
					   
					</div>
				</div>
			</div>
			<a href="cont_mahal.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
				   
						<i class="fa fa-building-o fa-5x" ></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Addon / Other Fee Paid</div>
					  <div style="font-size:26px;"><?php echo $total_addon_paid;?></div>   
					
					</div>
				</div>
			</div>
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- /.row -->
				
				
<!-- row -->
<div class="row">

<!------------------Start of Addon / Other Fee Collected----------------->
	
<!-----------------End of Addon / Other Fee Collected-------------------->

	<!------------------Start of Total Member Fee Collected--------------->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Donations Paid</div>
						<div style="font-size:26px;"><?php echo $total_donations;?></div>
					</div>
				</div>
			</div>
			<a href="description.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
				
<div class="col-sm-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
		   <h4>Latest Upcoming Events</h4>
		</div>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th>SL No</th>
		<th>Event Name</th>
		<th>Date</th>
		<th>Time</th>
		<th>Venue</th>
		</tr>
	<?php
			
	$sql="select * from events where evt_date > now()  ORDER BY id DESC LIMIT 5";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
	 $rowcount_evt=mysqli_num_rows($result);
	 if($rowcount_evt>=1)
	 {
    
	foreach($result as $row)
	{
	$time = $row["evt_time"];
	$time_new = date('h:i:s a', strtotime($time));
	?>
     <tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $time_new;?></td>
		<td><?php echo $row["evt_venue"];?></td>
		
		
		</tr>
		
		<?php $row_count++; 
	}
	}else{
			echo "<tr><td colspan='4'><p style='color:red;'>There are no Events to display</p></td></tr>";
		}
	?>
	</table>
	</div>
</div>
</div>
</div>
<!-- /.row -->
</div>

<?php
}
else
{
	header("Location:login.php");
}
	

?>