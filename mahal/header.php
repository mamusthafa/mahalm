<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	require("connection.php");
	$sql = "SELECT * FROM mahal_det ORDER BY ID DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$school_name=$row["sch_name"];
		$web=$row["web"];
	}
	
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $school_name;?></title>
	
    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
	
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
	<!------wysiwyg------------------------------>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- include summernote css/js-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>


<style>
a:hover {

   cursor: pointer;

   background-color: yellow;

}

</style>
<link href="style_loading.css" rel="stylesheet">



</head>

<body class="body">

<div id="load_screen">
<div id="loading">Loading</div>
</div>
    <div id="wrapper">
	
	

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo $school_name;?></a>
            </div>
            <!-- Top Menu Items -->
			
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
             
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['lkg_uname']." : Committee Year ".$_SESSION['academic_year'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
	<li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Help <i class="fa fa-phone-square" aria-hidden="true"></i> 8277021524</a>
	</li>
	<li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
	<li><a href="mes_report.php"><i class="fa fa-flag-o"></i> SMS Delivery Report</a></li>
	<li><a href="bulk_individual_fee.php"><i class="fa fa-list"></i> Bulk Old/Addon Fee</a></li>
	
	
<li>
	<a href="#" data-toggle="collapse" data-target="#bank"><i class="fa fa-bank "></i></i> Bank Summary <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="bank" class="collapse">
		<li><a href="add_bank.php"><i class="fa fa-plus"></i> Add Bank</a></li>
		<li><a href="all_banks.php"><i class="fa fa-fw fa-cog"></i> All Banks</a> </li>
		<li><a href="bank_deposit.php">Add Bank Deposit</a></li>
		<li><a href="all_bank_deposit.php">All Bank Deposit</a></li>
		<li><a href="add_bank_withdraw.php">Add Withdraw</a></li>
		<li><a href="all_withdrawals.php">All Withdrawals</a></li>
	</ul>
</li>					

<li>
	<a href="#" data-toggle="collapse" data-target="#member_fee"><i class="fa fa-list"></i></i> Bulk Member / Donation Fee <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="member_fee" class="collapse">
		<li><a href="bulk_member_fee.php">Collect Bulk Member Fee</a></li>
		<li><a href="bulk_donation.php">Collect Bulk Donation</a></li>
		<li><a href="collect_non_memb_don.php">Collect Non Member Donation</a></li>
		
	</ul>
</li>
                    

					
<li>
	<a href="#" data-toggle="collapse" data-target="#account_over"><i class="fa fa-money "></i></i> Income and Expenses <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="account_over" class="collapse">
		<li><a href="accounts_overview.php">Add Income and Expense</a></li>
		<li><a href="all_incomes.php">All Incomes</a></li>
		<li><a href="all_expense.php">All Expenses</a></li>
	</ul>
</li>

 <li>
		<a href="#" data-toggle="collapse" data-target="#confi"><i class="fa fa-cogs"></i> Configure Mahal <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="confi" class="collapse">
			<li><a href="configure_school.php"><i class="fa fa-fw fa-cog"></i> Configure Mahal</a></li>
			<li><a href="add_committee_name.php"><i class="fa fa-plus"></i> Add Committee Name</a></li>
			<li><a href="ad_members.php"><i class="fa fa-plus"></i> Add Admin</a></li>
			<li><a href="add_member_type.php"><i class="fa fa-plus"></i> Add Member Type</a></li>
			<li><a href="add_fee_name.php"><i class="fa fa-plus"></i> Add Fee Name</a></li>
			<li><a href="add_fee_type.php"><i class="fa fa-plus"></i> Add Fee Amount</a></li>
			
			<li><a href="add_addon_fee.php"><i class="fa fa-plus"></i> Add Addon Fee Type</a></li>
			<li><a href="add_income_name.php"><i class="fa fa-plus"></i> Add Income Name</a></li>
			<li><a href="add_expense_name.php"><i class="fa fa-plus"></i> Add Expense Name</a></li>
			
		</ul>
	</li>
					
	<li>
		<a href="#" data-toggle="collapse" data-target="#edit_confi"><i class="fa fa-pencil-square-o"></i> Edit Configration <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="edit_confi" class="collapse">
			<li><a href="mahals.php"><i class="fa fa-fw fa-cog"></i> Mahal Details</a></li>
			<li><a href="admins.php"><i class="fa fa-fw fa-cog"></i> Admins</a></li>
			 <li><a href="all_committee_name.php"><i class="fa fa-fw fa-cog"></i> All Committee Name</a></li>
			<li><a href="all_member_type.php"><i class="fa fa-fw fa-cog"></i> All Member Types</a></li>
			<li><a href="all_fee_name.php"><i class="fa fa-fw fa-cog"></i> All Fee Name</a></li>
			<li><a href="all_fee_type.php"><i class="fa fa-fw fa-cog"></i> All Fee Types</a></li>
			<li><a href="all_addon_fee.php"><i class="fa fa-fw fa-cog"></i> All Addon Fee Types</a></li>
			<li><a href="all_income_name.php"><i class="fa fa-fw fa-cog"></i> All Income Name</a></li>
			<li><a href="all_expense_name.php"><i class="fa fa-fw fa-cog"></i> All Expense Name</a></li>
			
			
		</ul>
	</li>
<li>
	<a href="#" data-toggle="collapse" data-target="#register"><i class="fa fa-plus"></i> Register / Add <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="register" class="collapse">
		<li><a href="register_member.php"><i class="fa fa-plus"></i> Add member</a></li>
		<li><a href="import_members.php"> <i class="fa fa-plus"></i> Import Bulk Members (CSV)</a></li>
		<li><a href="register_faculty.php"><i class="fa fa-plus"></i> Add Staff</a></li>
		<li><a href="import_faculty.php"><i class="fa fa-plus"></i> Import Staff (CSV)</a></li>
		<li><a href="add_adm_members.php"><i class="fa fa-plus"></i> Add Administrative Members</a></li>
		<li><a href="register_students.php"><i class="fa fa-plus"></i> Add Student</a></li>
		<li><a href="import.php"><i class="fa fa-plus"></i> Import Students (CSV)</a></li>
		<li><a href="<?php echo 'noc_certificate_details.php?non_member=non_member';?>"><i class="fa fa-plus"></i> Non Member Marriage NOC Receive Reg</a></li>
		<li><a href="<?php echo 'marriage_noc_details.php?non_member=non_member';?>"><i class="fa fa-plus"></i> Non member Marriage Certificate</a></li>
		<li><a href="meeting_reg.php"><i class="fa fa-plus"></i> Meeting Registration</a></li>
		<li><a href="institution_reg.php"><i class="fa fa-plus"></i> Institution Registration</a></li>
		<li><a href="welfare_reg.php"><i class="fa fa-plus"></i> Welfare Registration</a></li>
		<li><a href="complaint_reg.php"><i class="fa fa-plus"></i> Complaint Registration</a></li>
		<li><a href="prog_func_reg.php"><i class="fa fa-plus"></i> Program/Function Registration</a></li>
		<li><a href="trans_noc_reg.php"><i class="fa fa-plus"></i> Transfer of Mahal/House NOC Registration</a></li>
		<li><a href="banned_reg.php"><i class="fa fa-plus"></i> Banned Registration</a></li>
		<li><a href="divorce_reg.php"><i class="fa fa-plus"></i> Divorce Registration</a></li>
		<li><a href="death_reg.php"><i class="fa fa-plus"></i> Death Registration</a></li>
		<li><a href="qabar_reg.php"><i class="fa fa-plus"></i> Qabar Registration</a></li>
	</ul>
</li>
<li>
	<a href="#" data-toggle="collapse" data-target="#view"><i class="fa fa-eye"></i> View Registrations List <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="view" class="collapse">
		 <li><a href="all_members.php">View Members</a></li>
		<li><a href="all_committee_members.php">View Committee</a></li>
		 <li><a href="teach_staff.php">All Staff's</a></li>
		 <li><a href="all_students.php">All Students</a></li>
		  <li><a href="adm_members.php">Administrative Members</a></li>
		<li><a href="mar_noc_issue_reg.php">Marriage NOC Issued & Received</a></li>
		<li><a href="all_marriage_certificate.php">All Marriage Certificate </a></li>
		<li><a href="meeting_reg.php">Meetings</a></li>
		<li><a href="institution_reg.php">Institutions</a></li>
		<li><a href="welfare_reg.php">Welfare</a></li>
		<li><a href="complaint_reg.php">Complaints</a></li>
		<li><a href="prog_func_reg.php">Program/Functions</a></li>
		<li><a href="trans_noc_reg.php">Transfer of Mahal/House NOC issued</a></li>
		<li><a href="banned_reg.php">Banned List</a></li>
		<li><a href="divorce_reg.php">Divorce List</a></li>
		<li><a href="death_reg.php">Death Registered</a></li>
		<li><a href="qabar_reg.php">Qabar Registratered</a></li>
	</ul>
</li>

<li>
	<a href="#" data-toggle="collapse" data-target="#inventory"><i class="fa fa-cubes "></i></i> Inventory <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="inventory" class="collapse">
		<li>
			<a href="inventory.php">Add Inventory</a>
		</li>
		<li>
			<a href="all_inventory.php">All Inventory List</a>
		</li>
		
	</ul>
</li>
			
	
	 <li>
		<a href="javascript:;" data-toggle="collapse" data-target="#event"><i class="fa fa-fw fa-calendar"></i> Upcoming Events <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="event" class="collapse">
			<li>
				<a href="all_events.php">Upcoming Events</a>
			</li> 
			<li>
				<a href="up_holiday.php">Upcoming Holidays</a>
			</li>
			
			<li>
				<a href="up_events.php">Add Events</a>
			</li>
			<li>
				<a href="add_holiday.php">Add Holidays</a>
			</li>
			<li>
				<a href="events_all.php">All Events</a>
			</li>
			<li>
			   <a href="holidays.php">All Govt Holidays</a>
		   </li> 
		</ul>
	</li> 
	
</ul>
</div>
</nav>

