<?php
session_start();
include_once("../include/config.php");

// Get id from URL to delete child
$myKID = $_GET['id'];
// Get sid from URL to delete subject 
if(isset($_GET['sid'])) {
  $sid =  $_GET['sid'];
  
  $delsubject = mysqli_query($conn, "DELETE FROM subject_enroll WHERE myKID='$myKID' AND subjectID = '$sid'");
  echo '<script type="text/javascript">alert("Subject Record Deleted");window.location.href="parentView.php";</script>';	
  	
}
// else{
//   // Delete child row from table based on given id
//   $delchild = mysqli_query($conn, "DELETE FROM child WHERE myKID='$myKID'");
//   echo '<script type="text/javascript">alert("Child Record Deleted");window.location.href="http://localhost/mininursery/parent/parentView.php";</script>';		
// }
?>