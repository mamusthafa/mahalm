<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
$today_date= date("d/m/Y");

?>
<div id="page-wrapper">
<div class="container-fluid">
  
  
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>Upcoming Events</h2></center>
	<div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	    <td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Events Name</span></td>
		<td><span style="font-weight: bold;">Events Details</span></td>
	    <td><span style="font-weight: bold;">Events Date</span></td>
		<td><span style="font-weight: bold;">Events Time</span></td>
		<td><span style="font-weight: bold;">Events Venue</span></td>
		<td><span style="font-weight: bold;">Contact No</span></td>
		<td></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=20;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	
	$sql="select * from events where evt_date >= now() ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		$id=$row["id"];
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		<td><?php echo $row["evt_details"];?></td>
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $row["evt_time"];?></td>
		<td><?php echo $row["evt_venue"];?></td>
		<td><?php echo $row["evt_mob"];?></td>
		
	   	<td><div class="btn-group">
		<a href="<?php echo 'evt_description.php?id='.$id;?>">  <i class="fa fa-eye-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="<?php echo 'edit_events.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteeve(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>
		</tr>
				
		<script>
		  function deleteeve(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='del_confirm_evt.php?id='+id+'';
			  }
		  }
		  
		  </script>
	   
		<?php $row_count++; 
		
	//}
	}
		
	$sql="select * from events";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Events = ".$total_events.'</p>';
	
		
		?>
		
		</table>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>


<?php require("footer.php"); } else { header("Location:login.php");} ?>  
