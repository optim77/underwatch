<?php
	require_once("../init.php");
	ini_set( 'display_errors', 'On' ); 
	error_reporting( E_ALL );
	if(isset($_POST['submit'])){
		$topic = $_POST['temat'];
		$email = $_POST['email'];
		$id = '';
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
		}else{
			$id = 'niezalogowany lub nie posiadający konta';
		}
		$message = "<h3>Wiadomość od: ".$email."</h3>\n Id użytkownika: ".$id."     \n\n".$_POST['message'];
		$message = wordwrap($message,70);
		$email = filter_var($email,FILTER_VALIDATE_EMAIL);
		$message = filter_var($message,FILTER_SANITIZE_STRING);

		$flag = true;
		$error = 0;
		if(empty($topic) || empty($email) || empty($message)){
			$flag = false;
			$error = 1;
		}
		$reCaptachSecret = '6LdmIS0UAAAAADW58YfAeKjOdGZM3eLdJE7GoHQH';
		$check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$reCaptachSecret."&response=".$_POST['g-recaptcha-response']);
		$answer = json_decode($check);
		if($answer->success == false){
			$flag = false;
			$error = 2;
		}

		if($flag == true){
					mail('plajerowy@gmail.com', $topic, $message);
					echo "<div id='errorLogin' style='color:green;' >Wiadomość została wysłana</div>";
		}else{
			if($error == 1){
				echo "<div id='errorLogin'>Uzupełnij wsyztskie pola</div>";
			}else if($error == 2){
				echo "<div id='errorLogin'>Potwierdź że nie jesteś botem</div>";
			}
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Filmy</title>
	<?php $Service->head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>

	<div id="formOdcinek">
			<h3 style="color: #fff;">Kontakt</h3>
			<form method="post" >
				<label for="temat" >Temat:</label>
				<select id="select" name="temat" class="form-control">
					<option>Brak seonu</option>
					<option>Błedy serwisu</option>
					<option>Współpraca</option>
					<option>DMCA</option>
				</select>
				<label style="margin-top: 20px;" name='email'>E-mail:</label>
				<input type="email" name="email" class="form-control" placeholder="E-mail">

				<label for="message">Wiadomość:</label>
				<textarea name="message" id="message" class="form-control" ></textarea>
				<div class="g-recaptcha" data-sitekey="6LdmIS0UAAAAAPhDYjVERsdRj9SJCqotWPERfJg5"></div>
				<input type="submit" name="submit" value="Wyślij" class="red push_button" id="buttonRegistry">
			</form>

	</div>
	<div style="margin-bottom: 800px;"></div>
	<?php $Service->Footer(); ?>
</body>
</html>