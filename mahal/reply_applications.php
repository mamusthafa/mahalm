<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
	$cur_academic_year = $_SESSION['academic_year'];
	error_reporting("0");
	require("header.php");
	require("connection.php");
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		}

	?>
	<head>
	<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=c1e39193efe161d3fde8b95267fe4c5b'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);

//var s = document.createElement('script'); s.setAttribute('src','js/quill.js?lang=Kannada&key=c1e39193efe161d3fde8b95267fe4c5b'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>
<span id="qpd_banner">Powered By <a href="http://www.quillpad.in/" target="_blank">Quillpad</a>.</span>
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

<?php
	$sql="select * from applications where id ='".$id."'";
$result=mysqli_query($conn,$sql);
//var_dump($sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
?>
			<div class="container-fluid">
                <div class="row">
                <div class="col-sm-3">
				</div> 
				<div class="col-sm-6">
				<h2>Reply Message</h2>
				<h4>To : <?php echo $value["first_name"];?> and Member ID : <?php echo $value["member_id"];?></h4>
				<form action="insert_reply_application.php" method="post">
				
				<div class="form-group">
	           <label for="usr">Subject:</label>
		       <input type="text" name="subject" class="form-control">
	            </div>
				
	            <div class="form-group">
	              <label for="usr">Message:</label>
		          <textarea rows="6" name="message" id="qpd_script" class="form-control"></textarea>
		           </div>
				   <input type="hidden" name="first_name" value="<?php echo $value['first_name'];?>">
				   <input type="hidden" name="member_id" value="<?php echo $value['member_id'];?>">
				   <input type="hidden" name="id" value="<?php echo $value['id'];?>">
				   
				   	<input type="submit" name="contact" class="btn btn-success" value="Send Reply">
		
				</form><br>
				<button onclick="goBack()" class="btn btn-primary">Go Back</button>
				
				
				</div>
				<div class="col-sm-3">
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

?>			
