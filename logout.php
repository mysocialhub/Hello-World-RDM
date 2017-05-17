<?php

session_start();
if(session_destroy()) // Destroy All Sessions
{
header("Location: index.php"); // Redirect To Home Page
}
?>