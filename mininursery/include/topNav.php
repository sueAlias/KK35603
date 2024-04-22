<?php
echo '<a href="' . BASE_URL . '/index.php">
		<i class="fa fa-fw fa-home" style="font-size:24px"></i> Home</a>';
//Admin Teacher Menu
if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] == 1) {
	echo '<a href="' . BASE_URL . '/teacher/teacherDashboard.php">
			<i class="fa fa-table" style="font-size:24px"></i> Dashboard</a>';
	echo '<div class="dropdown">
    			<button class="dropbtn"><i class="fa fa-child" style="font-size:24px"></i>
					Manage <i class="fa fa-caret-down"></i></button>
    			<div class="dropdown-content">
					<a href="' . BASE_URL . '/teacher/viewSummary.php">Child Profile</a>   
     				<a href="' . BASE_URL . '/teacher/attendance.php">Child Attendance</a>					  				
    			</div>
  			</div>';
	echo '<div class="search-container">
			  <form action="' . BASE_URL . '/search.php" method="post">
				  <input type="text" placeholder="Search child name" name="search" required>
				  <button type="submit"><i class="fa fa-search"></i></button>
			  </form>
		  </div>';
}
//Parent Menu
else if (isset($_SESSION["UID"]) && $_SESSION["userRoles"] == 2) {
	//echo '<a href="' . BASE_URL . '/parent/parentDashboard.php"> <i class="fa fa-table" style="font-size:24px"></i> Dashboard</a>';
	echo '<div class="dropdown">
    			<button class="dropbtn"><i class="fa fa-child" style="font-size:24px"></i>
					My Child <i class="fa fa-caret-down"></i></button>
    			<div class="dropdown-content">
     				<a href="' . BASE_URL . '/parent/parentView.php">Manage</a>
      				<a href="#">Service 2</a>
      				<a href="#">Service 3</a>
    			</div>
  			</div>';
}
//Guest Menu
// echo '<a href="' . BASE_URL . '/puc.php"><i class="fa fa-info-circle" style="font-size:24px">
// 		</i> About Us</a>';
?>
