<?php
session_start();
include_once("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $classroom = $_POST['classroom'];
    $attendanceDate = $_POST['attendanceDate'];
    $attendance = isset($_POST['attendance']) ? $_POST['attendance'] : [];   

    // Insert attendance data into the database
    $sql = "INSERT INTO class_attendance (classID, attendanceDate, myKID) VALUES ";
    foreach ($attendance as $myKID) {
        $sql .= "('$classroom', '$attendanceDate', '$myKID'),";
    }
    $sql = rtrim($sql, ','); // Remove the trailing comma
    mysqli_query($conn, $sql);

    // You can add additional logic or redirect the user after processing the form
    echo "Attendance recorded successfully!";
}
?>
