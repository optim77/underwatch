<?php

	$localhost = 'localhost';
	$name = 'root';
	$password = '';
	$db = 'films';
	$serial = $_GET['serial'];
	$sezon = $_GET['sezon'];
	$odc = $_GET['odcinek'];
	$Connect = new mysqli($localhost,$name,$password,$db);
	if($Connect->connect_errno != 0){
		echo "Error: ".$Connect->connect_errno; }

	if($res = $Connect->query("SELECT * FROM odcinki WHERE idserial = '$serial' AND sezons = '$sezon' AND id = '$odc' ")){

		$v = $res->num_rows;

		if($v > 0){

			$row = $res->fetch_assoc();
			echo "<div id='filmContent'>";
			echo "<div id='nameF'>".$row['name']."</div>";
			echo "<iframe width='660' height='445'  src='".$row['link']."' allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true' scrolling='no' frameborder='0' >aaa</iframe>";
			echo "<div id='year'>Odcinek dodano: ".$row['data']."</div>";
			echo "<div id='rate'>Średnia ocen odcinka: ".$row['rate']."</div>";
			echo "<div id='autor'>Dodał: ".$row['autor']."</div>";
			echo "</div>";


		}else{
			echo "<div id='newsDesc'>Nie znaleziono odcinka</div>";
		}


	}else{
		echo "<div id='errorAdd'>Error</div>";
	}


	$Connect->close();
?>