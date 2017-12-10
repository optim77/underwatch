<?php

	require_once('../../init.php');

	$id = $_POST['id'];
	$array = 0;
	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	
	$Connect = new mysqli($localhost,$name,$password,$db);
	
	if($Connect->connect_errno != 0)
	{
		echo "Error: ".$Connect->connect_errno; 
	}

	if($res = $Connect->query("UPDATE serials SET admincheck = '1' WHERE id = '$id' ")){

		$array = 1;
	}else
	{
		$array = 0;
	}
	$Connect->close();
	echo json_encode($array);

?>