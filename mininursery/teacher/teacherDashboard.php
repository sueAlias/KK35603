<!-- Page content row -->
<?php
session_start();
include_once("../include/config.php");

//Retrieve data from tables
$childrec = mysqli_query($conn, "SELECT COUNT(myKID) as countGen, gender FROM child GROUP BY gender");
$parentrec = mysqli_query($conn, "SELECT COUNT(userName) as countUser FROM user WHERE userRoles = '2'");
$attendanceRec = mysqli_query($conn, "SELECT attendanceDate, COUNT(myKID) as countKid, classID FROM class_attendance 
WHERE attendanceDate = CURDATE() GROUP BY attendanceDate, classID");

$userRow = mysqli_fetch_array($parentrec);
$countUser = $userRow['countUser'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Munchkin Childcare System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <div class="logo"></div>
        <div class="userAuth">
            <?php
            include("../include/userNav.php");
            ?>
        </div>
    </div>
    <nav class="topnav">
        <?php
        include("../include/topNav.php");
        ?>
    </nav>
    <p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Dashboard</p>
    <div class="row" style="overflow-x:auto;">
        <table width="100%" id="carttable" style="margin: 0 10px 0 10px;>
        <tr id="carttable tr">
            <th id="carttable th" style='text-align: center'>Number of Parents</th>
            <th style='text-align: center'>Number of Childrens</th>
            <th style='text-align: center'>Number of Teachers</th>
            <th style='text-align: center'>Class Attendance</th>
        </tr>
            <?php
            echo "<tr>";
            echo "<td style='text-align: center;'><strong>$countUser<strong></td>";
            echo "<td style='text-align: center;'>";
            while ($child_data = mysqli_fetch_array($childrec)) {
                echo "<strong>" . $child_data['countGen'] . " </strong>" . $child_data['gender'] . "<br>";
            }
            //echo $rowcount;
            echo "</td>";
            echo "<td style='text-align: center;'><strong>4</strong></td>";
            echo "<td style='text-align: center;'>";
            while ($att_data = mysqli_fetch_array($attendanceRec)) {
                if ($att_data['classID'] == 1) {
                    $className = '1 Alpha';
                } else {
                    $className = '2 Beta';
                }
                $attDate = $att_data['attendanceDate'];
                // Convert the string to a DateTime object
                $dateObject = new DateTime($attDate);
                echo date_format($dateObject, "d/m/Y") . ' - ' . $att_data['countKid'] . " students - " . ' (' . $className . " )<br>";
            }
            echo "</td>";
            ?>
        </table>
    </div> <!--  Page content row -->
    <!-- End page content </div>-->
    </html>