<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Responsive Header</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function myFunction() {
	var x = document.getElementById("myTopnav");
  	if (x.className === "topnav") {
    	x.className += " responsive";
  	} else {
    	x.className = "topnav";
  	}
}
</script>
</head>
<body>
    <div class="header">
        <h1>My StudyKPI</h1>
    </div>
	
	<?php include 'menu.php';?>

    <div class="row">
		<div class="col-left">
			<img class="image" src="img/photo.png" alt="avatar">
		</div>
		<div class="col-right">
			<table border="1">				
				<tr>
					<th id="studName">Name</td>
					<td>My name is here...&nbsp;&nbsp;&nbsp;...</td>
				</tr>
				<tr>
					<td>Matric No.</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Program</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Mentor Name</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p>My Study Motto</p>
			<table border="1">
				<tr>
					<th id="motto">&nbsp;</th>
					<td>&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
	<footer>
		<p>Copyright (c) 2023 - My Name</p>
	</footer>
</body>
</html>
