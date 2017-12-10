<?php
	
	require_once('../../init.php');
	$localhost = 'localhost';
	$name1 = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	$odcinek = $_GET['id'];
	$sezon = $_GET['sezon'];
	$serial = $_GET['serial'];
	$Connect = new mysqli($localhost,$name1,$password,$db);
	if($Connect->connect_errno != 0)
	{echo "Error: ".$Connect->connect_errno;}


	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$nr = $_POST['nr'];
		$link = $_POST['link'];
		$flag = true;
		$error = 0;
		if(empty($name1) || empty($nr) || empty($link)){
			$flag = false;
			$error = 1;
		}
		$name1 = filter_var($name1, FILTER_SANITIZE_STRING);
		$nr = filter_var($nr, FILTER_SANITIZE_STRING);
		$link = filter_var($link, FILTER_VALIDATE_URL);

		if($flag == true){
			if($res = $Connect->query("UPDATE odcinki SET nr = '$nr' , name = '$name' , link = '$link' WHERE id = '$odcinek' AND sezons= '$sezon' AND idserial = '$serial'  ")){
				echo "<div id='descAdmin'>Wprowadzono zmiany</div>";

			}else{
				echo "<div id='errorAdd'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #20</div>";
			}
		}else{
			if($error == 1){
				echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";
			}else{
				echo "<div id='errorAdd'>Coś poszło nie tak</div>";
			}

		}
		$Connect->close();
	}

	$Connect = new mysqli($localhost,$name1,$password,$db);
	if($Connect->connect_errno != 0)
	{echo "Error: ".$Connect->connect_errno;}

	if($res = $Connect->query("SELECT * FROM odcinki WHERE id='$odcinek' AND sezons = '$sezon' AND idserial = '$serial' ")){

		$v = $res->num_rows;

		if($v > 0){
			$row = $res->fetch_assoc();
			$nr = $row['nr'];
			$name1 = $row['name'];
			$link = $row['link'];
		}
		else{
		}
		$Connect->close();
	}else{
		echo "<div id='errorAdd'>Coś poszło nie tak</div>";
	}
			
?>


<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Edytuj serial</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;"></div>

<div id="formFilm">
	<div id="descReg" style="margin-bottom: 40px;">Edycja odcinka</div>

	<form method="post">

	<label for="nr" >Numer odcinka: </label>
		<input type="text" name="nr" class='form-control' value="<?php echo $nr ?>">

		<label for="name" >Tytuł: </label>
		<input type="text" name="name" class='form-control' value="<?php echo $name1; ?>">

		<label for="link" >Url: </label>
		<input type="text" name="link" class='form-control' value="<?php echo $link; ?>">

		<input type="submit" name="submit" id="addButton" class="red push_button" value="Edytuj">

	</form>

</div>
</body>
</html>