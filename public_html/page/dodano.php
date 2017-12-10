<?php
	require_once("../init.php");
	if(!isset($_SESSION['dodano']) &&  !isset($_SESSION['dodanoO']) && !isset($_SESSION['dodanoS']) ){
		header("Location:http://underwatch.pl");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dodano</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;">
	<div id='congrats'>
		<?php if(isset($_SESSION['dodano'])){

			echo "<div id='descReg'>Twój film został dodany.<br>Po sprawdzeniu przez administratora będzie dostępny na stronie</div>";
		}
		if(isset($_SESSION['dodanoS'])){

			echo "<div id='descReg'>Serial został dodany.<br>Możesz teraz dodawać do niego odcinki w sekcji dodaj</div>";
		}
		if(isset($_SESSION['dodanoO'])){
			echo "<div id='descReg'>Odcinek został dodany.<br>Po sprawdzeniu przez administratora będzie dostępny na stronie</div>";
		}


		  ?>
		<?php 
			unset($_SESSION['dodano']);
			unset($_SESSION['dodanoS']);
			unset($_SESSION['dodanoO']);
		 ?>
	</div>
</body>
</html>