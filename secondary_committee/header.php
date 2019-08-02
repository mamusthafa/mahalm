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

    <title><?php echo "Swalath Committee";?></title>
	
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



</head>

<body class="body">

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
                <a class="navbar-brand" href="all_accounts_overview.php"><?php echo "Swalath Committee";?></a>
            </div>
            <!-- Top Menu Items -->
			
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
             
             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['second_uname']." : Committee Year ".$_SESSION['academic_year'];?> <b class="caret"></b></a>
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
<li><a href="all_accounts_overview.php"> <i class="fa fa-money "></i> Accounts Overview</a></li>	
<li>
	<a href="#" data-toggle="collapse" data-target="#account_over"><i class="fa fa-money "></i></i> Income and Expenses <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="account_over" class="collapse">
		<li><a href="accounts_overview.php">Add Income and Expense</a></li>
		<li><a href="all_incomes.php">All Incomes</a></li>
		<li><a href="all_expense.php">All Expenses</a></li>
	</ul>
</li>


</ul>
</div>
</nav>

