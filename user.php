<?php 
include("db.php"); //include auth.php file on all secure pages 
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
    FROM `queue` WHERE Seen = 0
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


    <!-- RECEPTION DESK -->
    <section id="contact" class="section text-center">
        <div class="container">
            <h2 class="section-title">QUEUE - customer view</h2>
                <div class="row">

                <!-- LIST QUEUE -->
                    <div class="contact-info text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                        <h3>current LIST</h3>
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
  </tr>
<?php 
		
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		//Service connection/Retrieval
	//Connection details for my Wamp Server
$ser="localhost";
$user="root";
$pass="";
$dbn="receptiondesk_db";
		
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
		
		if ($row["Type"]=='Anonymous') {
			$TypeName = '';
			$Name = '';
			$Service = '';
		}

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
	  <td><?php echo $row["ID"]; ?></td>
	  <td><?php echo $row["Type"]; ?></td>
	  <td><?php echo $Name . '' . $TypeName; ?></td>
	  <td><?php echo $_row["Service"] ?></td>
	  <td><?php echo $row["QueuedAt"]; ?></td>
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
                <!-- END QUEUE LIST -->

        </div>
    </section>
    <!-- END RECEPTION DESK -->

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">

                <!-- FOOTER MENU -->
                <div class="col-md-6">
                    <div class="footer-menu">
                        <ul class="list-inline">
                            <li><a href="desk.php">Admin</a>
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
