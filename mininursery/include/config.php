<?php
/**
 * using mysqli_connect for database connection
 */
//Development//
$databaseHost = 'localhost';
$databaseUsername = 'webadmin';//change to root
$databasePassword = 'webadmin123';//change to root pwd
$databaseName = 'nurserydb';
$url = "http://localhost/mininursery"; 
define('BASE_URL', 'http://localhost/mininursery');

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>
