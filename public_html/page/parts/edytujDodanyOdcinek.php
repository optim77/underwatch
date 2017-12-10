<?php
	require_once('../../init.php');


	if(isset($_POST['submit'])){
		$value = $_POST['causeOdc'];
		$values = explode(".", $value);
		$odcinek = $values[1];
		$sezon = $values[3];
		$serial = $values[5];

		$localhost = 'localhost';
		$name = 'underwat_root';
		$password = 'kubenq';
		$db = 'underwat_films';
		$Connect = new mysqli($localhost,$name,$password,$db);
		if($Connect->connect_errno != 0){
			echo "Error: ".$Connect->connect_errno; }


		$nr = $_POST['nr'];
		$namef = $_POST['name'];
		$link = $_POST['link'];
		$flag = true;
		$error = 0;

		if(empty($nr) || empty($namef) || empty($link)){
			$flag = false;
			$error = 1;
		}
		$nr = filter_var($nr, FILTER_SANITIZE_STRING);
		$namef = filter_var($namef, FILTER_SANITIZE_STRING);
		$link = filter_var($link, FILTER_VALIDATE_URL);

		if($flag == true){
			if($res = $Connect->query("UPDATE odcinki SET nr = '$nr' , name = '$namef' , link = '$link' WHERE nr = '$odcinek' AND idserial = '$serial' AND sezons = '$sezon' ")){
				header("Location:../admin.php");
			}else{
				echo "<div id='errorAdd'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #20</div>";
			}
		}else{
			if($error == 1){
				echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";}
			else{
				echo "<div id='errorAdd'>Coś poszło nie tak</div>";
			}
		}

	}


	if(isset($_POST['val']) && isset($_POST['val1'])){
		$idSezonu = $_POST['val'];
		$idSerialu = $_POST['val1'];

		$localhost = 'localhost';
		$name = 'underwat_root';
		$password = 'kubenq';
		$db = 'underwat_films';
		$Connect = new mysqli($localhost,$name,$password,$db);
		if($Connect->connect_errno != 0){
			echo "Error: ".$Connect->connect_errno; }

		$odc = 1;
		if($res = $Connect->query("SELECT id,nr,name FROM odcinki  WHERE idserial = '$idSerialu' AND sezons = '$idSezonu' ")){
			while($row = $res->fetch_assoc()){
				$array = array("odcinki" => $odc++);
			}
		}else{
			$array = array("ok" => '0');
		}
		$Connect->close();
		echo json_encode($array);
	}else{
		$array = array("ok" => '0');
	}


	if(isset($_POST['id'])){

		$idSerialu = $_POST['id'];
		$sezony = 1;
		$odcinki = 1;
		$localhost = 'localhost';
		$name = 'underwat_root';
		$password = 'kubenq';
		$db = 'underwat_films';
		$Connect = new mysqli($localhost,$name,$password,$db);
		if($Connect->connect_errno != 0){
			echo "Error: ".$Connect->connect_errno; }
			if($res = $Connect->query("SELECT sezons FROM serials WHERE id = '$idSerialu' ")){

				$v = $res->num_rows;
				if($v > 0){

					$row = $res->fetch_assoc();
					$array = array("sezony" => $row['sezons']);

				}else{
					$array = array("ok" => '0');
				}
			}
			$Connect->close();
			echo json_encode($array);
	}

	

	if(isset($_POST['odc']) && isset($_POST['sezon']) && isset($_POST['serial'])){

		$odcinek = $_POST['odc'];
		$sezon = $_POST['sezon'];
		$serial = $_POST['serial'];

		$localhost = 'localhost';
		$name1 = 'underwat_root';
		$password = 'kubenq';
		$db = 'underwat_films';
		$Connect = new mysqli($localhost,$name1,$password,$db);
		if($Connect->connect_errno != 0){
			echo "Error: ".$Connect->connect_errno; }


		if($res = $Connect->query("SELECT * FROM odcinki WHERE nr = '$odcinek' AND idserial = '$serial' AND sezons = '$sezon' ")){

			$v = $res->num_rows;
			if($v > 0){

				$row = $res->fetch_assoc();

				$array = array(
						"nr" => $row['nr'],
						"name" => $row['name'],
						"link" => $row['link'],
					);

			}else{$array = array("ok" => '1');}
		}else{$array = array("ok" => '0');}

		$Connect->close();
		echo json_encode($array);
	}



?>