<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$memb_type=$_GET["memb_type"];
		}
require("header.php");
require("connection.php");
$sql="select * from donation where id ='".$id."'  and committee_year='".$cur_academic_year."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$don_amount=$value["don_amount"];
	$don_towards=$value["don_towards"];
	$rec_date=$value["rec_date"];
	$rec_no=$value["rec_no"];
	$first_name=$value["first_name"];
	$member_id=$value["member_id"];
	
	}
?>

       <div class="container-fluid">
		<div class="row">
		<div class="col-sm-3"><br>
	    </div>
		<div class="col-sm-6"><br>
		<div class="panel panel-green">
     <div class="panel-heading"><h4>Update Donations</h4></div>
      <div class="panel-body">
			<?php
			  if(isset($_GET["success"])){
				  ?>
				  <div class="alert alert-success">
				<strong>Success</strong> Updated successfully.
			</div>
				  <?php
			  }
			
			?>
	Name : <?php echo $first_name;?> , Member ID : <?php echo $member_id;?> 
							
	<form action="update_donation.php" method="post">
	
	<?php 
	if($memb_type=="member"){
	?>
	  <input type="hidden" name="name" value="<?php echo $first_name;?>" class="form-control">
	  
	  <input type="hidden" name="member_id" value="<?php echo $member_id;?>" class="form-control"> 
	  
	  <input type="hidden" name="memb_type" value="<?php echo $memb_type;?>" class="form-control">
	 
	<?php
	}
	else if($memb_type=="non_member")
	{
		
	?>
	<div class="form-group">
	  <input type="text" name="name" value="<?php echo $value["non_name"];?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	   <input type="text" name="member_id" value="<?php echo $value["non_location"];?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Mobile No:</label>
		<input type="text" name="mobile" value="<?php echo $value["mobile"];?>" class="form-control">
	  </div>
	  
	  <input type="hidden" name="memb_type" value="<?php echo $memb_type;?>" class="form-control">
	<?php
	}
	?>
	
	
      
	  <div class="form-group">
	    <label for="usr">Donation Amount:</label>
		<input type="number" name="don_amount" value="<?php echo $don_amount;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Donation Towards:</label>
		<input type="text" name="don_towards" value="<?php echo $don_towards;?>" class="form-control">
	  </div>
	  
	  <div class="form-group">
	    <label for="usr">Receipt Date:</label>
		<input type="date" name="rec_date" value="<?php echo $rec_date;?>" class="form-control">
	  </div>
	  
	 <div class="form-group">
	    <label for="usr">Receipt No:</label>
		<input type="text" name="rec_no" value="<?php echo $rec_no;?>" class="form-control">
	  </div>
	  
	  
	 <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
	 
		
	<input type="submit" name="donation_update" class="btn btn-success" value="Update Donation">
	
	</form><br>
	 <button class="btn btn-success" onclick="goBack()">Go Back</button>

	
		</div>
		</div>
		</div>
		
		
		<div class="col-sm-3"><br>
		
	  
    </div>
    </div>
    </div>
	
	
	

	
    </div>
</div>






<?php 


require("footer.php");
	}else{
		header("Location:login.php");
	}
	



?>