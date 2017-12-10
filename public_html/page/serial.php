<?php
	require_once("../init.php");
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmy</title>
	<?php $Service->head(); ?>
	<?php $Service->LoadTagsSerial($id) ?>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>
	<?php //$Service->SerialLoad(); ?>
	<?php $Service->PageSerialList($id); ?>
<div style="margin-top: 100px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</div>
</body>
</html>