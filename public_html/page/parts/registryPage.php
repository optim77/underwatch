<?php

// if(isset($_POST['submit'])){

// 	$localhost = 'localhost';
// 	$nameHost = 'underwat_root';
// 	$passwordHost = 'kubenq';
// 	$db = 'underwat_films';

// 	$Connect = new mysqli($host,$nameHost,$passwordHost,$db);

// 	if($Connect->connect_errno != 0){

// 		echo "Error: ".$Connect->connect_errno; 

// 	}

// 	$flag = true;
// 	$name1 = $_POST['name'];
// 	$password1 = $_POST['password'];
// 	$email = $_POST['email'];
// 	$error = 0;


	
// 	$default = 'http://equilibria.com.bh/wp-content/uploads/2015/01/Default-Display-Picture.png';
// 	if(empty($name1) || empty($password1) || empty($email) ){
// 		$flag = false;	
// 		$error = 1;
// 	}
// 	if(strlen($name1) < 5 || strlen($name1) > 20){
// 		$flag = false;
// 		$error = 2;
// 	}
// 	if(strlen($password1) < 8 || strlen($name1) > 20){
// 		$flag = false;
// 		$error = 3;
// 	}
// 	$password2 = hash("sha1", "$password1");

// 	if($res2 = $Connect->query("SELECT * FROM users WHERE name = '$name1' ")){
// 		$v = $res2->num_rows;
// 		if($v > 0){
// 			$flag = false;
// 			$error = 4;
// 		}
// 	}

// 	if($res3 = $Connect->query("SELECT * FROM users WHERE email = '$email'")){
// 		$v = $res3->num_rows;
// 		if($v > 0){
// 			$flag = false;
// 			$error = 5;
// 		}
// 	}
// 	$name1 = filter_var($name1, FILTER_SANITIZE_STRING);
// 	if($flag == true){

// 		if($res = $Connect->query("INSERT INTO users(name,password,data,status,email,image) VALUES ('{$name1}' , '{$password2}' , NOW() , '1' ,'{$email}' , '{$default}' )  ")){
// 			//session_start();
// 			//$_SESSION['islogin'] = true;
// 			//$_SESSION['name'] = $name1;
// 			//$_SESSION['email'] = $email;
// 			$_SESSION['zajerestrowany'] = true;
// 			header("Location:http://localhost/films/page/logowanie.php");
// 		}else
// 		{

// 		}
// 	}else
// 	{
// 		if($error == 1){
// 			echo "<div id='errorAdd'>Uzupełnij wszystkie pola</div>";
// 		}else if($error == 2){
// 			echo "<div id='errorAdd'>Nazwa powinna zawierać od 5 do 20 znaków</div>";
// 		}else if($error == 3){
// 			echo "<div id='errorAdd'>Hasło powinno zawierać od 8 do 20 znaków</div>";
// 		}else if($error == 4){
// 			echo "<div id='errorAdd'>Wprowadzona nazwa już istnieje</div>";
// 		}else if($error == 5){
// 			echo "<div id='errorAdd'>Wprowadzony e-mail już istnieje w naszej bazie</div>";
// 		}else if($error == 6){
// 			echo "<div id='errorAdd'>Nie zaakceptowano regulaminu</div>";
// 		}
// 	}

// 	$Connect->close();
// }



?>

<div id='registryForm'>
	
<div id='descReg'>Formularz rejestracyjny</div>

<div id="form">
	
<form  method="post" action="rejestracja.php" >
	<div id="alert" class="" ></div>
	<input type="text" name="name" id="name1" class="form-control" placeholder="Nazwa">
	<div id="alert1"></div>
	<input type="password" name="password" id="password" class="form-control" placeholder="Hasło">
	<div id="alert2"></div>
	<input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
	<div id="alert3"></div>
	<div class="g-recaptcha" data-sitekey="6LdmIS0UAAAAAPhDYjVERsdRj9SJCqotWPERfJg5"></div>
	<span id="checkboxReg"><input type="checkbox" id="reg" required  name="reg" ><a href='regulamin.php'>Akceptuje regulamin</a></span>
	<input type="submit" id="buttonRegistry" name="submit" 	class="red push_button" value="Zarejestruj">

</form>

</div>



</div>


