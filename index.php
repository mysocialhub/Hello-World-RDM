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

    <!-- RECEPTION DESK ADMIN-->
    <section id="contact" class="section text-center">
        <div class="container">
            <h2 class="section-title">ADMIN LOGIN</h2>
                <div class="row">

                <!-- LOGIN FORM -->
<?php
//	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($db,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($db,$password);
		
		//Checking is user exists in the database or not
        $query = "SELECT * FROM `login` WHERE email='$email' and password='".$password."'";
		$result = mysqli_query($db,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $rows['$id'];
			header("Location: desk.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
				}
    }else{
?>
<div class="col-md-3 col-md-offset-1 text-left wow fadeInLeft" data-wow-duration="1s">
</div>
<div class="col-md-3 col-md-offset-1 text-left wow fadeInLeft" data-wow-duration="1s">
<div class="form-group">
<form action="" method="post" name="login">
<div  class="form-group">
<input type="text" required class="form-control" name="email" placeholder="email" />
	</div>
	<div  class="form-group">
<input type="password" required class="form-control" name="password" placeholder="Password" />
	</div>
	<input name="submit" required class="pull-left send-button button" type="submit" value="Login" />
</form>
</div>
					</div>
<div class="col-md-3 col-md-offset-1 text-left wow fadeInLeft" data-wow-duration="1s">
</div>
                <?php } ?>                <!-- END LOGIN FORM -->

            </div>
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
