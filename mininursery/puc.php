<?php
session_start();
include_once("include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Munchkin Childcare System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/w3.css"> 
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="logo"></div>
        <div class="userAuth">
            <?php
            include("include/userNav.php");
            ?>
        </div>
    </div>
    <nav class="topnav">
        <?php
        include("include/topNav.php");
        ?>
    </nav>
<div class="row">
<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Page Under Construction</p>
</div>
    
</body>
</html>