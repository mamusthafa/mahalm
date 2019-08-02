<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");
error_reporting("0");
require("connection.php");

$first_name = test_input($_POST["first_name"]);
$member_id = test_input($_POST["member_id"]);
$ashaya = test_input($_POST["ashaya"]);
$madh = test_input($_POST["madh"]);
$mar_date = test_input($_POST["mar_date"]);
$before_married = test_input($_POST["before_married"]);
$mar_no = test_input($_POST["mar_no"]);
$wife_exist = test_input($_POST["wife_exist"]);
$any_problem = test_input($_POST["any_problem"]);
$children_how_many = test_input($_POST["children_how_many"]);
$divorce_since = test_input($_POST["divorce_since"]);
$new_comer = test_input($_POST["new_comer"]);
$certi_no = test_input($_POST["certi_no"]);
$certi_no = test_input($_POST["certi_no"]);
$member_or_not = test_input($_POST["member_or_not"]);
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	//$today_date=date("Y-m-d");
	$today_date=date("d-m-Y");
	?>
	

<head>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=16d7aa60d85914d3f362710f2d7b92a5'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
<span id="qpd_banner">Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>

</head>
	
	<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if(isset($_GET["id"]))
	{
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
		$sql_stored="select * from noc_certificate where id='".$id."'";
		$result_stored=mysqli_query($conn,$sql_stored);
		if($row_stored=mysqli_fetch_array($result_stored,MYSQLI_ASSOC))
		{
		?>
		
		<div class="container-fluid">
				<div class="inline">
				<button class="btn btn-success" onclick="printDiv('stored')">Print Page</button>
				<button class="btn btn-success" onclick="goBack()">Go Back</button>
				</div>
				<div class="row">
				 
					<div class="col-sm-12" id="stored">
					  <center>
					  <h1 style="color:#009a9a !important;font-weight:bold;"><?php echo $row["sch_name"];?></h1>
					  <p style="color:#006495 !important;font-weight:bold;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
					  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?>
					 </p>
					</center>
					
					<span style="text-align:left;color:red !important;font-weight:bold;padding-right:50px;">SL.No : <?php echo $row_stored["id"];?></span>
					 <span style="text-align:right;">Date : <?php echo $today_date;?></span><br><br>
				
					<table class="table table-bordered">
					
					<tr>
					<td>ವರನ ಹೆಸರು ಮತ್ತು ವಿಳಾಸ</td>
					<td><?php echo $row_stored["first_name"]." , ".$row_stored["address"];?></td>
					</tr>
					
					<tr>
					<td>ತಂದೆಯ ಹೆಸರು</td>
					<td><?php echo $row_stored["father_name"];?></td>
					</tr>
					
					<tr>
					<td>ತಾಯಿಯ ಹೆಸರು</td>
					<td><?php echo $row_stored["mother_name"];?></td>
					</tr>
					
					<tr>
					<td>ವರನ ಮಹಲ್ ಕಮಿಟಿಯ ಪೂರ್ಣ ವಿಳಾಸ</td>
					<td><?php echo $sch_name."<br>".$location.",".$city.",".$district.",".$pin;?></td>
					</tr>
					
					<tr>
					<td>ವರನ ಆಶಯ:</td>
					<td><?php echo $row_stored["ashaya"];?></td>
					</tr>
					
					<tr>
					<td>ವರನ ಮದ್ಹಬ್:</td>
					<td><?php echo $row_stored["madh"];?></td>
					</tr>
					
					<tr>
					<td>ಮದುವೆ ನಡೆಸಲು ತೀರ್ಮಾನಿಸಿದ ದಿನಾಂಕ:</td>
					<td><?php echo $row_stored["mar_date"];?></td>
					</tr>
					
					<tr>
					<td>ವರನಿಗೆ ಮೊದಲು ಮದುವೆಯಾಗಿದೆಯೆ?</td>
					<td><?php echo $row_stored["before_married"];?></td>
					</tr>
					
					<tr>
					<td>ಮದುವೆಯಾಗಿದ್ದರೆ ಎಷ್ಟು?</td>
					<td><?php echo $row_stored["mar_no"];?></td>
					</tr>
					
					<tr>
					<td>ಆ ಹೆಂಡತಿ ಇದ್ದಾರೆಯೆ?</td>
					<td><?php echo $row_stored["wife_exist"];?></td>
					</tr>
					
					<tr>
					<td>ಮದುವೆ ಮಾಡಿಕೊಡುವುದರಲ್ಲಿ ಎನಾದರೂ ತೊಂದರೆ ಇದಯೇ?</td>
					<td><?php echo $row_stored["any_problem"];?></td>
					</tr>
					
					<tr>
					<td>ಮಕ್ಕಳಿದ್ದಾರೆಯೇ? ಇದ್ದರೆ ಎಷ್ಟು?</td>
					<td><?php echo $row_stored["children_how_many"];?></td>
					</tr>
					
					<tr>
					<td>ಬಿಟ್ಟು ಎಷ್ಟು ಕಾಲವಾಯಿತು?</td>
					<td><?php echo $row_stored["divorce_since"];?></td>
					</tr>
					
					<tr>
					<td>ವರನು ಹೊಸದಾಗಿ ಸೇರಿದವನೇ?</td>
					<td><?php echo $row_stored["new_comer"];?></td>
					</tr>
					
					<tr>
					<td>ಸೇರಿದವನಾಗಿದ್ದರೆ ಸರ್ಟಿಫಿಕೇಟ್ ನಂ.</td>
					<td><?php echo $row_stored["certi_no"];?></td>
					</tr>
					
					</table>
					<center>ಮೇಲೆ ವಿವರಿಸಿದ ಎಲ್ಲಾ ವಿಷಯಗಳು ಸತ್ಯವೆಂದು ಈ ಮೂಲಕ ದ್ರಡೀಕರಿಸುತ್ತೇವೆ.</center><br>
					
					<table class="table table-bordered">
					<tr style="font-weight:bold;">
					<td style="font-weight:bold;">ಅಧ್ಯಕ್ಷರು / ಕಾರ್ಯದರ್ಶಿ<br><br><br>ಹೆಸರು / ಸಹಿ / ಸೀಲ್</td>
					<td style="font-weight:bold;">ಕಮಿಟಿ ಸೀಲ್</td>
					<td style="font-weight:bold;">ಖಾಸಿ ಖತೀಬ್<br><br><br>ಹೆಸರು / ಸಹಿ / ಸೀಲ್</td>
					</tr>
					</table>
					<center>ಮೇಲೆ ವಿವರಿಸಿದ ಎಲ್ಲಾ ವಿಷಯಗಳು ನಮಗೆ ಸತ್ಯವೆಂದು ಈ ಮೂಲಕ ದ್ರಡಪಟ್ಟಿರುತ್ತವೆ. ಆದ್ದರಿಂದ ಮದುವೆ ನಡೆಸಲು ಕೆಳಗಿನ ಸಾಕ್ಷಿಗಳ ಮುಖೇನ ಪೂರ್ಣ ಸಮ್ಮತವಿರುತ್ತದೆ.</center><br>
					<p style="font-weight:bold;">ವಧುವಿನ ಹೆಸರು,ವಿಳಾಸ ಮತ್ತು ಸಹಿ: <br><br>
					ತಂದೆಯ,ಪೋಷಕರ ಹೆಸರು,ವಿಳಾಸ ಮತ್ತು ಸಹಿ: <br><br>
					ಸಾಕ್ಷಿಗಳ ಹೆಸರು, ವಿಳಾಸ ಮತ್ತು ಸಹಿ<br><br>
					1......................................................................<br><br>
					2......................................................................
					</p>
					</div>
				</div>
			</div>

		<?php

		////////////////////////// End of Get Stored Certificate //////////////////////////////////////////////////////////
		}
		}
		if(!isset($_GET["id"]))
		{	

	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////	
if($member_or_not=="non_member"){
				$father_name = test_input($_POST["father_name"]);
				$mother_name = test_input($_POST["mother_name"]);
				$mahal_address = test_input($_POST["mahal_address"]);
			}
			else
			{
			$sql_student = "SELECT * FROM members where committee_year='".$cur_academic_year."' and first_name='".$first_name."' and member_id='".$member_id."'";
			$result_student=mysqli_query($conn,$sql_student);
			if($row_student=mysqli_fetch_array($result_student,MYSQLI_ASSOC))
			{
				$dob= date('d-m-Y', strtotime( $row_student['dob'] ));
				$join_date= date('d-m-Y', strtotime( $row_student['join_date'] ));
				$address= $row_student['address'];
				$father_name= $row_student['father_name'];
				$mother_name= $row_student['mother_name'];
				$memb_id= $row_student['id'];
				
			}	
			$sql = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";	
			$result=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$sch_name=$row["sch_name"];
				$location=$row["location"];
				$city=$row["location"];
				$district=$row["district"];
				$pin=$row["pin"];
				$mahal_address=$sch_name."<br>".$location.",".$city.",".$district.",".$pin;
				
			}
		}
		

