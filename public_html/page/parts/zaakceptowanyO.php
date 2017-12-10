<?php

	require_once('../../init.php');

	$id = $_POST['id'];
	$data = explode(".", $id);
	$array = 0;
	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	
	$idodc = $data[0];
	$serial = $data[1];
	$sezon = $data[2];
	$tocheckid = $data[3];
	$Connect1 = new mysqli($localhost,$name,$password,$db);
	
	if($Connect->connect_errno != 0)
	{
		echo "Error: ".$Connect->connect_errno; 
	}

	if($Connect1->connect_errno != 0)
	{
		echo "Error: ".$Connect1->connect_errno; 
	}

	if($res = $Connect->query("UPDATE odcinki SET admincheck = '1' WHERE nr = '$idodc' AND idserial = '$serial' AND sezons = '$sezon' AND id = '$tocheckid' ")){

		$array = 1;

	}else{

		$array = 0;
	}
	
	$Connect->close();
	echo json_encode($array);

?>