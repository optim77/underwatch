<?php

	require_once("../../init.php");


	$id = $_POST['id'];

	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	$Connect = new mysqli($localhost,$name,$password,$db);

	if($res = $Connect->query("SELECT sezons FROM serials WHERE id = '$id' ")){

		$row = $res->fetch_assoc();
		$i = $row['sezons'];
	


	}
	$Connect->close();
	echo json_encode($i);

?>