<?php
	require_once("../../init.php");
	$value = $_GET['value'];
	$value = filter_var($value, FILTER_SANITIZE_STRING);
	if($value == ''){
		header("Location:../seriale.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Szukaj filmów</title>
	<?php $Service->head(); ?>
	<script type="text/javascript" src='../scripts/szukajSerialu.js'></script>
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
<?php $Service->searchSerial($value); ?>
</body>
</html>