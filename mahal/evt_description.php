<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
?>

        <div id="page-wrapper">
<br>
            <div class="container-fluid">
            <div class="row">
            <div class="col-sm-12">
			 <table class="table table-bordered">
		<tr>
		<td>SL No</td>
		<td>Event Name</td>
		<td>Event Details</td>
		<td>Event Date</td>
		<td>Event Time</td>
		<td>Event Venue</td>
		<td>Event Mobile</td>
		<td></td>
		</tr>
			<?php
			$today_date = strtotime(date("d-m-Y"));
			
	$sql="select * from events  where evt_date>='".$today_date."' ORDER BY id DESC";	
	
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_events=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
		$evt_date = strtotime($row['evt_date']);
		
			
		
	?>
       
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'evt_description.php?id='.$row['id'];?>" ><?php echo $row["evt_name"];?></a></td>
		<td><?php echo $row["evt_details"];?></td>
		<td><?php echo $row["evt_date"];?></td>
		<td><?php echo $row["evt_time"];?></td>
		<td><?php echo $row["evt_venue"];?></td>
		<td><?php echo $row["evt_mob"];?></td>
		<td>
		 <div class="btn-group">
        <a href="<?php echo 'edit_events.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)" title="Delete">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div>
		 
		 </td>

				
				<script>
				  function deleteme(id){
					  if(confirm("Do you want to delete?")){
						  window.location.href='delete_events.php?id='+id+'';
					  }
				  }
				  
				  </script>
		</tr>
		
		<?php $row_count++; 
	
	}
			?>
			</table>
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
