<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("header.php");

require("connection.php");
if(isset($_GET["id"])){
		$id=$_GET["id"];
$sql_lh = "SELECT * FROM letterhead where academic_year='".$cur_academic_year."' and id='".$id."' ORDER BY ID DESC LIMIT 1";
}else{
$sql_lh = "SELECT * FROM letterhead where academic_year='".$cur_academic_year."' ORDER BY ID DESC LIMIT 1";	
}
	$result_lh=mysqli_query($conn,$sql_lh);
	if($row_lh=mysqli_fetch_array($result_lh,MYSQLI_ASSOC))
	{
		$id=$row_lh["id"];
		$lh_title=$row_lh["lh_title"];
		$lh_desc=$row_lh["lh_desc"];
	}
	
	
	$sql = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";	
	
	
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$sch_name=$row["sch_name"];
		$location=$row["location"];
		$city=$row["location"];
	}
$printed_date= date('d-m-Y', strtotime( $row_lh['printed_date'] ));	

?>
<script>
function printDiv(letterhead) {
     var printContents = document.getElementById('letterhead').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<style>

</style>
<div class="container-fluid"><br>
<div class="inline">
<button class="btn btn-success" onclick="printDiv('letterhead')">Print Page</button>
<a href="all_documents.php"><button class="btn btn-success">Go Back</button></a>
</div>
<div class="row">
 
    <div class="col-sm-10 col-sm-offset-1" id="letterhead">
	  <center>
	  <h1 style="color:red;"><?php echo $row["sch_name"];?></h1>
	  <p style="color:blue;font-size:18px;border-bottom:1px solid black;"><?php echo $row["location"];?> , <?php echo $row["city"];?> , <?php echo $row["district"];?> - <?php echo $row["pin"];?> , <?php echo $row["state"];?> , <br>
	  Phone : <?php echo $row["phone"];?> , Mob : <?php echo $row["mob"];?><br> 
	  Email : <?php echo $row["email"];?> , web : <?php echo $row["web"];?>
	  <br></p>
	</center>
	
	  <p><span style="text-align: right;">Date : <?php echo $printed_date;?></span><span style="text-align: left;"></p>
		  
		  <p>SL No : <?php echo $id;?></span></p>
	  <br><br>
		
		<p style="font-size:14px;"><?php echo $row_lh["lh_desc"];?></p>
<br><br><br>

		</div>

  </div>

</body>
</div>





<?php
require("footer.php");				
}
else
{
header("Location:login.php");
}
?>  
