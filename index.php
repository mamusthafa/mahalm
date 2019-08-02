<?php
	require("header.php");
	?>
    <main>
        <!--Main layout-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h1-responsive">Welcome to <?php echo $sch_name;?></h1>
                </div>
            </div>
            <hr>

            <!--First row-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/admin1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Admin</h4>
                            <p class="card-text">Main admin login.Manage everything.</p>
                            <a href="mahal/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
                <!--/.First column-->

                <!--Third column-->
                <div class="col-lg-6">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/parents2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Members Module</h4>
                            <p class="card-text">View Members Details</p>
                           <a href="members/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
            </div>
			
			<div class="row">
                <div class="col-lg-6">
                    <div class="z-depth-4">
                        <img class="img-fluid" src="images/newfolder/committee.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Swalath Committee</h4>
                            <p class="card-text">Swalath Committee Login.</p>
                            <a href="secondary_committee/login.php" target="blank" class="btn btn-primary z-depth-3">LOGIN</a>
                        </div>

                    </div>
                </div>
                <!--/.First column-->

            </div>
	
        </div>
        <!--/.Main layout-->
    </main>

    <?php
	require("footer.php");
	?>