$sql_insert="insert into noc_certificate (first_name,member_id,ashaya,madh,mar_date,before_married,mar_no,wife_exist,any_problem,children_how_many,divorce_since,new_comer,certi_no,issued_date,father_name,mother_name,memb_id,mahal_address) values('$first_name','$member_id','$ashaya','$madh','$mar_date','$before_married','$mar_no','$wife_exist','$any_problem','$children_how_many','$divorce_since','$new_comer','$certi_no','$today_date','$father_name','$mother_name','$memb_id','$mahal_address')";
$conn->query($sql_insert);

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
$today_date=date("d-m-Y");
?>

<div class="container-fluid">
<div class="inline">
<button class="btn btn-success" onclick="printDiv('stored')">Print Page</button>
<button class="btn btn-success" onclick="goBack()">Go Back</button>
</div>
<div class="row">
 <div class="col-sm-12" id="stored">
	  <center>
	  <h1 style="color:green;font-weight:bold;"><?php echo $row["sch_name"];?></h1>
	  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
	  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?>
	 </p>
	</center>
	  <p>
	 <span style="text-align:right;">Date : <?php echo $today_date;?></span>
	<table class="table table-bordered">
	
	<tr>
	<td>ವರನ ಹೆಸರು ಮತ್ತು ವಿಳಾಸ</td>
	<td><?php echo $first_name." , ".$address;?></td>
	</tr>
	
	<tr>
	<td>ತಂದೆಯ ಹೆಸರು</td>
	<td><?php echo $father_name;?></td>
	</tr>
	
	<tr>
	<td>ತಾಯಿಯ ಹೆಸರು</td>
	<td><?php echo $mother_name;?></td>
	</tr>
	
	<tr>
	<td>ವರನ ಮಹಲ್ ಕಮಿಟಿಯ ಪೂರ್ಣ ವಿಳಾಸ</td>
	<td><?php echo $mahal_address;?></td>
	</tr>
	
	<tr>
	<td>ವರನ ಆಶಯ:</td>
	<td><?php echo $ashaya;?></td>
	</tr>
	
	<tr>
	<td>ವರನ ಮದ್ಹಬ್:</td>
	<td><?php echo $madh;?></td>
	</tr>
	
	<tr>
	<td>ಮದುವೆ ನಡೆಸಲು ತೀರ್ಮಾನಿಸಿದ ದಿನಾಂಕ:</td>
	<td><?php echo $mar_date;?></td>
	</tr>
	
	<tr>
	<td>ವರನಿಗೆ ಮೊದಲು ಮದುವೆಯಾಗಿದೆಯೆ?</td>
	<td><?php echo $before_married;?></td>
	</tr>
	
	<tr>
	<td>ಮದುವೆಯಾಗಿದ್ದರೆ ಎಷ್ಟು?</td>
	<td><?php echo $mar_no;?></td>
	</tr>
	
	<tr>
	<td>ಆ ಹೆಂಡತಿ ಇದ್ದಾರೆಯೆ?</td>
	<td><?php echo $wife_exist;?></td>
	</tr>
	
	<tr>
	<td>ಮದುವೆ ಮಾಡಿಕೊಡುವುದರಲ್ಲಿ ಎನಾದರೂ ತೊಂದರೆ ಇದಯೇ?</td>
	<td><?php echo $any_problem;?></td>
	</tr>
	
	<tr>
	<td>ಮಕ್ಕಳಿದ್ದಾರೆಯೇ? ಇದ್ದರೆ ಎಷ್ಟು?</td>
	<td><?php echo $children_how_many;?></td>
	</tr>
	
	<tr>
	<td>ಬಿಟ್ಟು ಎಷ್ಟು ಕಾಲವಾಯಿತು?</td>
	<td><?php echo $divorce_since;?></td>
	</tr>
	
	<tr>
	<td>ವರನು ಹೊಸದಾಗಿ ಸೇರಿದವನೇ?</td>
	<td><?php echo $new_comer;?></td>
	</tr>
	
	<tr>
	<td>ಸೇರಿದವನಾಗಿದ್ದರೆ ಸರ್ಟಿಫಿಕೇಟ್ ನಂ.</td>
	<td><?php echo $certi_no;?></td>
	</tr>
	
	</table>
	<center>ಮೇಲೆ ವಿವರಿಸಿದ ಎಲ್ಲಾ ವಿಷಯಗಳು ಸತ್ಯವೆಂದು ಈ ಮೂಲಕ ದ್ರಡೀಕರಿಸುತ್ತೇವೆ.</center><br>
	
	<table class="table table-bordered">
	<tr style="font-weight:bold;">
	<td style="font-weight:bold;">ಅಧ್ಯಕ್ಷರು / ಕಾರ್ಯದರ್ಶಿ<br><br><br>ಹೆಸರು / ಸಹಿ / ಸೀಲ್</td>
	<td style="font-weight:bold;">ಕಮಿಟಿ ಸೀಲ್</td>
	<td style="font-weight:bold;">ಖಾಸಿ ಖತೀಬ್<br><br><br>ಹೆಸರು / ಸಹಿ / ಸೀಲ್</td>
	</tr>
	</table>
	<center>ಮೇಲೆ ವಿವರಿಸಿದ ಎಲ್ಲಾ ವಿಷಯಗಳು ನಮಗೆ ಸತ್ಯವೆಂದು ಈ ಮೂಲಕ ದ್ರಡಪಟ್ಟಿರುತ್ತವೆ. ಆದ್ದರಿಂದ ಮದುವೆ ನಡೆಸಲು ಕೆಳಗಿನ ಸಾಕ್ಷಿಗಳ ಮುಖೇನ ಪೂರ್ಣ ಸಮ್ಮತವಿರುತ್ತದೆ.</center><br>
	<p style="font-weight:bold;">ವಧುವಿನ ಹೆಸರು,ವಿಳಾಸ ಮತ್ತು ಸಹಿ: <br><br>
	ತಂದೆಯ,ಪೋಷಕರ ಹೆಸರು,ವಿಳಾಸ ಮತ್ತು ಸಹಿ: <br><br>
	ಸಾಕ್ಷಿಗಳ ಹೆಸರು, ವಿಳಾಸ ಮತ್ತು ಸಹಿ<br><br>
	1......................................................................<br><br>
	2......................................................................
	</p>
	

		</div>
		
  </div>

</div>



<?php
}
require("footer.php");
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
<?php				
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
