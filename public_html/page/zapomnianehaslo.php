<?php
	ini_set( 'display_errors', 'On' ); 
	error_reporting( E_ALL );
	require_once('../init.php');

	if(isset($_POST['submit'])){

		$localhost = 'localhost';
		$name = '';
		$password = '';
		$db = '';

		$Connect = new mysqli($localhost,$name,$password,$db);
		
		if($Connect->connect_errno != 0)
		{
			echo "Error: ".$Connect->connect_errno; 
		}

		$email = $_POST['email'];
		$flag = 0;
		$error = false;
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(strlen($email) < 1){
			$error = true;
			$flag = 1;
		}
		if($res2 = $Connect->query("SELECT * FROM users WHERE email = '$email'")){
			$v = $res2->num_rows;
			if($v == 0){
				$error = true;
				$flag = 2;	
			}
		}

		if($error = false){



			$newPass = random_bytes(10);
			$newPass1 = hash("sha1", "$newPass");

			if($res = $Connect->query("INSERT INTO users(password) VALUES '$newPass1' WHERE email = '$email' ")){
				$message = "\n\n Witaj użytkowniku.\nTwoje nowe hasło do serwisu to:".$newPass."\n\nUnderwatch.pl";
				mail($email,"Odzyskiwanie hasła - Underwatch.pl",$message);
				echo "<div id='errorLogin' style='color:green;' >Wiadomość z wygenerowanym nowym hasłem została wysłana</div>";

			}else{echo "<div id='errorLogin'>Wystąpił błąd</div>";}
		}else{
			if($flag == 1){
				echo "<div id='errorLogin'>Uzupełnij wsyztskie pola</div>";
			}else if($flag == 2){
				echo "<div id='errorLogin'>Brak danego adresu email w naszej bazie</div>";
			}
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Filmy</title>
	<?php $Service->head(); ?>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>
	<div id="formFilm" >
		<!-- <div id="newsDesc">Odzyskiwanie hasła<br>(Funkcja odzyskiwania konta nie jest jeszcze ukończona.Jeśli chcesz odzyskać konto napisz do nas)</div> -->
		<form method="post">
			<label for="email" >E-mail</label>
			<input type="email" name="email" class="form-control" placeholder="Podaj email na który wyślemy hasło">
			<input type="submit" name="submit" class="red push_button" value="Wyślij" style="position: absolute;left: 35%;">
		</form>
	</div>

</body>
</html>