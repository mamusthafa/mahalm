<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_committee_year = $_SESSION['academic_year'];
require("header.php");
?>
<head>
   
<!------Start Search Form code --------->   
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
<div class="container">
 <div class="row">
    <div class="col-md-6">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-inline" method="get" role="form">
	<div class="form-group">
	 <?php echo '<select class="form-control" name="member_type">';
		echo '<option value="">Select Member Type</option>';
		$sql="select distinct member_type from members";
		$result=mysqli_query($conn,$sql);

		foreach($result as $value)
		{
		?>
		<option value='<?php echo $value["member_type"];?>'><?php echo $value["member_type"];?></option>
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
	 <form action="description.php" id="search_member"   method="get">
	
	 <div class="form-group">
	<input type="text" name="typeahead_member" class="form-control typeahead_memb "  autocomplete="off" spellcheck="false" placeholder="Search Member">
	</div>
	<button type="submit" name="search_member" class="btn btn-sm btn-success">Get Details</button>
	</form>
	<!------------------------------------------End of Search Form------------------------------------------------------->
	</div>
	</div>

	<div class="row">
	
    <div class="col-sm-12">
	
	<center><h2>All Members</h2></center>
	<div class="table-responsive">
	<center><table class="table table-bordered">
		<tbody>
		<tr>
		<td><span style="font-weight: bold;">SL No</span></td>
		<td><span style="font-weight: bold;">Name</span></td>
		<td><span style="font-weight: bold;">Member ID</span></td>
		<td><span style="font-weight: bold;">Mobile</span></td>
		<td style="width:10%"><span style="font-weight: bold;">Action</span></td>
		</tr>
								
	<?php
	require("connection.php");
	
	$num_rec_per_page=500;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	if(isset($_GET["filt_submit"]))
	{
	if(isset($_GET["member_type"]))
	{
		$member_type=$_GET["member_type"];
		$sql="select * from members where  member_type='".$member_type."' ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";
	}
	
	}
	else
	{
		$sql="select * from members ORDER BY first_name  LIMIT $start_from, $num_rec_per_page";	
	}
	$result=mysqli_query($conn,$sql);
	$row_count =1;
	$total_members=mysqli_num_rows($result);

	foreach($result as $row)
	{
		$join_date= date('d-m-Y', strtotime( $row['join_date'] ));
		$id=$row["id"];
	?>
    
		<tr>
		<td><span style="color: #207FA2; "><?php echo $row_count;?></span></td>
		<td><span style="color: #207FA2; "><a href="<?php echo 'description.php?first_name='.$row['first_name'].'&member_id='.$row['member_id'];?>" ><?php echo $row["first_name"];?></a></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["member_id"];?></span></td>
		<td><span style="color: #207FA2; "><?php echo $row["parent_contact"];?></span></td>
		<td><div class="btn-group">
		<a href="<?php echo 'edit_member.php?id='.$id;?>">  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
		<a href="#" onclick="deleteme(<?php echo $row['id'];?>)">   <i class="fa fa-trash-o fa-lg" style="color:red;" aria-hidden="true"></i></a>
	   </div></td>
		</tr>
				
		<script>
		  function deleteme(id){
			  if(confirm("Do you want to delete?")){
				  window.location.href='delete_member.php?id='+id+'';
			  }
		  }
		</script>
		
		<?php 
		$row_count++; 
	}
	
		
	$sql="select * from members";
	$result=mysqli_query($conn,$sql);
	$total_members=mysqli_num_rows($result);
	echo "<p style='color:blue;'>All Members = ".$total_members.'</p>';
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
