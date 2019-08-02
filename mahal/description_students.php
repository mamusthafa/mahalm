<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");

//////////////////////////////////////Start of Searched variables /////////////////////////////////////////////////
if(isset($_GET["search_student"])){
	$searched=$_GET["typeahead_student"];
	
	$searched_array=explode(",",$searched);
	$first_name=$searched_array[0];
	$present_class=$searched_array[1];
	$roll_no=$searched_array[2];
	
}else{
////////////////////////////////////// End of Searched variables ///////////////////////////////////////////////////
$first_name=$_GET["first_name"];
$roll_no=$_GET["roll_no"];
}	


	$sql="select * from students where first_name='".$first_name."' and  roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'";
	//var_dump($sql);
	$result=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$class=$row["present_class"];
		$section=$row["section"];
		
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
	
	 <center><div class="panel panel-primary" style="width:80%;">
      <div class="panel-heading"><center>Student Details , Name: <?php echo $row["first_name"];?> <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <span style="color:yellow;">  Edit info <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </a></span> <a href="" onclick="printDiv('income')"><span style="color:#fff;"><i class="fa fa-print" aria-hidden="true"></i> Print</span></a></center>
	
	  </div>
		  <div class="panel-body" id="income">
				<center>
					<?php if(($row["photo_path"])!="photo/"){?>
				<img class="img-responsive img-thumbnail" src="<?php echo $row['photo_path'];?>"  width="130" height="130"><?php }else{};?><br>
				
				 
				 <div class="table-responsive"> 
				<table class="table table-bordered table-hover table-striped" style="width:90%;">
					
					<tbody>
					  <tr>
						<td style="width:15%;">Student Name<br>Student Type</td>
						<td style="color:blue;width:25%;"><?php echo $row['first_name'];?></td>
						<td style="width:15%;">Admission No</td>
						<td style="color:blue;width:25%;"><?php echo $row['roll_no'];?>
						
						
						</td>
					   
					  </tr>
					  <tr>
						<td style="width:15%;">Joined Date</td>
						<td style="color:blue;width:25%;"><?php echo $row['join_date'];?></td>
						<td style="width:15%;">Blood Group</td>
						<td style="color:blue;width:25%;"><?php echo $row['blood'];?></td>
						
					  </tr>
					  <tr>
						<td style="width:15%;">Gender</td>
						<td style="color:blue;width:25%;"><?php echo $row['sex'];?></td>
						<td style="width:15%;">Date of Birth</td>
						<td style="color:blue;width:25%;"><?php echo $row['dob'];?></td>
						
					  </tr>
					
					  <tr>
						<td style="width:15%;">Address</td>
						<td style="color:blue;width:25%;"><?php echo $row['address'];?></td>
						<td style="width:15%;">Mobile</td>
						<td style="color:blue;width:25%;"><?php echo $row['parent_contact'];?></td>
						
					  </tr>
					  
					  <tr>
						<td style="width:15%;">Class & Section</td>
						<td style="color:blue;width:25%;"><?php echo $row['present_class']." , ".$section;?></td>
						<td style="width:15%;">Adhaar No</td>
						<td style="color:blue;width:25%;"><?php echo $row['adhaar_no'];?></td>
						
					  </tr>
					 
					  
					  <tr>
						<td style="width:15%;">Fahter Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['father_name'];?></td>
						<td style="width:15%;">Mother Name</td>
						<td style="color:blue;width:25%;"><?php echo $row['mother_name'];?></td>
						
					  </tr>
					  
					</tbody>
				  </table> 
				  </div>
				  
				  </center>
				  
				   
<!------------------------------------------------------Start Attendance details------------------------------------------------->
<?php 
	}
$sql_tot="select att_date,first_name,roll_no,present_class,sum(att_count) as tot_att_count,present_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."' group by roll_no";
        $result_tot=mysqli_query($conn,$sql_tot);		
		if($row_tot=mysqli_fetch_array($result_tot,MYSQLI_ASSOC))
	    {
			$tot_att_count=$row_tot["tot_att_count"];
			
			$first_name=$row_tot["first_name"];
			$roll_no=$row_tot["roll_no"];
			$present_class=$row_tot["present_class"];
			
		}	
				
		
		$sql_tot_att="select distinct att_date,present_class,sum(tot_class) as tot_class from attendance where present_class='".$class."' and first_name='".$first_name."' and roll_no='".$roll_no."'  and academic_year='".$cur_academic_year."'  group by roll_no";
		$result_att_tot=mysqli_query($conn,$sql_tot_att);
		//$tot_class=mysqli_num_rows($result_att_tot);
		if($row_att_tot=mysqli_fetch_array($result_att_tot,MYSQLI_ASSOC))
	    {
			$tot_class=$row_att_tot["tot_class"];
			
		}

?>
<div class="row">
        <hr><div class="col-sm-12">
		 <h3>Attendance Details</h3>
		  <div class="table-responsive"> 
				<center><table class="table table-bordered">
				<tbody>
				<tr class="w3-blue">
				<th>SL No</th>
				<th>Name</th>
				<th>Roll No</th>
				<th>Class Attended</th>
				<th>Total Class</th>
				<th>Percentage (%)</th>
				
				
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
	$row_count_att=1;
	foreach($result_tot as $row_tot)
	{
	//$att_date= date('d-m-Y', strtotime( $row['att_date'] ));
	//$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
	
	$per_tot_class=($row_tot["tot_att_count"]/$tot_class)*100;
	?>
				<tr>
				<td style="text-align:center;"><?php echo $row_count_att;?></td>
				<td style="text-align:center;"><a href="<?php echo 'attendance_desc.php?name='.$row_tot["first_name"].'&roll_no='.$row_tot["roll_no"].'&present_class='.$row_tot["present_class"];?>"><?php echo $row_tot["first_name"];?></a></td>
				<td style="text-align:center;"><?php echo $row_tot["roll_no"];?></td>
				<td style="text-align:center;"><?php echo $row_tot["tot_att_count"];?></td>
				<td style="text-align:center;"><?php echo $tot_class;?></td>
				<td style="text-align:center;"><?php echo $per_tot_class;?></td>
				<?php
				
				if(isset($_GET['delete']))
					{
				?>
                <td style="text-align:center;"><a href="<?php echo 'delete_income.php?id='.$id;?>"><button type="button" class="btn btn-sm btn-danger w3-card-4">Delete</button></a></td>
			
				<?php 
					}
				?>
				
				</tr>
				
	<?php
				
	$row_count_att++; 
	}
	
	?>
	
				</tbody>
				</table></center>
				
				</div>
				<button onclick="goBack()" class="btn btn-primary">Go Back</button>
				</div>
				</div>

<!------------------------------------------------------End of Attendance details-------------------------------------------------->
	
<?php
require("footer.php");			
}
else
{
header("Location:login.php");
}
?>  	