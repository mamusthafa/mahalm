<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
require("connection.php");
if(isset($_POST["submit"])){
	if($_FILES['file']['name']){
		$filename = explode(".",$_FILES['file']['name']);
		if($filename[1] == 'csv'){
			$handle = fopen($_FILES['file']['tmp_name'],"r");
			$count = 0;
			ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	while($data = fgetcsv($handle))
	{
		$first_name = mysqli_real_escape_string($conn,$data[0]);
		$member_id = mysqli_real_escape_string($conn,$data[1]);
		$member_type = mysqli_real_escape_string($conn,$data[2]);
		$parent_contact = mysqli_real_escape_string($conn,$data[3]);
		$address = mysqli_real_escape_string($conn,$data[4]);
		
		
		$count++;                                      

   if($count>1){ 
	$sql="insert into members (first_name,member_id,member_type,parent_contact,address,committee_year) values('$first_name','$member_id','$member_type','$parent_contact','$address','$cur_academic_year')";
	$conn->query($sql);
	//var_dump($sql);
		}
		}
		fclose($handle);
		print "<center><p style='font-size:20px;font-weight:bold;color:green;'>Import done Successfully..</p><center>";
		//header('Location: all_members.php');
	}
}
}
?>
<div class="container">
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-6"><br><br>
<div class="panel panel-primary">
     <div class="panel-heading"><h4>Import Bulk Members (CSV format)</h4></div>
      <div class="panel-body">

<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Import">Upload</button>
</form>
<br>
<a href="uploads/importmembers.csv"> <i class="fa fa-download" aria-hidden="true"></i> Download CSV Template</a>
</div>

</div>
</div>
<div class="col-sm-3">
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
