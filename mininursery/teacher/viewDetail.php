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
    <div class="row">
        <p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / View</p>
    </div>

    <?php
    $myKID = $_GET['id'];
    // Retrieve parent-child-subject data from database
    $childrec = mysqli_query($conn, "SELECT child.childName, child.myKID, parent.parentName, parent.parentIC 
FROM child, parent 
WHERE parent.parentIC = child.parentIC AND child.myKID = '$myKID'");

    $subjetrec = mysqli_query($conn, "SELECT c.childName, s.subjectName, s.subjectTeacher, 
se.id, s.subjectID 
FROM child as c, subject as s, subject_enroll as se
WHERE c.myKID = '$myKID' AND c.myKId = se.myKID AND s.subjectID =  se.subjectID 
ORDER BY se.subjectID ASC");

    if (!$childrec) {
        // query failed
        $error = mysqli_error($conn);
        echo "Error: $error";
    } else {
        // query was successful
        // do something with the data
    }

    while ($child_data = mysqli_fetch_array($childrec)) {
        $childName = $child_data['childName'];
        $myKID = $child_data['myKID'];
        $parentName = $child_data['parentName'];
        $parentIC = $child_data['parentIC'];
    }
    ?>
    <!-- Page content row -->
    <div class="row" style="margin: 15px;">
        <table border="0">
            <tr>
                <td>MyKID</td>
                <td>:
                    <?php echo $myKID; ?>
                </td>
            </tr>
            <tr>
                <td>Child Name</td>
                <td>:
                    <?php echo $childName; ?>
                </td>
            </tr>
            <tr>
                <td>Parent Name</td>
                <td>:
                    <?php echo $parentName; ?>
                </td>
            </tr>
            <tr>
                <td>Parent IC</td>
                <td>:
                    <?php echo $parentIC; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row" style="overflow-x:auto;">
        <table width="100%" id="carttable" style="margin: 0 10px 0 10px;>
    <tr id=" carttable tr">
            <th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;"
                width="15%">Enrolled Subjects</th>
            <th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;"
                width="15%">Teacher Name</th>
            <th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;"
                width="15%">Action</th>
            </tr>
            <?php
            while ($child_subject = mysqli_fetch_array($subjetrec)) {
                echo "<tr>";
                echo "<td>" . $child_subject['subjectName'] . "</td>";
                echo "<td>" . $child_subject['subjectTeacher'] . "</td>";
                echo "<td><a href='teacherDelete.php?sid=$child_subject[subjectID]&id=$myKID'>Delete</a></td></tr>";
            }
            if (mysqli_num_rows($subjetrec) == 0) {
                echo "<tr>";
                echo "<td colspan = '3'>" . "*No subjects found" . "</td></tr>";
            }
            ?>
        </table>
    </div> <!--  Page content row -->
    <p style="margin: 15px;text-align: right;"><a href='javascript:history.go(-1)'><strong>Go Back</strong></a></p>
</body>

</html>