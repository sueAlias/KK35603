<?php
session_start();
include_once("../include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Munchkin Childcare System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    <!-- Load font and icon library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
<body>
<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Attendance</p>
    <!-- <h2>Daily Attendance Form</h2> -->
    <div class="row" style="margin: 15px;"> 
    <form action="attendance_action.php" method="post" id="attendanceForm">
        <label for="classroom">Select Classroom:</label>
        <select name="classroom" id="classroom" required>
            <option value="">- Select Class -</option>
            <option value="1">1 Alpha</option>
            <option value="2">2 Beta</option>
            <!-- Add more options as needed -->
        </select>

        <label for="date">Date:</label>
        <input type="date" name="attendanceDate" id="attendanceDate" required>
        <button type="submit">Submit Attendance</button>
        <!-- Children list will be dynamically populated here -->
        <!-- <label>Children Attendance:</label> -->
        <div id="childrenList"></div>

       
    </form>
</div> 
    <script>
        $(document).ready(function() {
            $('#classroom').change(function() {
                var classroom = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getChild.php', // PHP script to fetch children based on the classroom
                    data: { classroom: classroom },
                    success: function(response) {
                        $('#childrenList').html(response);
                    }
                });
            });
        });
    </script>

</body>
</html>
