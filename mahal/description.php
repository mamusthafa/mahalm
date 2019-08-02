<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
error_reporting("0");

//////////////////////////////////////Start of Searched variables /////////////////////////////////////////////////
if(isset($_GET["search_member"])){
	$searched=$_GET["typeahead_member"];
	
	$searched_array=explode(",",$searched);
	$first_name=$searched_array[0];
	$member_id=$searched_array[1];
	
	
}else{
////////////////////////////////////// End of Searched variables ///////////////////////////////////////////////////
$first_name=$_GET["first_name"];
$member_id=$_GET["member_id"];
}	


	$sql="select * from members where first_name='".$first_name."' and  member_id='".$member_id."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		
		$member_type=$row["member_type"];
		$joined_date=$row["join_date"];
		$merit_sts=$row["merit_sts"];
		$wife_name=$row["wife_name"];
		$children=$row["children"];
		
		$fee_blance=$row["tot_fee"]-$row["tot_paid"];
		
		
		$adm_fee_blance=$row["tot_admis_fee"]-$row["tot_admis_paid"];
		$cca_fee_blance=$row["tot_cca_fee"]-$row["tot_cca_paid"];
		
	
	
	?>
	<head>
		<script>
function goBack() {
    window.history.back();
}
</script>
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
	<br>
	
	 <center><div class="panel panel-primary" style="width:90%;">
      <div class="panel-heading"><center>Member Details , Name: <?php echo $row["first_name"];?> & Member ID : <?php echo $row["member_id"];?><a href="<?php echo 'edit_member.php?id='.$row['id']; ?>" title="Edit">  <span style="color:yellow;">  Edit info <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a></span></center>
	
	<div class="table-responsive"> 
	<table class="table ">
	<tr>
	<td><button onclick="goBack()" class="btn btn-default">Go Back</button> </td>
	
	<td><a href="<?php echo 'member_fee.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'].'&committee_year='.$row['committee_year'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Collect Member Fee</span></a></td>
	
	<td>  <a href="" onclick="printDiv('income')"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print</span></a> </td>
	
	<td><a href="<?php echo 'noc_certificate_details.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Issue Marriage NOC</span></a></td>
	
	<td><a href="<?php echo 'add_individual_fee.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'].'&member_type='.$row['member_type'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Add Individual Fee</span></a></td>
	
	</tr>
	<tr>
	<td><a href="<?php echo 'collect_addon_fee.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'].'&member_type='.$row['member_type'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Collect Addon Fee</span></a></td>
	
	<td><a href="<?php echo 'register_committee.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'].'&mobile='.$row['parent_contact'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Add to Committee</span></a></td>
	<td><?php if($merit_sts=="married"){
	?>
	<a href="<?php echo 'marriage_noc_details.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'];?>"><span style="color:#fff;"><i class="fa fa-money" aria-hidden="true"></i> Print Marriage Certificate</span></a>
	<?php
	}
	?></td>
	<td><a href="<?php echo 'collect_donation.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'];?>"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Collect Donation</span></a></td>
	<td></td>
	</tr>
	
	</table>
	  </div>
	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					
					<tbody>
					  <tr>
						<td style="width:15%;">Member Name<br>Member Type</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name']."<br>".strtoupper($member_type);?></td>
					</tr>
					<tr>
						<td style="width:15%;">Member ID</td>
						<td style="color:blue;width:25%;"><?php echo $row['member_id'];?></td>
					</tr>
					
					  <tr>
						<td style="width:15%;">Joined Date</td>
						<td style="color:blue;width:25%;"><?php echo $row['join_date'];?></td>
					</tr>
					<tr>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
					</tr>
					 <tr>
						<td style="width:15%;">Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['adhaar_no'];?></td>
					</tr>
					<tr>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $row['dob'];?></td>
					</tr>
					  
					
					<tr>
						<td style="width:15%;">Mobile</td>
						<td style="color:blue;width:25%;"><?php echo $row['parent_contact'];?></td>
					</tr>
					  
					  
					  
					  <tr>
						<td style="width:15%;">Fahter Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['father_name'];?></td>
					</tr>
					<tr>
						<td style="width:15%;">Mother Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['mother_name'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['address'];?></td>
						
					  </tr>
				
					
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
				   
      <!---------------------------------Start Attendance details------------------------------>
	<?php 
		}
	?>
	<div style="background-color:#f5f5f5;border:1px solid red;">
	<h3 style="background-color:red;font-weight:bold;color:white;padding:10px;">
	Fee Details</h3>
	
		<!-----------------Start of Individual Fee paid details------------------->
		<h3 style="font-weight:bold;color:red;">Member Fee Details</h3>
			
		   <?php 
		   
		   $sql_fee="select sum(fee_amount) as total_fee  from member_fee_type where committee_year='".$cur_committee_year."' and first_name = '".$first_name."' and member_id = '".$member_id."' ORDER BY id desc";
		   $result_fee=mysqli_query($conn,$sql_fee);
		   if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
			{
			$total_fee=$row_fee["total_fee"];
			}
			
		  $sql_all_fee="select *  from member_fee_type where committee_year='".$cur_committee_year."' and first_name = '".$first_name."' and member_id = '".$member_id."' ORDER BY id desc";
		  $result_all_fee=mysqli_query($conn,$sql_all_fee);
			?>
		   <div class="row">
           <div class="col-sm-12">
		   <center>
		   <span style="color:red;font-weight:bold;font-size:16px;">Total Member Fee : <?php echo $total_fee;?></span>,
		   </center>
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_all_fee))==0){
				echo "<tr>No Fee details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_all_fee))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Member Fee Name</th>
				<th>Fee Amount</th>
				<th>Note</th>
				<th>Updated Date</th>
				<th></th>
				</tr>
	<?php
	 $row_all_count_fee=1;
	
	foreach($result_all_fee as $row_all_fee)
	{
	$added_date= date('d-m-Y', strtotime( $row_all_fee['added_date'] ));
	$id = $row_all_fee["id"];
	?>
		<tr>
		<td style="text-align:center;"><?php echo $row_all_count_fee;?></td>
		<td style="text-align:center;"><?php echo $row_all_fee["member_fee_type_name"];?></td>
		
		<td style="text-align:center;"><?php echo $row_all_fee["fee_amount"];?></td>
		<td style="text-align:center;"><?php echo $row_all_fee["note"];?></td>
		<td style="text-align:center;"><?php echo $added_date;?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_member_fee.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteme(<?php echo $row_all_fee['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
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
				
	$row_all_count_fee++; 
	}
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
				</div>
		
	<br>
	<br>
	<div style="background-color:#f5f5f5;border:1px solid #65b126;">
	<h3 style="background-color:#65b126;font-weight:bold;color:white;padding:10px;">Fee Paid Details</h3>
	
	<h3 style="font-weight:bold;color:green;">Member Fee Paid</h3>
			
		   <?php 
		   
		   $sql_ind_fee="select sum(member_fee_amount) as total_fee_paid  from member_fee where name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		   $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
		   if($row_fee_tot_paid=mysqli_fetch_array($result_ind_fee,MYSQLI_ASSOC))
			{
				$total_fee_paid=$row_fee_tot_paid["total_fee_paid"];
			}
		
		  $sql_ind_fee="select id,member_fee_amount ,rec_no,rec_date,name,mobile,committee_year,member_id,member_fee_type,updated_date,month from member_fee where name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		  
		   //var_dump($sql_ind_fee);
		    $result_ind_fee=mysqli_query($conn,$sql_ind_fee);
			
									
			
			$sql_fee_tot="select sum(fee_amount) as total_fee_amount  from member_fee_type where member_type='".$member_type."'  and committee_year='".$cur_committee_year."' order by id desc";
			
			//var_dump($sql_fee_tot);
			$result_fee_tot=mysqli_query($conn,$sql_fee_tot);
			if($row_fee_tot=mysqli_fetch_array($result_fee_tot,MYSQLI_ASSOC))
			{
				$total_fee_amount=$row_fee_tot["total_fee_amount"];
			}
			$total_fee_members=$indi_total_fee+$total_fee;
			$balance=$total_fee_members-$total_fee_paid;
		
		   ?>
		   <div class="row">
           <div class="col-sm-12">
		   <center>
		   <span style="color:red;font-weight:bold;font-size:16px;">Total Member Fee : <?php echo $total_fee_members;?></span>, 
		   <span style="color:green;font-weight:bold;font-size:16px;">Total Member Fee paid : <?php echo $total_fee_paid;?></span>, 
		   <span style="color:blue;font-weight:bold;font-size:16px;">Balance : <?php echo $balance;?></span>
		   </center>
		
		  
			<div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_ind_fee))==0){
				echo "<tr>No Fee paid details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_ind_fee))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Member ID</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Amount</th>
				<th>Fee Type</th>
				<th>Month</th>
				<th>Action</th>
				
				
				<?php
				if(isset($_GET['delete']))
				{
				?>
				<th>Delete</th>
				<?php
				}
				?>
				
				</tr>
	<?php
	 $row_count_fee=1;
	
	foreach($result_ind_fee as $row_tot_ind_fee)
	{
	$total_fee_paid+=$row_tot_ind_fee["member_fee_amount"];
	$rec_date= date('d-m-Y', strtotime( $row_tot_ind_fee['rec_date'] ));
	$first_name=$row_tot_ind_fee["name"];
	$member_id=$row_tot_ind_fee["member_id"];
	?>
		<tr>
		<td style="text-align:center;"><?php echo $row_count_fee;?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["name"];?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["member_id"];?></td>
		<td style="text-align:center;"><?php echo $rec_date;?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["rec_no"];?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["member_fee_amount"];?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["member_fee_type"];?></td>
		<td style="text-align:center;"><?php echo $row_tot_ind_fee["month"];?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_accounts.php?id='.$row_tot_ind_fee['id'].'&first_name='.$first_name.'&member_id='.$member_id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deletefeepaid(<?php echo $row_tot_ind_fee['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>		
	<script>
		  function deletefeepaid(id){
			  if(confirm("Do you want to delete member fee paid?")){
				  window.location.href='delete_member_fee.php?id='+id+'';
			  }
		  }
		  
		  </script>
		
		</tr>
				
	<?php
				
	$row_count_fee++; 
	}
	}
	
	?>
	
	</tbody>
	</table>
	</center>
	</div>
	</div>
	</div>
	</div>
			<!-------------------End Fee paid details-------------------------->
		
	<br><br>	
	<div style="background-color:#f5f5f5;border:1px solid #65b126;">
	<h3 style="background-color:#65b126;font-weight:bold;color:white;padding:10px;">Addon Fee Paid Details</h3>
			
		   <?php 
		
		   
		  $sql_addon_paid="select * from addon_fee_received where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		  
		    $result_addon_paid=mysqli_query($conn,$sql_addon_paid);
			foreach($result_addon_paid as $row_addon_fee)
			{
				$total_other_fee_paid+=$row_addon_fee["addon_fee_received_amount"];
			}	
									
			
			
		   ?>
		   <div class="row">
           <div class="col-sm-12">
		   
			<div class="table-responsive">
			<h3 style="color:blue;">Total Addon Fee Paid: <?php echo $total_other_fee_paid;?></h3>		
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_addon_paid))==0){
				echo "<tr>No Addon Fee paid details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_addon_paid))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Fee Amount (INR)</th>
				<th>Fee Name</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Updated Date</th>
				<th>Action</th>
				
				</tr>
	<?php
	 $row_addon_paid=1;
	
	foreach($result_addon_paid as $row_addon_fee)
	{
	//$total_fee_paid+=$row_tot_ind_fee["member_fee_amount"];
	$first_name = $row_addon_fee["first_name"];
	$member_id = $row_addon_fee["member_id"];
	$rec_date= date('d-m-Y', strtotime( $row_addon_fee['rec_date'] ));
	$updated_addon_date= date('d-m-Y', strtotime( $row_addon_fee['updated_date'] ));
	?>
		<tr>
		<td style="text-align:center;"><?php echo $row_addon_paid;?></td>
		<td style="text-align:center;"><?php echo $row_addon_fee["addon_fee_received_amount"];?></td>
		<td style="text-align:center;"><?php echo $row_addon_fee["addon_fee_received_name"];?></td>
		<td style="text-align:center;"><?php echo $rec_date;?></td>
		<td style="text-align:center;"><?php echo $row_addon_fee["rec_no"];?></td>
		<td style="text-align:center;"><?php echo $updated_addon_date;?></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_other_fee_paid.php?id='.$row_addon_fee['id'].'&first_name='.$first_name.'&member_id='.$member_id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteotherfee(<?php echo $row_addon_fee['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>		
		<script>
		  function deleteotherfee(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_other_fee_paid.php?id='+id+'';
			  }
		  }
		  
		  </script>
		
		
		</tr>
				
	<?php
				
	$row_addon_paid++; 
	}
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				</div>
				</div>
				</div>
		<!--------------------------------End Fee paid details----------------------------------------------->
		<!--------------------------------End of Addon Fee paid details--------------------------------------->
		
		
		
		<br><br>
		<!--------------------------------Donation paid details--------------------------------------->
		<div style="background-color:#f5f5f5;border:1px solid #65b126;">
	<h3 style="background-color:#65b126;font-weight:bold;color:white;padding:10px;">Donation Paid Details</h3>
			
		   <?php 
		
		   
		  $sql_don="select * from donation where first_name='".$first_name."' and member_id='".$member_id."' and committee_year='".$cur_committee_year."' ORDER BY id desc";
		  
		    $result_don=mysqli_query($conn,$sql_don);
			foreach($result_don as $row_don)
	{
		$total_donation_amount+=$row_don["don_amount"];
	}						
			
			
		   ?>
		   <div class="row">
           <div class="col-sm-12">
		   
			<div class="table-responsive"> 
			<h3 style="color:blue;">Total Donation Paid: <?php echo $total_donation_amount;?></h3>
				<center><table class="table table-bordered">
				<tbody>
				<?php 
				if((mysqli_num_rows($result_don))==0){
				echo "<tr>No Donation paid details to display</tr>"; 
				}
				else if((mysqli_num_rows($result_don))>0)
				{
				
				?>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Donation Amount (INR)</th>
				<th>Donation Towards</th>
				<th>Receipt Date</th>
				<th>Receipt NO</th>
				<th>Updated Date</th>
				
				</tr>
	<?php
	 $row_don_paid=1;
	
	foreach($result_don as $row_don)
	{
		
	//$total_fee_paid+=$row_tot_ind_fee["member_fee_amount"];
	$rec_date= date('d-m-Y', strtotime( $row_don['rec_date'] ));
	$updated_don_date= date('d-m-Y', strtotime( $row_don['updated_date'] ));
	?>
		<tr>
		<td style="text-align:center;"><?php echo $row_don_paid;?></td>
		<td style="text-align:center;"><?php echo $row_don["don_amount"];?></td>
		<td style="text-align:center;"><?php echo $row_don["don_towards"];?></td>
		<td style="text-align:center;"><?php echo $rec_date;?></td>
		<td style="text-align:center;"><?php echo $row_don["rec_no"];?></td>
		<td style="text-align:center;"><?php echo $updated_don_date;?></td>
		
		
		</tr>
				
	<?php
				
	$row_don_paid++; 
	}
	}
	
	?>
	
				</tbody>
				</table>
				
				</center>
				
				</div>
				</div>
				</div>
				</div>
		<!--------------------------------End Fee paid details----------------------------------------------->
		<!--------------------------------End of Addon Fee paid details--------------------------------------->
		
		
		</div>
		</div>
		</center>

<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  	