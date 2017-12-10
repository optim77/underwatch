<?php
	require_once("../init.php");

	if(!isset($_SESSION['islogin']) && !isset($_SESSION['admin'])){
		header("Location:http://underwatch.pl");
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Panel administracyjny</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;">
<?php $Service->Admin(); ?>
</body>
</html>