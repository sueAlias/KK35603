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
		<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Create</p>
	</div>
	<form action="parentAdd.php" method="post" name="form1" style="margin: 15px;">
		<fieldset>
			<legend><strong>Parent Information</strong></legend>
			<table width="30%" border="0">
				<tr>
					<td>Parent IC</td>
					<td><input type="text" name="parentIC" maxlength="12" required pattern="[0-9]+"> *without -</td>
				</tr>
				<tr>
					<td>Parent Name</td>
					<td><input type="text" name="parentName" required>
				</td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><input type="tel" name="contactNum" placeholder="123-1234567" pattern="[0-9]{3}-[0-9]{7}"
							maxlength="11" required></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong>Child Information</strong></legend>
			<table width="40%" border="0">
				<tr>
					<td>MyKID </td>
					<td><input type="text" name="myKID" maxlength="12" required pattern="[0-9]+"> *without -</td>
				</tr>
				<tr>
					<td>Child Name &nbsp;</td>
					<td><input type="text" name="childName" required></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><input type="radio" name="gender" value="Male">&nbsp;Male <input type="radio" name="gender"
							value="Female" required>&nbsp;Female</td>
				</tr>
				<tr>
					<td>Class</td>
					<td><input type="radio" name="classID" value="1">&nbsp;1 Alpha (5 yrs) <input type="radio" name="classID"
							value="2" required>&nbsp;2 Beta (6 yrs) <input type="radio" name="classID"
							value="3" required>&nbsp;Preschool (2-4 yrs) </td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend><strong>Subject Information</strong></legend>
			<table width="30%" border="0">
				<tr>
					<td><input type="checkbox" id="subjectID" name="subject[]" value="1"></td>
					<td>Let's count 1, 2, 3</td>
					<td><input type="checkbox" id="subjectID" name="subject[]" value="2"></td>
					<td>Science and Me</td>
				</tr>
				<tr>
					<td><input type="checkbox" id="subjectID" name="subject[]" value="3"></td>
					<td>Sing along DO, RE, ME</td>
					<td><input type="checkbox" id="subjectID" name="subject[]" value="4"></td>
					<td>Spell it Right</td>
				</tr>
			</table>
		</fieldset>
		<p style="margin: 15px;"><input type="submit" name="Submit" value="Add Record"> <input type="Reset"></p>
	</form>

	<?php
	// Check If form submitted, insert form data into parent and child table.
	if (isset($_POST['Submit'])) {
		$parentIC = $_POST['parentIC'];
		$parentName = $_POST['parentName'];
		$contactNum = $_POST['contactNum'];
		$myKID = $_POST['myKID'];
		$childName = $_POST['childName'];
		$gender = $_POST['gender'];
		$classID = $_POST['classID'];
		$createdBy = $_SESSION["UID"];
		$userID = $_SESSION["UID"];

		//Insert parent data into table
		$insParent = mysqli_query($conn, "INSERT INTO parent(parentIC, parentName, contactNum, createdBy, userID)
		VALUES('$parentIC','$parentName','$contactNum', '$createdBy', '$userID')");

		//Insert child data into table
		$insChild = mysqli_query($conn, "INSERT INTO child(myKID,childName,parentIC,gender,classID) 
		 VALUES('$myKID','$childName','$parentIC','$gender', '$classID')");

		//Insert subject enrolled by child 
		if (!empty($_POST['subject'])) {
			foreach ($_POST['subject'] as $sid) {
				//echo "value : ".$sid.'<br/>';
				$insSubj = mysqli_query($conn, "INSERT INTO subject_enroll(myKID, subjectID) 
				VALUES ('$myKID','$sid')");
			}
		}

		// !$insChild || catch any error during record insertion
		if (!$insParent || !$insChild) {
			// query failed
			$error = mysqli_error($conn);
			echo "<strong>Error: $error</strong>";
		} else {
			// query successful
			echo "<p style='margin: 15px;'><strong>Registration added successfully. <a href='parentView.php?id=$myKID'>View Detail</a> </strong><p/>";
		}
	}
	?>
</body>

</html>