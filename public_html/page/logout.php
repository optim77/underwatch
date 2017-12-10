<?php
	require_once("../init.php");
	session_unset();
	session_destroy();
	unset($_SESSION);
	header("Location:http://underwatch.pl");
	echo "<div id='logoutInfo'>Zapraszamy ponownie</div>";

?>