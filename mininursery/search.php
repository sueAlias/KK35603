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
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<p style="margin: 15px;"><i class="fa fa-bookmark" style="font-size:24px"></i> / Search</p>
</div>

<!-- Page content row -->
<?php
if(!empty($_POST["search"])) {
	
	$search_text = $_POST["search"];
	$search_text=ltrim($search_text);
	$search_text=rtrim($search_text);
		
	$kt=explode(" ",$search_text);
	
	for($i=0; $i<count($kt); $i++){
    $val = $kt[$i];
    if($val<>" " and strlen($val) > 0){
        $sql = "SELECT * FROM child WHERE childName like '%$val%'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {       
            echo '<p style="margin: 15px;"><b>Related results for "' . $search_text .'"</b></p>';     
            while($row = mysqli_fetch_assoc($result)) {
                //echo "&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href=" . BASE_URL . '/teacher/viewDetail.php?id=$row[myKID]'>". $row["childName"] . "</a>"."<br>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='" . BASE_URL . "/teacher/viewDetail.php?id={$row['myKID']}'>{$row['childName']}</a><br>";

            }
        }//end if result
        else {
            echo "<p  style='margin: 15px;'>Sorry, no result found for <strong>$val</strong></p>";
        }
    }// end of if condition
	}// end of for loop	
}
?>

</body>
</html>