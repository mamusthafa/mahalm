<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
$today_md=date('m-d');

?>
 <head>
 <link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="typeahead.min.js"></script>
<style type="text/css">
	
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 1px solid #CCCCCC;
	
	font-size: 14px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 250px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 14px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}

</style>
</head>

<div id="page-wrapper">
<div class="container-fluid">
<br>

<div class="row">
    
  <div class="col-md-12">
			<?php
			   require("connection.php");
			   date_default_timezone_set('Asia/Kolkata');
				$today=date('Y-m-d');
				$today_md=date('m-d');
				
				$sql_student="select * from students where academic_year='".$cur_committee_year."'";
			  // var_dump($sql);
	           $result_student=mysqli_query($conn,$sql_student);
	           $total_students=mysqli_num_rows($result_student);
				
			   $sql="select * from members";
			  // var_dump($sql);
	           $result=mysqli_query($conn,$sql);
	           $total_members=mysqli_num_rows($result);
			   
			  
			   
			   $sql_certi="select * from request_study";
	           $result_certi=mysqli_query($conn,$sql_certi);
	           $total_certi=mysqli_num_rows($result_certi);
			   
			   
			   
			   $sql_mess="select * from contact_mahal";
	           $result_mess=mysqli_query($conn,$sql_mess);
	           $received_messages=mysqli_num_rows($result_mess);
			   
			   $sql_applic="select * from applications";
	           $result_applic=mysqli_query($conn,$sql_applic);
	           $received_applications=mysqli_num_rows($result_applic);
			   
			   
			   
			   $sql_fac="select * from faculty";
	           $result_fac=mysqli_query($conn,$sql_fac);
	           $total_fac=mysqli_num_rows($result_fac);
			   
			   
			   $sql_est="select sum(member_fee_amount) as tot_est_fee from member_fee";
				$result_est=mysqli_query($conn,$sql_est);
				if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
				{
					$tot_est_fee=$row_est["tot_est_fee"];
					//echo $tot_est_fee." Rupees";
				}
				
				
				$sql_addon_tot="select sum(addon_fee_received_amount) as total_addon_paid_fee from addon_fee_received";
				//var_dump($sql_addon_tot);
				$result_addon_tot=mysqli_query($conn,$sql_addon_tot);
				foreach($result_addon_tot as $row_addon_tot)
				{
				
				$total_addon_paid += $row_addon_tot["total_addon_paid_fee"];
				
				}
				
				
				///////////////// Start of donation section  //////////////////////////////////////
				$sql_don="select sum(don_amount) as total_donations from donation";
				$result_don=mysqli_query($conn,$sql_don);
				if($row_don=mysqli_fetch_array($result_don,MYSQLI_ASSOC))
				{
					$total_donations=$row_don["total_donations"];
				}
			///////////////// End of donation section  //////////////////////////////////////
				
				
			///////////// Start of individual fee collected section  ////////////////////////
			$sql_member_fee = "select sum(fee_amount) as total_fee_amount from member_fee_type";
			$result_member_fee=mysqli_query($conn,$sql_member_fee);
			if($row_member_fee=mysqli_fetch_array($result_member_fee,MYSQLI_ASSOC))
			{
				$total_fee_amount_all=$row_member_fee["total_fee_amount"];
				
			}
			///////////////// End of individual fee collected section  ///////////////////////
							
			///////////////// For Account Section Fee paid total  ////////////////////////////
			
			$sql_est="select sum(member_fee_amount) as tot_member_fee from member_fee";
			$result_est=mysqli_query($conn,$sql_est);
			if($row_est=mysqli_fetch_array($result_est,MYSQLI_ASSOC))
			{
				$total_member_fee=$row_est["tot_member_fee"];
			}
			///////////////////////////////////////////////////////////////////////////////////
			
			$pending_member_fee = $total_fee_amount_all-$total_member_fee;
			
			///////////////////////////////////////////////////////////////////////////////////
			$sql_adm="select sum(addon_fee_received_amount) as tot_addon_fee from addon_fee_received";
			$result_adm=mysqli_query($conn,$sql_adm);
			if($row_adm=mysqli_fetch_array($result_adm,MYSQLI_ASSOC))
			{
				$total_addon_fee=$row_adm["tot_addon_fee"];
			}
			//////////////////////////////////////////////////////////////////////////////
			
			
			
			/////////////////////////////////////Start of total income /////////////////////////
			$sql_tot="select sum(amount) as total_amount from income";
		    $result_tot=mysqli_query($conn,$sql_tot);
			if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
			{
			
			$total_income= $row_tot["total_amount"];
			}
			////////////////////////// End of total income /////////////////////////////////
			
			
			/////////////////////Start of total Expense /////////////////////////////
			$sql_exp="select sum(amount) as total_amount from expense";
		    $result_exp=mysqli_query($conn,$sql_exp);
			if($row_exp=mysqli_fetch_array($result_exp,MYSQLI_ASSOC))
			{
			$total_expense= $row_exp["total_amount"];
			}
			
			$balance_account = ($total_income+$total_member_fee+$total_addon_fee+$total_donations+$total_ind_fee_amount)-$total_expense;
			
			//////////////////// End of total Expense //////////////////
			
			/////// End of Account Section ////////////////////////////

			
			/////////////////Start of Today fee collected section //////
				
			ob_start();
			date_default_timezone_set("Asia/Kolkata");
			$today_date=date("Y-m-d");
			error_reporting("0");
			$sql_student_fee="select sum(member_fee_amount) as sum_student_fee  from member_fee where rec_date='".$today_date."'"; 
			$result_student_fee=mysqli_query($conn,$sql_student_fee);
			//var_dump($sql_student_fee);

			if($row_student_fee=mysqli_fetch_array($result_student_fee,MYSQLI_ASSOC))
			{
				if(mysqli_num_rows($result_student_fee)>0)
				{
				$student_fee=$row_student_fee["sum_student_fee"];	
				}
			}

		$sql_addon_todays_fee="select sum(addon_fee_received_amount) as addon_todays_fee from addon_fee_received where rec_date='".$today_date."'"; 
			$result_todays_addon=mysqli_query($conn,$sql_addon_todays_fee);
			//var_dump($sql_todays_fee_collected);
			if($row_addon_todays=mysqli_fetch_array($result_todays_addon,MYSQLI_ASSOC))
			{
				if(mysqli_num_rows($result_todays_addon)>0)
				{
				$todays_addon_fee=$row_addon_todays["addon_todays_fee"];	
				}
			}
			
			$sql_todays_fee_collected="select sum(member_fee_amount) as todays_fee_collected from member_fee where rec_date='".$today_date."'"; 
			$result_todays_fee_col=mysqli_query($conn,$sql_todays_fee_collected);
			//var_dump($sql_todays_fee_collected);
			if($row_todays_fee_col=mysqli_fetch_array($result_todays_fee_col,MYSQLI_ASSOC))
			{
				if(mysqli_num_rows($result_todays_fee_col)>0)
				{
				$todays_fee_collected=$row_todays_fee_col["todays_fee_collected"];	
				}
			}
			$todays_fee_all = $todays_addon_fee+$todays_fee_collected;
			$tot_admission_fee=$student_fee+$student_van_fee; 
			
			///////////////////End of Today fee collected section ////////////			
			?>

	<!------------------Start of Search Form--------------------------->
