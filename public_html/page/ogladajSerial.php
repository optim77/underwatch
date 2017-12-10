<?php
	
	require_once('../init.php');
	$serial = $_GET['serial'];
	$sezon = $_GET['sezon'];
	$odc = $_GET['odcinek'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Oglądaj serial</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;">
<?php  //$Service->WatchSerial(); ?>
<?php  $Service->WatchSerialPage($serial,$sezon,$odc); ?>
<div style="margin-top: 100px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</div>
</body>
</html>