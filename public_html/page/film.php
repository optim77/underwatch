<?php
	
	require_once('../init.php');
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Underwatch - Film</title>
	<?php $Service->head(); ?>
	<?php $Service->LoadTags($id);  ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;">
<?php //$Service->WatchFilm(); ?>
<?php $Service->PageWatchFilm($id); ?>
<div style="margin-top: 100px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</div>
</body>
</html>