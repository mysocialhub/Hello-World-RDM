<?php 

/***************************************************************************************/
/* Database Start*/
/***************************************************************************************/

/* Attempt MySQL server connection */

//Connection details for my Wamp Server
$ser="localhost";
$user="root";
$pass="";
$dbn="receptiondesk_db";

$link = mysqli_connect($ser, $user, $pass, $dbn);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
// To protect MySQL injection (more detail about MySQL injection)
$Service = stripslashes($Service);
$Service = mysqli_real_escape_string($link, $_REQUEST['Service']);

$name = mysqli_real_escape_string($link, $_REQUEST['first_name']) . ' ' . mysqli_real_escape_string($link, $_REQUEST['last_name']) ;

$type = stripslashes($type);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);

$type_name = stripslashes($type_name);
$type_name = mysqli_real_escape_string($link, $_REQUEST['type_name']);

// attempt insert query execution
$sql = "INSERT INTO queue (Type, TypeName, Name, Service) VALUES ('$type', '$type_name', '$name', '$Service')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add to Queue Form handler</title>
</head>

<body>
<!-- This page is displayed only if there is an error -->
<?php
header('Location: desk.php');
//echo nl2br($errors);

?>

</body>
</html>