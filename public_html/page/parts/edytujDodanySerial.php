<?php
	require_once('../../init.php');
	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	$Connect = new mysqli($localhost,$name,$password,$db);
	if($Connect->connect_errno != 0){
		echo "Error: ".$Connect->connect_errno; }


		if(isset($_POST['submit'])){

		$name = $_POST['name'];
		$description = $_POST['descriptionFilm'];
		$year = $_POST['year1'];
		$image = $_POST['image'];
		$versionFilm = $_POST['versionFilm'];
		$filmewb = $_POST['filmweb'];
		$category = $_POST['categoryFilm'];
		$flag = true;
		$error = 0;
		if(empty($name) || empty($description) || empty($year) || empty($image) ||  empty($filmewb) || empty($category) || empty($versionFilm)){
			$flag = false;
			$error = 1;}
		if(!preg_match('/^[0-9]{4}$/D', $year)){
			$flag = false;
			$error = 2;}
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$description = filter_var($description, FILTER_SANITIZE_STRING);
		$year = filter_var($year, FILTER_SANITIZE_STRING);
		$image = filter_var($image, FILTER_VALIDATE_URL);
		$filmewb = filter_var($filmewb, FILTER_VALIDATE_URL);
		if($flag == true){
			if($res2 = $Connect->query("UPDATE serials SET name = '$name' , description = '$description' , data = '$year' ,  image = '$image' ,
			  version = '$versionFilm' , filmweb = '$filmewb' , category = '$category' WHERE id = '$id' ")){
			  	header("Location:../admin.php");
				echo "<div id='descAdmin'>Wprowadzono zmiany</div>";}
			else{
				echo "<div id='errorAdd'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #20</div>";}
		}else{
			if($error == 1){
				echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";}
			else if($error == 2){
				echo "<div id='errorAdd'>Wprowadzono zły format daty</div>";}
		}
		$Connect->close();

		}




		if(isset($_POST['id'])){
		$id = $_POST['id'];
		if($id == '0'){
			$array = array(
					"ok" => "2"
				);
		}
		if($res = $Connect->query("SELECT * FROM serials WHERE id = '$id' ")){
			$v = $res->num_rows;
			if($v > 0){
				$row = $res->fetch_assoc();
				$array = array(
						"ok" => '1',
						"name" => $row['name'],
						"description" => $row['description'],
						"data" => $row['data'],
						"image" => $row['image'],
						"link" => $row['link'],
						"version" => $row['version'],
						"filmweb" => $row['filmweb'],
						"category" => $row['category'],
					);
			}else{

				$array = array(
					"ok" => '0',
					);
			}
		}else{
			$array = array(
					"ok" => '0',
				);
		}
		$Connect->close();
		echo json_encode($array);
	}
?>