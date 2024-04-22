<!-- Page content row -->
<?php
session_start();
include_once("../include/config.php");
//Retrieve data from view table nurseryview
$childrec = mysqli_query($conn, "SELECT * FROM nurseryview ORDER BY childName ASC");
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
<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Records Summary</p>
<div class="row" style="overflow-x:auto;">
    <!--style="margin: 0 0px 0 10px; <table cellpadding="10" cellspacing="1" id="carttable" width="60%" style="margin: 0 10px 0 10px;"> -->
    <!-- style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15% -->
    <table width="100%" id="carttable" style="margin: 0 10px 0 10px;>
        <tr id="carttable tr">
            <th id ="carttable th">Child Name</th>
            <th>MyKid</th>
            <th>Parent Name</th>
            <th>Action</th>
        </tr>
        <?php
        while ($child_data = mysqli_fetch_array($childrec)) {
            echo "<tr>";
            echo "<td>" . $child_data['childName'] . "</td>";
            echo "<td>" . $child_data['myKID'] . "</td>";
            echo "<td>" . $child_data['parentName'] . "</td>";            
            echo "<td><a href='viewDetail.php?id=$child_data[myKID]'>View Detail</a></td></tr>";
        }
        ?>
    </table>
</div> <!--  Page content row -->
<!-- End page content </div>-->