<?php 

/***************************************************************************************/
/* Database Start*/
/***************************************************************************************/

$ser="localhost";
$user="root";
$pass="";
$db="receptiondesk_db";

// Create connection
$conn = new mysqli($ser, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Form data collection

$Type = mysqli_real_escape_string($conn, $_REQUEST['Type']);
$TypeName = mysqli_real_escape_string($conn, $_REQUEST['TypeName']);
$Name = mysqli_real_escape_string($conn, $_REQUEST['Name']); 
$Service = mysqli_real_escape_string($conn, $_REQUEST['Service']); 
$Seen = mysqli_real_escape_string($conn, $_REQUEST['Seen']); 
$SeenAt = mysqli_real_escape_string($conn, $_REQUEST['SeenAt']); 
$SeenBy = mysqli_real_escape_string($conn, $_REQUEST['SeenBy']); 
$rowID = mysqli_real_escape_string($conn, $_REQUEST['rowID']); 

$sql = "UPDATE QUEUE SET 
Type = '$Type', TypeName = '$TypeName', Name = '$Name', Service = '$Service', Seen = '$Seen', SeenAt = '$SeenAt', SeenBy = '$SeenBy' WHERE ID='$rowID'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
<!DOCTYPE HTML> 
<html>
<head>
	<title>Update Employee Form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
header('Location: desk.php');
//echo nl2br($errors);

?>


</body>
</html>