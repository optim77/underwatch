<?php


	require_once("../init.php");

		if(isset($_POST['submit'])){

		$localhost = 'localhost';
		$nameHost = 'underwat_root';
		$passwordHost = 'kubenq';
		$db = 'underwat_films';

		$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);

		if($Connect->connect_errno != 0){

			echo "Error: ".$Connect->connect_errno; 

		}

		$ok = true;
		$reCaptachSecret = '6LdmIS0UAAAAADW58YfAeKjOdGZM3eLdJE7GoHQH';
		$check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$reCaptachSecret."&response=".$_POST['g-recaptcha-response']);
		$answer = json_decode($check);
		if($answer->success == false){
			$ok = false;
		}
		$name1 = $_POST['name'];
		$password = $_POST['password'];
		$cookiename = 'filmszalogowany';

		$name1 = filter_var($name1, FILTER_SANITIZE_STRING);
		$password = filter_var($password, FILTER_SANITIZE_STRING);
		$password1 = hash("sha1", "$password");
		if($ok == true){


		if($res = $Connect->query("SELECT * FROM users WHERE name = '$name1' AND password = '$password1'")){

			$v = $res->num_rows;

			if($v > 0){

				//session_start();
				$row = $res->fetch_assoc();
				$_SESSION['islogin'] = true;
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['image'] = $row['image'];
				if($res2 = $Connect->query("SELECT * FROM admins WHERE 1")){

					while($row2 = $res2->fetch_assoc()){
						if($row2['iduser'] == $_SESSION['id'] && $row2['name'] = $_SESSION['name']){
							$_SESSION['admin'] = true;
							break;
						}
					}
				}
				//setcookie($cookiename,"zalogowany",time()+ (86400 * 30), "/","http://localhost/");
				header("Location:http://underwatch.pl");
			}
			else{
			echo "<div id='errorLogin'>Podano błędne dane</div>";
			}
		}else{
			echo "<div id='errorLogin'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #10</div>";
		}
	}else{
		echo "<div id='errorLogin'>Potwierdź że nie jestes botem</div>";
	}


		$Connect->close();
	}

	if(isset($_SESSION['zajerestrowany'])){
		echo "<div id='registryOk'>Rejestracja przebiegła pomyślnie.</div>";
		unset($_SESSION['zajerestrowany']);
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Underwatch - Logowanie</title>
	<?php $Service->head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>
	<?php $Service->Login(); ?>
	<div style="margin-top: 500px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</body>
</html>