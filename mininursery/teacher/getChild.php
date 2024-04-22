<?php
session_start();
include_once("../include/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classroom = $_POST['classroom'];

    // Fetch children based on the selected classroom
    $sql = "SELECT myKID, childName FROM child WHERE classID = '$classroom'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<label><strong>Children List:</label></strong><br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<input type='checkbox' name='attendance[]' value='" . $row['myKID'] . "'> " . $row['childName'] . "<br>";
        }
    } else {
        echo "Error fetching children.";
    }
}
?>
