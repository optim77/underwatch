<?php
	require_once("../../init.php");
	$value = $_GET['value'];
	$value = filter_var($value, FILTER_SANITIZE_STRING);
	if($value == ''){
		header("Location:http://underwatch.pl/");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Szukaj filmów</title>
	<?php $Service->head(); ?>
	<script type="text/javascript" src='../scripts/szukaj.js'></script>
</head>
<body>
<?php $Service->Topbar(); ?>
	
	<div id='serachSpace'>
	<form method='POST' action='#'>
	<input type="text"  id="find" class="form-control" name="find" placeholder="Wyszukaj film lub serial..." >
	<input type='button' value='Szukaj' class='btn btn-warning' id='buttonFind' name='button' >
	</form>
	</div>

<div style="clear: both;">
<?php $Service->searchB($value); ?>
<div style="clear: both;">
<div style="margin-top: 500px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</body>
</html>