<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))
{

require("header.php");
error_reporting("0");
?>
<div id="page-wrapper">
<div class="container">
 
	
	<div class="row">
    <div class="col-sm-12">
	<center><h2>All Staffs</h2></center>
     <div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Designation</span></td>
		
		<td><span style="font-weight: bold;">Departments</span></td>
	
		
		<td><span style="font-weight: bold;">Qualification</span></td>
		
		<td><span style="font-weight: bold;">Address</span></td>
		
		<td><span style="font-weight: bold;">Mobile</span></td>
		
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=100;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
	if((isset($_GET["fac_dep"])))
	{
	$fac_dep=$_GET["fac_dep"];
	$sql="select * from faculty where fac_dep='".$fac_dep."' ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";
	}
	
	}
	else
	{
		
	$sql="select * from faculty  ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);
    
	foreach($result as $row)
	{
	
	?>
   
		<tr>
		<td><?php echo $row_count;?></td>
		<td><a href="<?php echo 'fac_description.php?fac_id='.$row['fac_id'];?>" ><?php echo $row["fac_fname"];?> <?php echo $row["fac_lname"];?></a></td>
		<td><?php echo $row["fac_desig"];?></td>
		<td><?php echo $row["fac_dep"];?></td>
		<td><?php echo $row["fac_quali"];?></td>
		<td><?php echo $row["fac_add"];?></td>
		<td><?php echo $row["parent_contact"];?></td>
		
		</tr>
		<?php $row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["fac_dep"])!="")
		{
			$fac_dep=$_GET["fac_dep"];
			$sql="select * from faculty where fac_dep='".$fac_dep."' ORDER BY fac_id DESC LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$fac_dep." Employees = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from faculty";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Staff = ".$total_students.'</p>';
	}
		
		?>
		
		</table>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>
 
<?php
			
}
else
{
header("Location:login.php");
}
?>  
