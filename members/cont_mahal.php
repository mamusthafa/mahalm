<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass']))

{
	error_reporting("0");
	require("header.php");
	require("connection.php");
	$first_name=$_SESSION['parents_uname'];
	$member_id=$_SESSION['parents_pass'];
	?>
	<head>
	<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=16d7aa60d85914d3f362710f2d7b92a5'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
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
<div class="container-fluid">
<span id="qpd_banner">Kannada By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>
	<div class="row">
	
	<div class="col-sm-6">
	<h3 style="font-weight:bold;">Contact Mahal (Write New Message)</h3>
	<form action="insert_contact.php" method="post">
	
	<div class="form-group">
   <input type="text" name="subject" placeholder="Subject" class="form-control">
	</div>
	
	<div class="form-group">
	  <textarea rows="6" name="message" placeholder="Type Message Here" id="qpd_script" class="form-control"></textarea>
	   </div>
	   
	<input type="submit" name="contact" class="btn btn-primary" value="Send">
	</form>
	
	</div>
	
	<div class="col-sm-6">
	<h2 style="font-weight:bold;color:green;">Messages (Inbox)</h2>
	
	 <?php
	$num_rec_per_page=10;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page;
	
	 $sql_cont="select * from contact_mahal where first_name='".$first_name."' and member_id='".$member_id."' order by message_time desc  LIMIT $start_from, $num_rec_per_page";
	 $result_cont=mysqli_query($conn,$sql_cont);
	
	if((mysqli_num_rows($result_cont))==0){
	echo '<p style="text-align:center;color:blue;border: 1px solid blue;padding:4px;">No Messages to display</p>'; 
	}
	else if((mysqli_num_rows($result_cont))>0)
	{
				
			
	 foreach($result_cont as $row){
	$message_id=$row["id"];
	$sent_date= date('H:ia d-m-Y', strtotime( $row['message_time'] ));
	?>
	
	 <p style="text-align:right;color:black;background-color:yellow;border:1px solid #FFA07A;border-radius:50px 70px 0px 50px;padding-left:30px;padding-top:5px;padding-bottom:5px;padding-right:30px;"><span style="font-weight:bold;">YOU : </span><?php echo $row["subject"];?> : <?php echo $row["message"];?> <span style="color:black;font-size:11px;">
	 <br>Sent Time : <?php echo $sent_date;?></span></p>

	
	<br>
	<?php
		 
	$sql="select * from reply_messages where message_id='".$message_id."' and first_name='".$first_name."' and member_id='".$member_id."' order by message_time desc";
	 $result=mysqli_query($conn,$sql);
	 foreach($result as $value){
	$sent_time= date('H:ia d-m-Y', strtotime( $value['message_time'] ));
	 ?>
	<p style="text-align:left;color:black;background-color:palegreen;border:1px solid forestgreen;border-radius:70px 50px 50px 0px;padding-left:40px;padding-top:5px;padding-bottom:5px;padding-right:40px;">Secretary : </span><?php echo $value["subject"];?> : <?php echo $value["message"];?> <span style="color:black;font-size:11px;">
	 <br>Received Date : <?php echo $sent_time;?></span></p>
	
	 </br>
	 <?php
	 }
	 }
	 }
	$total_records = mysqli_num_rows($result_cont);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
	echo "<a href='cont_mahal.php?page=1'>".' First '."</a> "; // Goto 1st page  
	for ($i=1; $i<=$total_pages; $i++) { 
	echo "<a href='cont_mahal.php?page=".$i."'>   ".$i. "   </a> "; 
	}; 
	echo "<a href='cont_mahal.php?page=$total_pages'>".' Last '."</a> "; // Goto last page
	 ?>
	
	</div>
	
	
	</div>
	</div>
<?php
	
	}

	else

	{

		header("Location:login.php");

	}

?>			
