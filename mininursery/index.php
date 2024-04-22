<?php
/**
 * CRUD Mini ChildCare System Demo by Sue Alias (2023)
 **/
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
    <!-- Login Popup -->
    <div id="login-popup" class="login-popup">
        <span class="close-btn" onclick="closeLoginPopup()">&times;</span>
        <h3>User Login </h3>
        <form action="userAuth/login_action.php" method="post">
            <label for="userEmail">User Email:</label><br>
            <input type="email" id="userEmail" name="userEmail" required><br><br>
            <label for="userPwd">Password:</label><br>
            <input type="password" id="userPwd" name="userPwd" required maxlength="8" autocomplete="off"><br><br>
            <input type="submit" value="Login">
            <input type="reset" value="Reset"></br>
        </form>
        
        <p><a href="javascript:void(0);" onclick="openRegPopup();">| Registration </a> | Forgot Password |</p>
    </div>
    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closeLoginPopup();"></div>

    <!-- Registration Popup -->
    <div id="reg-popup" class="reg-popup">
        <span class="close-btn" onclick="closeRegPopup()">&times;</span>
        <h3>User Registration </h3>
        <form action="userAuth/register_action.php" method="post">
            <label for="reguserName">Username:</label><br>
            <input type="text" id="reguserName" name="userName" required><br><br>
            <label for="reguserEmail">User Email:</label><br>
            <input type="email" id="reguserEmail" name="userEmail" required><br><br>
            <label for="reguserPwd">Password:</label><br>
            <input type="password" id="reguserPwd" name="userPwd" required maxlength="8"><br><br>
            <label for="regconfirmPwd">Confirm Password:</label><br>
            <input type="password" id="regconfirmPwd" name="confirmPwd" required><br><br>
            <input type="submit" value="Register">
            <input type="reset" value="Reset"></br>
        </form>
    </div>
    <!-- Overlay -->
    <div id="overlay" class="overlay" onclick="closeRegPopup()"></div>
   
    <div class="content">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/kids3.jpg" class="d-block" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="img/kids2.jpg" class="d-block" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="img/kids1.jpg" class="d-block" alt="Image 2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="content" style="text-align: center;">
        *This demo system was developed for teaching
        and learning purposes in the database and web programming subject.
    </div>   
    <script>        
        function openLoginPopup() {
            document.getElementById("login-popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }
        function closeLoginPopup() {
            document.getElementById("login-popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
        function openRegPopup() {
            document.getElementById("reg-popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }
        function closeRegPopup() {
            document.getElementById("reg-popup").style.display = "none";
            document.getElementById("login-popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>

</html>