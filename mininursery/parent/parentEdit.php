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
<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Edit</p>
</div>

<?php
// Check if form is submitted for user update, then redirect to index after update
if(isset($_POST['update']))
{	
	$myKID = $_POST['myKID'];	
	$childName=$_POST['childName'];
		
	// update user data
	$result = mysqli_query($conn, "UPDATE child SET childName='$childName' WHERE myKID=$myKID");
	
	if (!$result) {
		// query failed
		$error = mysqli_error($conn);
		echo "Error: $error";
	  } else {
		// Alert msg query was successful, redirect to homepage to display updated childname
		echo '<script type="text/javascript">alert("Child Record Updated");window.location.href="' . BASE_URL . '/parent/parentView.php";</script>';		
	  }
}
?>
<?php
// Display selected child data based on id
// Getting id from url
$myKID = $_GET['id'];

$result = mysqli_query($conn,"SELECT myKID, childName  FROM child WHERE myKID = $myKID");

while($user_data = mysqli_fetch_array($result))
{
	$childName = $user_data['childName'];
	//$subjectName = $user_data['subjectName'];	
}
?>
<div class="row" style="margin: 15px;">   
	<form name="update_user" method="post" action="parentEdit.php">
		<table border="0">
			<tr> 
				<td>MyKID</td>
				<td><input type="text" name="myKIDdisplay" value="<?php echo $myKID;?>"disabled></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="childName" value="<?php echo $childName;?>" required></td>
			</tr>					
			<tr>
				<td><input type="hidden" name="myKID" value="<?php echo $myKID;?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>