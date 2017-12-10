<?php

	require_once('../../init.php');

	$id = $_GET['id'];
	
	
	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';

	$Connect = new mysqli($localhost,$name,$password,$db);
	
	if($Connect->connect_errno != 0)
	{
		echo "Error: ".$Connect->connect_errno; 
	}

		if(isset($_POST['submit'])){

		$name1 = $_POST['name'];
		$description1 = $_POST['descriptionFilm'];
		$year1 = $_POST['year1'];
		$image1 = $_POST['image'];
		$url1 = $_POST['link'];
		$versionFilm1 = $_POST['versionFilm'];
		$filmewb1 = $_POST['filmweb'];
		$category1 = $_POST['categoryFilm'];
		$flag = true;
		$error = 0;
		if(empty($name1) || empty($description1) || empty($year1) || empty($image1) || empty($url1) || empty($filmewb1) || empty($category1) || empty($versionFilm1)){
			$flag = false;
			$error = 1;
		}
		if(!preg_match('/^[0-9]{4}$/D', $year1)){
			$flag = false;
			$error = 2;
		}
		$name1 = filter_var($name1, FILTER_SANITIZE_STRING);
		$description1 = filter_var($description1, FILTER_SANITIZE_STRING);
		$year1 = filter_var($year1, FILTER_SANITIZE_STRING);
		$image1 = filter_var($image1, FILTER_VALIDATE_URL);
		$url1 = filter_var($url1, FILTER_VALIDATE_URL);
		$filmewb1 = filter_var($filmewb1, FILTER_VALIDATE_URL);

		if($flag == true){

			if($res2 = $Connect->query("UPDATE films SET name = '$name1' , description = '$description1' , data = '$year1' ,  image = '$image1' , link = '$url1' , 
			  version = '$versionFilm1' , filmweb = '$filmewb1' , category = '$category1' WHERE id = '$id' ")){

				echo "<div id='descAdmin'>Wprowadzono zmiany</div>";

			}else{
				echo "<div id='errorAdd'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #20</div>";
			}

		}else{
			if($error == 1){
				echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";
			}
			else if($error == 2){
				echo "<div id='errorAdd'>Wprowadzono zły format daty</div>";
			}
		}
		$Connect->close();
	}



	$Connect = new mysqli($localhost,$name,$password,$db);
	if($Connect->connect_errno != 0)
	{echo "Error: ".$Connect->connect_errno;}
	if($res = $Connect->query("SELECT * FROM films WHERE id = '$id' ")){

		$v = $res->num_rows;

		if($v > 0){

			$row = $res->fetch_assoc();
			$name = $row['name'];
			$description = $row['description'];
			$data = $row['data'];
			$rate = $row['rate'];
			$image = $row['image'];
			$link = $row['link'];
			$versionFilm = $row['version'];
			$filmweb = $row['filmweb'];
			$category = $row['category'];

		}
		$Connect->close();
	}



?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Edytuj Film</title>
	<?php $Service->head(); ?>
</head>
<body>
<?php $Service->Topbar(); ?>
<div style="clear: both;"></div>

<div id="formFilm">
	<div id="descReg">Edycja filmu</div>
	<form method="post">
		<label for="name" >Tytuł filmu: </label>
		<input type="text" name="name" class='form-control' value="<?php echo $name; ?>">

		<label for="descriptionFilm" >Opis filmu: </label>
		<textarea style="margin-bottom: 30px;" class="form-control" name="descriptionFilm"><?php echo $description; ?></textarea>

		<label for="year1" >Rok wydania filmu: </label>
		<input type="text" name="year1" class='form-control' value="<?php echo $data; ?>">

		<label for="image" >Okładka filmu: </label>
		<input type="text" name="image" class='form-control' value="<?php echo $image; ?>">

		<label for="link" >Url do filmu: </label>
		<input type="text" name="link" class='form-control' value="<?php echo $link; ?>">

		<label for="filmweb" >Url do filmwebu: </label>
		<input type="text" name="filmweb" class='form-control' value="<?php echo $filmweb; ?>">

		<label for="versionFilm">Wersja:</label>	
		<select style="margin-bottom: 30px;" name="versionFilm" class="form-control">
			<option><?php echo $versionFilm; ?></option>
			<option>Lektor</option>
			<option>Dubbing</option>
			<option>Napisy</option>
			<option>ENG</option>
		</select>

		<label for="categoryFilm">Gatunek:</label>
	<select style="margin-bottom: 30px" name="categoryFilm" class="form-control">
		<option>Kategorie</option>
		<option><?php echo $category; ?></option>
		<option>Akcji</option>
		<option>Animacje</option>
		<option>Biograficzne</option>
		<option>Dokumentalne</option>
		<option>Dramat</option>
		<option>Edukacyjny</option>
		<option>Erotyczny</option>
		<option>Familijny</option>
		<option>Fantasy</option>
		<option>Filmy HD</option>
		<option>Historyczny</option>
		<option>Horror</option>
		<option>Katastroficzny</option>
		<option>Komedia</option>
		<option>Kostiumowy</option>
		<option>Kryminał</option>
		<option>Melodramat</option>
		<option>Musical</option>
		<option>Muzyczny</option>
		<option>Przygodowy</option>
		<option>Przyrodniczy</option>
		<option>Psychologiczny</option>
		<option>Romans</option>
		<option>Satyra</option>
		<option>Sci-fi</option>
		<option>Sensacyjny</option>
		<option>Sporotowy</option>
		<option>Thiller</option>
		<option>Western</option>
		<option>Wojenny</option>
	</select>

	<input type="submit" name="submit" id="addButton" class="red push_button" value="Edytuj">

	</form>

</div>
</body>
</html>