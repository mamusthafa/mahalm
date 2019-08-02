<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))
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
