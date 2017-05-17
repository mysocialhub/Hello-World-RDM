<?php 
include("db.php"); //include auth.php file on all secure pages 
include("auth.php"); //include auth.php file on all secure pages 
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>Reception Desk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts - which you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>

<?php

if($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = <<<SQL
    SELECT *
    FROM `queue` WHERE seen = 0
	ORDER BY `ID` ASC
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

?>

<body id="top">
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade ybrowser</a> to improve your experience.</p>
    <![endif]-->

    <header>
        <!-- NAVIGATION -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <a class="navbar-brand page-scroll" href="#page-top">
                    Reception <strong><font color="#24c0d9">Desk</font></strong> v1.0 </a>
                    <!-- END LOGO -->

                </div>

                <!-- TOGGLE NAV -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li><a class="page-scroll" href="desk.php#top">Admin</a>
                        </li>
                        <li><a class="page-scroll" href="user.php#services">User</a>
                        </li>
                        <li><a class="page-scroll" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- TOGGLE NAV -->

            </div>
            <!-- /.container -->
        </nav>
        <!-- END NAVIGATION -->
    </header>

    <!-- DESK FORM -->
    <section id="desk" class="section text-center">
        <div class="container">
            <h2 class="section-title">Admin QUEUE management</h2>
                <div class="row">

                <!-- POPULATE FORM -->
		   <style type="text/css">
			.box{
				color: #fff;
				padding: 10px;
				display: none;
				margin-top: 10px;
			}
			.citizen{ background: #ffffff; }
			.Organisation{ background: #ffffff; }
			.Anonymous{ background: #ffffff; }
			label{ margin-right: 5px; }
		</style>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="radio"]').click(function(){
				var inputValue = $(this).attr("value");
				var targetBox = $("." + inputValue);
				$(".box").not(targetBox).hide();
				$(targetBox).show();
			});
		});
		</script>
		</head>
		<body>
		<div class="col-md-3 col-md-offset-1 text-left wow fadeInLeft" data-wow-duration="1s">
		  <div class="form-group">
			<div>
			  <h3>ADD NEW CUSTOMER</h3>
				<label><input type="radio" name="colorRadio" value="Organisation"> Citiizen</label>
				<label><input type="radio" name="colorRadio" value="citizen"> Organisation</label>
				<label><input type="radio" name="colorRadio" value="Anonymous"> Anonymous</label>
			</div>
			</div>

			<!------------------------------------->		
			<!-- Add Anonynous Customer to Queue -->		
			<!------------------------------------->		
			<div class="Anonymous box">
			<form action="add_to_queue.php" method="post">
				<input name="first_name" type="hidden" value="">
				<input name="last_name" type="hidden" value="">
				<input name="type" type="hidden" value="Anonymous">
				<input name="type_name" type="hidden" value="">
			<div class="form-group">
			<select name="Service" class="form-control" id="Service">
				<option select="selected"  value="" >-Select Service-</option>
				<option value="1" >Housing</option>
				<option value="2" >Benefits</option>
				<option value="3" >Council Tax</option>
				<option value="4" >Fly-Tipping</option>
				<option value="5" >Missed Bin</option>
			</select>
			</div>
			<div class="form-group"></div>
			<button type="submit" class="pull-left send-button button">Submit</button>
			</form>
		    </div>

			<!------------------------------------->		
			<!-- Add Citizen Customer to Queue -->		
			<!------------------------------------->		
			<div class="Organisation box">
			<form action="add_to_queue.php" method="post">
				<input name="type" type="hidden" value="Citizen">
				<input name="type_name" type="hidden" value="">
				<div class="form-group">
			<select name="Service" class="form-control" id="Service">
				<option select="selected"  value="" >-Select Service-</option>
				<option value="1" >Housing</option>
				<option value="2" >Benefits</option>
				<option value="3" >Council Tax</option>
				<option value="4" >Fly-Tipping</option>
				<option value="5" >Missed Bin</option>
			</select>
				</div>

			<div class="form-group">
				<input name="first_name" type="text" required class="form-control" id="FirstName" placeholder="First Name" value="">
			</div>

			<div class="form-group">
				<input name="last_name" required class="form-control" id="last_name" placeholder="Last name" value="" />
			</div>

			<button type="submit" class="pull-left send-button button">Submit</button>
			</form>
			</div>

			<!------------------------------------->		
			<!-- Add Organisation Customer to Queue -->		
			<!------------------------------------->		
			<div class="citizen box">
			<form action="add_to_queue.php" method="post">
				<input name="type" type="hidden" value="Organisation">
				<div class="form-group">
			<select name="Service" class="form-control" id="Service">
				<option select="selected"  value="" >-Select Service-</option>
				<option value="1" >Housing</option>
				<option value="2" >Benefits</option>
				<option value="3" >Council Tax</option>
				<option value="4" >Fly-Tipping</option>
				<option value="5" >Missed Bin</option>
			</select>
				</div>

			<div class="form-group">
				<input name="first_name" type="text" required class="form-control" id="FirstName" placeholder="First Name" value="">
			</div>

			<div class="form-group">
				<input name="last_name" required class="form-control" id="last_name" placeholder="Last name" value="" />
			</div>

			<div class="form-group">
				<input name=type_name required class=form-control id=type_name placeholder=Organisation&nbsp;Name value=>
			</div>

			<button type="submit" class="pull-left send-button button">Submit</button>
		</form>
		</div>
		</div>
                <!-- END POPULATE FORM -->

                <!-- LIST -->
                <div class="col-md-7">
                    <div class="contact-info text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                        <h3>CURRENT LIST - <a href="admin.php">CLick to view historic list</a></h3>
                      <style>th {
							background-color: #24c0d9;
							color: white;		
						}
						tr:hover {background-color: #f5f5f5}
						th, td {
							padding: 15px;
							text-align: left;
						}
						</style>
                        <div style="overflow-x:auto;">
						<table width ="100%" class="w3-table w3-margin-top w3-margin-bottom w3-striped w3-bordered"><tr>
						  <th>#</th>
						  <th>Type</th>
						  <th>Name</th>
						  <th>Service</th>
						  <th>Queued at</th>
						  <th>Edit</th>
						  </tr>
						<?php 

							if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {

								$TypeName = $row["TypeName"];

								if ($row["TypeName"]!='') {
									$TypeName = ' ('.$row["TypeName"].')';
								}
								else {
									$TypeName = '';
								}

								$Type = $row["Type"];
								$Name = $row["Name"];
								$Service = $row["Service"];

						//-------------------------------------------------------------------
						//Pull Service Field from Services Table
						$_con=mysqli_connect("localhost","root","","receptiondesk_db");
						// Check connection
						if (mysqli_connect_errno())
						  {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						  }
						$_sql='SELECT * FROM service WHERE ID = "'.$row["Service"].'"';
						$_result=mysqli_query($_con,$_sql);

						// Associative array
						$_row=mysqli_fetch_array($_result,MYSQLI_ASSOC);

						// Free result set
						mysqli_free_result($_result);

						mysqli_close($_con);
						//-------------------------------------------------------------------

							?>
						<tr>
						  <td><a href="edit.php?rowID=<?php echo $row["ID"]; ?>"><?php echo $row["ID"]; ?></a></td>
						  <td><?php echo $row["Type"]; ?></td>
						  <td><?php echo $Name . '' . $TypeName; ?></td>
						  <td><?php echo $_row["Service"]; ?></td>
						  <td><?php echo $row["QueuedAt"]; ?></td>
						  <td><a href="edit.php?rowID=<?php echo $row["ID"]; ?>"><i class="fa fa-1x fa-cog wow bounceIn text-primary" data-wow-delay=".2s"></i></a></td>
						  </tr>
						  <?php
								 }
						} else {
							echo "0 results";
						}
							?></table>
				</div>
                      
                    </div>
                    <div class="business-hours text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">
                    </div>
                </div>
                <!-- END LIST -->

            </div>
        </div>
    </section>
    <!-- END DSK US -->

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">

                <!-- FOOTER MENU -->
                <div class="col-md-6">
                    <div class="footer-menu">
                        <ul class="list-inline">
                            <li><a href="admin">Admin</a>
                            </li>
                            <li><a href="user.php">User</a>
                            </li>
                            <li><a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END FOOTER MENU -->

                <!-- FOOTER CONTENT -->
                <div class="col-md-6">
                    <div class="footer-content text-right">
                        <p>&copy; 2017 All Rights Reserved, <a href="#">Reception Desk App</a>
                        </p>
                    </div>
                </div>
                <!-- END FOOTER CONTENT -->

            </div>
            <!-- /.row -->
        </div>
        <!-- ./container -->
    </footer>
    <!-- END FOOTER -->

    <!-- js files -->
    <script src="js/vendor/jquery-1.10.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
