<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
require("connection.php");


	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	?>
	<script>
function printDiv(stored) {
     var printContents = document.getElementById('stored').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<style>

</style>
	
	<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$sql = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
		$district=$row["district"];
		$pin=$row["pin"];
	}
		if(isset($_GET["id"])){
		$id=$_GET["id"];
		$sql_stored="select * from marriage_certificate where id='".$id."'";	
		}
		//var_dump($sql_stored);
		$result_stored=mysqli_query($conn,$sql_stored);
	
		if($row_stored=mysqli_fetch_array($result_stored,MYSQLI_ASSOC))
		{
			
			$first_name=$row_stored["first_name"];
			$member_id=$row_stored["member_id"];
			$updated_date= date('d-m-Y', strtotime( $row_stored['updated_date'] ));
			$nikah_date= date('d-m-Y', strtotime( $row_stored['nikah_date'] ));
			$issued_date= date('d-m-Y', strtotime( $row_stored['issued_date'] ));
			$dob= date('d-m-Y', strtotime( $row_stored['dob'] ));
			$wife_dob= date('d-m-Y', strtotime( $row_stored['wife_dob'] ));
			
		
		?>

<div class="container-fluid">
	<div class="inline">
	<button class="btn btn-success" onclick="printDiv('stored')">Print Page</button>
	<button class="btn btn-success" onclick="goBack()">Go Back</button>
	</div>
	<div class="row">
	 
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10"  id="stored" >
		<div style="border:1px solid #d3d3d3;padding: 15px;">
		  <center>
		  <h1 style="color:#009a9a !important;font-weight:bold;"><?php echo $row["sch_name"];?></h1>
		  <p style="color:#006495 !important;font-weight:bold;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
		  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?>
		 </p>
		</center>
	
		 <span style="text-align:left;color:red !important;font-weight:bold;padding-right:50px;">SL.No : <?php echo $row_stored["id"];?></span>
		<span style="text-align:right;">Date : <?php echo $updated_date;?></span><br><br>
					 
					 
					 
	<p style="text-align:left;font-size:16px;font-weight:bold;">Marriage Registered No : <?php echo $row_stored['mar_reg_no'];?><span style="padding-left:200px;">Certificate No : <?php echo $row_stored['certificate_no'];?></span></p><br>
	
	<center><p style="font-size:16px;">Name of Bridegroom  : <span style="font-weight:bold;"><?php echo $row_stored['first_name'];?></span> S/o <span style="font-weight:bold;"><?php echo $row_stored['father_name'];?></span>, Age (Date of Birth) <span style="font-weight:bold;"><?php echo $dob;?></span> <br>  Address <span style="font-weight:bold;"><?php echo $row_stored['address'];?></span></p>
	
	<p style="font-size:16px;">Name of Bride  : <span style="font-weight:bold;"><?php echo $row_stored['wife_first_name'];?></span>  S/o <span style="font-weight:bold;"><?php echo $row_stored['wife_father_name'];?></span>, Age (Date of Birth) <span style="font-weight:bold;"><?php echo $wife_dob;?></span><br> Address <span style="font-weight:bold;"><?php echo $row_stored['wife_address'];?></span></p>
	</center><br>
	
	<center><img src="uploads/marriage.jpg" style="width:50%;" class="img-thumbnail" title="Bridegroom  & Bride Photo's" alt="Bridegroom Photo"></center><br>
	
	
	<center><p style="font-size:16px;">Nikah Date  : <span style="font-weight:bold;"><?php echo $nikah_date;?></span> Certificate issued on  <span style="font-weight:bold;"><?php echo $updated_date;?></span> Place <span style="font-weight:bold;"><?php echo $row_stored['nikah_place'];?></span> Qazi <span style="font-weight:bold;"><?php echo $row_stored['khazi'];?></span> Valiyy <span style="font-weight:bold;"><?php echo $row_stored['valiyy'];?></span></p>
	<br></center>
	
	<center><p style="font-size:16px;">This is to certify that the above mentioned details are true and belief.</p></center>
	<p style="text-align:right;font-size:16px;font-weight:bold;">Seal & Signatory<br>President / Secretary</p>	
	<br><br><br><br><br>
</div>

<div class="col-sm-1">
</div>
</div>
</div>
</div>

<?php
}
require("footer.php");				
}			
else
{
header("Location:login.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>  
