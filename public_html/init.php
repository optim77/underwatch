<?php

	ini_set( 'display_errors', 'On' ); 
	error_reporting( E_ALL );
	define("APP_MAIN", "/");
	define("APP_RES", "http://underwatch.pl/res/res.css");
	define("SLIDER", "http://underwatch.pl/res/jquery.bxslider.js");
	define("BOOTSTRAP", "http://underwatch.pl/res/bootstrap.css");
	define("ANIMATE", "http://underwatch.pl/res/animate.css");
	define("VIEWPOINT", "http://underwatch.pl/res/jquery.viewportchecker.min.js");
	define("CORE", "core/core.php");
	define("LOCAL", $_SERVER['DOCUMENT_ROOT']);
	


	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';

	$Connect = new mysqli($localhost,$name,$password,$db);
	
	if($Connect->connect_errno != 0)
	{
		echo "Error: ".$Connect->connect_errno; 
	}

	if(require_once(CORE)){

	}else{
		echo "Error";
	}
		
	$Service = new Service($localhost,$name,$password,$db);
	

	session_start();

?>