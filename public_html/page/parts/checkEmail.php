<?php

	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';

	$Connect = new mysqli($host,$name,$password,$db);

	if($Connect->connect_errno != 0){

		echo "Error: ".$Connect->connect_errno; 

	}


	$array = true;
	$check = $_POST['email'];

 	if($res2 = $Connect->query("SELECT * FROM users WHERE email = '$check' ")){
 		$amount = $res2->num_rows;
 		if($amount > 0){
 			$array = false;
 		}else
 		{
 			$array = true;
 		}
 	}
 	$Connect->close();
 	echo json_encode($array);


?>