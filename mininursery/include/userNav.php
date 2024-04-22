<?php
if (isset($_SESSION["UID"])) {
	echo 'Welcome, <b>' . $_SESSION["userName"] . '</b> &nbsp;
	<button class="login-button" onclick="window.location.href = \'' . BASE_URL . '/userAuth/logout.php\'">
	  <i class="fa fa-sign-out" style="font-size:24px"></i> Logout
	</button>';
} else {
	echo '<button class="login-button" onclick="openLoginPopup()"> 
		<i class="fa fa-sign-in" style="font-size:24px" align="right"></i>&nbsp;&nbsp;Login</button>';
}
?>