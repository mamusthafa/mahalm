
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
	<script src="jquery.min.js"></script>
	
   <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="typeahead.min.js"></script>
	<!-- include summernote css/js-->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>

<script>
    $(document).ready(function(){
    $('input.typeahead_memb').typeahead({
        name: 'typeahead_member',
        remote:'search.php?key=%QUERY',
        limit : 20
    });
});
</script>
<script>
    $(document).ready(function(){
    $('input.typeahead_student').typeahead({
        name: 'typeahead_student',
        remote:'search_st.php?key=%QUERY',
        limit : 20
    });
});
</script>
	
	<script>
    $(document).ready(function(){
    $('input.typeahead_book').typeahead({
        name: 'book_name',
        remote:'search_book.php?key=%QUERY',
        limit : 20
    });
});
    </script>
	
	
	
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
	
	<link rel="stylesheet" href="smoothness/jquery-ui.css">
	<!------wysiwyg------------------------------>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">

    $(function () {

        $("input[name='merit_sts']").click(function () {

            if ($("#chkYes").is(":checked")) {

                $("#dvMarried").show();

            } else {

                $("#dvMarried").hide();

            }

        });

    });

</script>




<script>
function printDiv(timetable) {
     var printContents = document.getElementById('timetable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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

<script src="file.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_timetable.php?class="+str,true);
        xmlhttp.send();
    }
}

$(function() {
    $( "#name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( ".first_name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( "#book_name" ).autocomplete({
        source: 'search_books.php'
    });
});

$(function() {
    $( "#roll_no" ).autocomplete({
        source: 'searchid.php'
    });
});
</script>

 <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("subject").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Subject " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "subject" + i;
                input.class = "form-control";
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
	
	
	<script type='text/javascript'>
        function addExams(){
            // Number of inputs to create
            var number = document.getElementById("exams").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Exam Name  " + (i+1)+ " "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "exams" + i;
                input.class = "form-control";
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
	
	
	
	<script>
function goBack() {
    window.history.back();
}
</script>
<script>
var s = document.createElement('script'); s.setAttribute('src','http://developer.quillpad.in/static/js/quill.js?lang=Kannada&key=16d7aa60d85914d3f362710f2d7b92a5'); s.setAttribute('id','qpd_script'); document.head.appendChild(s);
</script>

<style>
a:hover {

   cursor: pointer;

   background-color: yellow;

}

</style>
<link href="style_loading.css" rel="stylesheet">
<script>
	window.addEventListener("load",function(){
		var load_screen= document.getElementById("load_screen");
		document.body.removeChild(load_screen);
		});
</script>
</head>

<body class="body">

<div id="load_screen">
<div id="loading">Loading</div>
</div>
    <div id="wrapper">
	
	

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
			<ul class="nav navbar-right top-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['parents_uname'];?><b class="caret"></b></a>
				
			</li>
			</ul>
			
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
		<li><a href="description.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a></li>
		<li><a href="cont_mahal.php"><i class="fa fa-fw fa-dashboard"></i> Inbox</a></li>
		<li><a href="send_application.php"><i class="fa fa-fw fa-dashboard"></i> Applications</a></li>
		<li><a href="logout.php"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>

		<li><a href="all_committee_members.php"><i class="fa fa-users" aria-hidden="true"></i> Committee Members</a></li>
		<li><a href="teach_staff.php"><i class="fa fa-users" aria-hidden="true"></i> All Staff's</a></li>

	</ul>
	</div>
	</nav>