<div class="row">
	<div class="col-lg-6 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="glyphicon glyphicon-search"></i>
					</div>
					<div class="col-xs-9 text-right">
					</div>
				</div>
			</div>
			
		<div class="panel-footer">
		<form action="description.php" id="search_member"  method="get">

		<div class="form-group">
		<input type="text" name="typeahead_member" class="form-control typeahead_memb "  autocomplete="off" spellcheck="false" placeholder="Search Member">
		</div>
		<button type="submit" name="search_member" class="btn btn-sm btn-primary">Get Details</button>
		</form>
		</div>
	  </div>
	</div>
	<!------------------End of Search Form--------------------------->
	
	
	
	<!------------------Start of Total Members--------------------------->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Total Members</div>
						<div class="huge"><?php echo $total_members;?></div>
					   
					</div>
				</div>
			</div>
			<a href="all_members.php">
				<div class="panel-footer">
					<span class="pull-left"><a href="all_members.php">View Details</a></span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!------------------End of Total Members--------------------------->
	
	
					
	<!------------------Start of Send Bulk SMS--------------------------->				
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Send Bulk SMS</div>
					</div>
				</div>
			</div>
			<a href="send_noti.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!------------------End of Send Bulk SMS--------------------------->
</div>
	<!----------///////////////////////////////////////////////////////////----------->
	      
