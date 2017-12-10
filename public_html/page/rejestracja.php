<?php
	require_once("../init.php");
	if(isset($_POST['submit'])){

	$localhost = 'localhost';
	$nameHost = 't';
	$passwordHost = '';
	$db = '';

	$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);

	if($Connect->connect_errno != 0){

		echo "Error: ".$Connect->connect_errno; 

	}

	$flag = true;
	$name1 = $_POST['name'];
	$password1 = $_POST['password'];
	$email = $_POST['email'];
	$error = 0;
	$reCaptachSecret = '6LdmIS0UAAAAADW58YfAeKjOdGZM3eLdJE7GoHQH';
	$check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$reCaptachSecret."&response=".$_POST['g-recaptcha-response']);
	$answer = json_decode($check);
	if($answer->success == false){
		$flag = false;
		$error = 7;
	}

	
	$default = 'http://equilibria.com.bh/wp-content/uploads/2015/01/Default-Display-Picture.png';
	if(empty($name1) || empty($password1) || empty($email) ){
		$flag = false;	
		$error = 1;
	}
	if(strlen($name1) < 5 || strlen($name1) > 20){
		$flag = false;
		$error = 2;
	}
	if(strlen($password1) < 8 || strlen($name1) > 20){
		$flag = false;
		$error = 3;
	}
	$password2 = hash("sha1", "$password1");

	if($res2 = $Connect->query("SELECT * FROM users WHERE name = '$name1' ")){
		$v = $res2->num_rows;
		if($v > 0){
			$flag = false;
			$error = 4;
		}
	}

	if($res3 = $Connect->query("SELECT * FROM users WHERE email = '$email'")){
		$v = $res3->num_rows;
		if($v > 0){
			$flag = false;
			$error = 5;
		}
	}
	$name1 = filter_var($name1, FILTER_SANITIZE_STRING);
	if($flag == true){

		if($res = $Connect->query("INSERT INTO users(name,password,data,status,email,image) VALUES ('{$name1}' , '{$password2}' , NOW() , '1' ,'{$email}' , '{$default}' )  ")){
			//session_start();
			//$_SESSION['islogin'] = true;
			//$_SESSION['name'] = $name1;
			//$_SESSION['email'] = $email;
			$_SESSION['zajerestrowany'] = true;
			header("Location:http://underwatch.pl/page/logowanie.php");
		}else
		{

		}
	}else
	{
		if($error == 1){
			echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";
		}else if($error == 2){
			echo "<div id='errorAdd'>Nazwa powinna zawierać od 5 do 20 znaków</div>";
		}else if($error == 3){
			echo "<div id='errorAdd'>Hasło powinno zawierać od 8 do 20 znaków</div>";
		}else if($error == 4){
			echo "<div id='errorAdd'>Wprowadzona nazwa już istnieje</div>";
		}else if($error == 5){
			echo "<div id='errorAdd'>Wprowadzony e-mail już istnieje w naszej bazie</div>";
		}else if($error == 6){
			echo "<div id='errorAdd'>Nie zaakceptowano regulaminu</div>";
		}else if($error == 7){
			echo "<div id='errorAdd'>Potwierdź że nie jestes botem</div>";
		}
	}

	$Connect->close();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Underwatch - Rejestracja</title>
	<?php $Service->head(); ?>
	<script type="text/javascript" src='serviceRegistry.js'></script>	
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<?php $Service->Topbar(); ?>
	<div style="clear: both;"></div>
	<?php $Service->RegistryForm(); ?>
	<div style="margin-top: 800px;width: 80%;margin-left: auto;margin-right: auto;" >
	<?php $Service->Footer(); ?>
</body>
</html>