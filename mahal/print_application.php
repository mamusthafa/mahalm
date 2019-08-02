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
	$id=$_GET["id"];
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

		/////////////// Start of Get Stored Certificate ///////////////////////////////
		$sql_stored="select * from applications where id='".$id."'";
		$result_stored=mysqli_query($conn,$sql_stored);
		//var_dump($sql_stored);
		if($row_stored=mysqli_fetch_array($result_stored,MYSQLI_ASSOC))
		{
			
			$first_name=$row_stored["first_name"];
			$member_id=$row_stored["member_id"];
			$subject=$row_stored["subject"];
			$message=$row_stored["message"];
			$sent_date= date('H:ia d-m-Y', strtotime( $row_stored['message_time'] ));
			
		$sql_cont = "SELECT * FROM members where first_name='".$first_name."' and member_id='".$member_id."'";	
		$result_con=mysqli_query($conn,$sql_cont);
		if($row_cont=mysqli_fetch_array($result_con,MYSQLI_ASSOC))
		{
			$parent_contact=$row_cont["parent_contact"];
			$address=$row_cont["address"];
			
		}
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
		  <h1 style="color:green;font-weight:bold;"><?php echo $row["sch_name"];?></h1>
		  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
		  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?>
		 </p>
		</center>
	
		 <span style="text-align:right;">Date : <?php echo $sent_date;?></span>
		<br><br><br><br>

		
	<p style="font-size:16px;text-align:left;font-weight:bold;">
ಮಾನ್ಯರೇ, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration:underline;">ವಿಷಯ:  <?php echo $subject;?></span>
</p><br>
					
	<p style="font-size:16px;text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $message;?>
</p><br><br><br><br><br>
	<p style="text-align:right;font-size:16px;"><span style="font-weight:bold;text-decoration:underline;">ಇತೀ ತಮ್ಮ ವಿಶ್ವಾಸಿ</span><br>Name: <?php echo $first_name;?><br>Member ID: <?php echo $member_id;?><br>Mobile No: <?php echo $parent_contact;?><br>Address: <?php echo $address;?></p>	
	
	<p style="text-align:left;font-size:16px;">ದಿನಾಂಕ : <?php echo $sent_date;?></p>	
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
