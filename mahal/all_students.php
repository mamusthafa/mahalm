<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
?>
<head>
   
<!---------------------------------Start Search Form code -------------------------------------->   
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
	width: 396px;
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
 <!--------------------------------- End Search Form code -------------------------------------->     
  </head>
<div id="page-wrapper">
<div class="container-fluid">
 
	 <div class="row">
    <div class="col-md-6">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	  <div class="form-group">
		<select class="form-control" name="filt_class" id="sel1">
			<?php require("selectclass.php");?>
		
			  <div class="form-group">
					 
					  <?php echo '<select class="form-control" name="section">';
						echo '<option value="">Select Section</option>';
							

							$sql="select distinct section from students where academic_year='".$cur_academic_year."'";

							 $result=mysqli_query($conn,$sql);

							foreach($result as $value)
							{
							?>
							<option value='<?php echo $value["section"];?>'><?php echo $value["section"];?></option>
							<?php
							}
							echo '</select><br>';

							?>
					</div>
	<button type="submit" name="filt_submit" class="btn btn-primary">Filter</button>
	</form>
	<form action="export.php" method="post" name="export_excel">
               <br>
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-sm btn-success button-loading" data-loading-text="Loading...">Export CSV/Excel File</button>
				</div>
			</div>
		</form>
	</div>
	
	<div class="col-md-6">
	<!------------------------------------------Start of Search Form------------------------------------------------------->
	 <form action="description_students.php" id="search_student"   method="get">
	
	 <div class="form-horizontal">
	 <div class="form-group">
	<input type="text" name="typeahead_student" class="form-control typeahead_student "  autocomplete="off" spellcheck="false" placeholder="Search Students">
	</div>
	<button type="submit" name="search_student" class="btn btn-sm btn-success">Get Details</button>
	</form>
	<!------------------------------------------End of Search Form------------------------------------------------------->
	</div>
	</div>

	<div class="row">
	
    <div class="col-sm-12">
	
	<center><h2>All Students</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
	
		
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		
		<td><span style="font-weight: bold;">Admission No</span></td>
		
		<td><span style="font-weight: bold;">Present Class</span></td>
	
		
		<td><span style="font-weight: bold;">Joined Date</span></td>
		
		<td><span style="font-weight: bold;">DOB</span></td>
		
		<td><span style="font-weight: bold;">Location</span></td>
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
		{
	if((isset($_GET["filt_class"]))&&(isset($_GET["section"])))
	{
		$filt_class=$_GET["filt_class"];
		$section=$_GET["section"];
		
		
		
	$sql="select * from students where present_class='".$filt_class."' and section='".$section."' and academic_year='".$cur_academic_year."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	else
	{
		$sql="select * from students where present_class='".$filt_class."' and academic_year='".$cur_academic_year."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	
	
	}
	else{
		
	$sql="select * from students where academic_year='".$cur_academic_year."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_students=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$dob= date('d-m-Y', strtotime( $row['dob'] ));
	
	
	?>
    
		<tr>
		
		
		
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description_students.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" ><?php echo $row["first_name"];?></a></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["roll_no"];?></span></td>
		
		<td><span style="color: #207FA2; "><?php echo $row["present_class"];?></span></td>
		
		
		<td><span style="color: #207FA2; "><?php echo $row["join_date"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["dob"];?></span></td>
		<td><span style="color: #207FA2; "><?php if($row['address']!=""){echo $row["address"];}else{ echo $row["village"]." ".$row["district"];}?></span></td>
		
		<td><div class="btn-group"><a href="<?php echo 'description_students.php?first_name='.$row['first_name'].'&roll_no='.$row['roll_no'];?>" title="View" >  <i class="fa fa-eye fa-lg" style="color:#8ba83e;" aria-hidden="true"></i></a>
        <a href="<?php echo 'upd_register.php?id='.$row['id']; ?>" title="Edit">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
        <a href="<?php echo 'del_confirm.php?id='.$row['id']; ?>" title="Delete">  <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
       </div></td>
		
		
		
		
		</tr>
		<?php 
		$row_count++; 
		
	}
	
	
	if(isset($_GET["filt_submit"]))
	{
		
		if(($_GET["filt_class"])!="")
		{
			$filt_class=$_GET["filt_class"];
			$sql="select * from students where present_class='".$filt_class."' and academic_year='".$cur_academic_year."' ORDER BY first_name LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($conn,$sql);
		$total_students=mysqli_num_rows($result);
		echo "<p style='color:blue;'>Total No of ".$filt_class." Students = ".$total_students.'</p>';
		}
		}
	
	else
	{
		
	$sql="select * from students where academic_year='".$cur_academic_year."'";
	$result=mysqli_query($conn,$sql);
	
	$total_students=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Students = ".$total_students.'</p>';
	}
		
		?>
		
		</table></center>
	</div>
	</div>
    
  </div>
</div>
<div id="clearfix">
</div>

</div>

<?php require("footer.php"); } else { header("Location:login.php");} ?>  
