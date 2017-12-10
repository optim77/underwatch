<?php
	require_once("../init.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Underwatch - Filmy</title>
	<?php $Service->head(); ?>
	<script type="text/javascript" src='http://underwatch.pl/page/scripts/filmy1.js'></script>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>
	<?php $Service->Films(); ?>
	<div style="margin-top: 100px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</div>
</body>
</html>