<!-- /.row -->
<div class="row">

<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					   
						<i class="fa fa-calculator fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Accounts Balance</div>
					 <div style="font-size:26px;"><?php echo $balance_account;?></div>     
					   
					</div>
				</div>
			</div>
			<a href="all_accounts_overview.php">
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
		 <div class="panel panel-blue">
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
			<a href="total_fee.php">
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
						<div>Total Fee Collected</div>
						<div style="font-size:26px;"><?php echo $tot_est_fee;?></div>   
					</div>
				</div>
			</div>
		
			<a href="accounts.php">
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
		<div class="panel panel-pink">
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
			<a href="all_pending_fee.php">
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
<!----------///////////////////////////////////////////////////////////----------->
<div class="row">
<!------------------Start of Fee Collected Today--------------------------->
 <div class="col-lg-3 col-md-6">
		 <div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-money fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Fee Collected Today</div>
						<div style="font-size:26px;"><?php echo $todays_fee_all;?></div>
					</div>
				</div>
			</div>
			<a href="<?php echo 'accounts.php?today=today_fee';?>">
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
				   
						<i class="fa fa-building-o fa-5x" ></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Addon / Other Fee Collected</div>
					  <div style="font-size:26px;"><?php echo $total_addon_paid;?></div>   
					
					</div>
				</div>
			</div>
			<a href="addon_fee_accounts.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
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
					 <div>All Donations</div>
						<div style="font-size:26px;"><?php echo $total_donations;?></div>
					</div>
				</div>
			</div>
			<a href="<?php echo 'all_donation_new.php?today=today_fee';?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
	<!------------------Start of Accounts Balance--------------------------->
<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-user-circle-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Total Staffs</div>
						<div class="huge"><?php echo $total_fac;?></div>
					</div>
				</div>
			</div>
			<a href="teach_staff.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!------------------End of Accounts Balance--------------------------->
	
	
	
	<!------------------End of Total Member Fee Collected--------------------------->
</div>
<!----------///////////////////////////////////////////////////////////----------->
				

				
<div class="row">
<!------------------Start of Certificate Request--------------------------->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="glyphicon glyphicon-certificate fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Certificate Request</div>
						<div class="huge"><?php echo $total_certi;?></div>
					</div>
				</div>
			</div>
			<a href="req_certificates.php">
				<div class="panel-footer">
					<span class="pull-left"><a href="req_certificates.php">View Details</a></span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!------------------End of Certificate Request--------------------------->	




<!------------------Start of Print/Store Documents--------------------------->	
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-print fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>Print/Store Documents</div>
					   </div>
				</div>
			</div>
			<a href="documents.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!------------------End of Print/Store Documents--------------------------->



<!------------------Start of Received Messages--------------------------->			
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Received Messages</div>
						<div class="huge"><?php echo $received_messages;?></div>
					</div>
				</div>
			</div>
			<a href="received_messages.php">
				<div class="panel-footer">
					<span class="pull-left"><a href="received_messages.php">View Details</a></span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!------------------End of Received Messages--------------------------->		



<!------------------Start of Received Applications--------------------------->	
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
					<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Received Applications</div>
						<div class="huge"><?php echo $received_applications;?></div>
					</div>
				</div>
			</div>
			<a href="received_applications.php">
				<div class="panel-footer">
					<span class="pull-left"><a href="received_applications.php">View Details</a></span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!------------------End of Received Applications--------------------------->	
</div>

 <!------------------ //////////////////////////////////////// ------------------->
 
 
 
 
<!------------------Start of Latest Upcoming Events--------------------------->	
<div class="row">
<div class="col-sm-6">
	<div class="panel panel-blue">
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
	$evt_date= date('d-m-Y', strtotime( $row['evt_date'] ));
	?>
     <tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		
		<td><?php echo $evt_date;?></td>
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
		<div class="col-sm-6">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
				   <i class="fa fa-building-o fa-5x" ></i>
					</div>
					<div class="col-xs-9 text-right">
					 <div>Inventory Details</div>
					</div>
				</div>
			</div>
			<a href="all_inventory.php">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
</div>
</div>
</div>
</div>

</div>
</div>
<?php
require("footer.php");
	}else{
		header("Location:login.php");
	}

?>