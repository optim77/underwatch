<?php
	
	require_once('../../../init.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sportowe</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;">
<?php  $Service->loadCategory('Sportowe'); ?>
	<div style="margin-top: 100px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</body>
</html>