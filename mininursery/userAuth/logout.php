<?php
session_start();
include_once("../include/config.php");

if(isset($_SESSION["UID"])){
	unset($_SESSION["UID"]);
	unset($_SESSION["userName"]);	
	header('Location: ' . BASE_URL . '/index.php');
}	
?>