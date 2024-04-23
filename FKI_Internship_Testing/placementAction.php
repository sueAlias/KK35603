<?php
session_start();
include "config.php";
$action = $_GET["action"];

$c_name = $_POST["co_name"];
$c_state = $_POST["co_state"];
$c_add = $_POST["co_address"];
$c_sv = $_POST["co_supervisor"];
$c_email = $_POST["co_email"];
$c_date = $_POST["co_date"];

echo htmlspecialchars($action)."<br>";
echo $c_name."<br>";
echo $c_state."<br>";
echo $c_add."<br>";
echo $c_sv."<br>";
echo $c_email."<br>";
echo $c_date."<br>";

if($action=="insert"){
	//insert new registration into table user
	$sql = "INSERT INTO placement (email_address, co_name, co_state, co_address,co_supervisor,co_sv_email,start_date)
	VALUES ('".$_SESSION["email"]."','" . $c_name . "','" . $c_state . "','" . $c_add . "','".$c_sv ."','" . $c_email. "','".$c_date. "')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
		header("location:student.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
else if($action=="update"){
	$sql = "UPDATE placement SET co_name='$c_name',co_state='$c_state', 
		co_address='$c_add', co_supervisor='$c_sv', co_sv_email='$c_email', start_date='$c_date' WHERE email_address = '".$_SESSION["email"]."'";

	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
		header("location:student.php");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>
