<?php
	ini_set( 'display_errors', 'On' ); 
	error_reporting( E_ALL );

	$localhost = 'localhost';
	$nameHost = 'underwat_root';
	$passwordHost = 'kubenq';
	$db = 'underwat_films';

	$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
	
	if($Connect->connect_errno != 0)
	{
		echo "Error: ".$Connect->connect_errno; 
	}

	if($res = $Connect->query("SELECT * FROM films WHERE id = '$id'")){
		$v = $res->num_rows;
		if($v > 0){
			$row = $res->fetch_assoc();

			echo "<div id='filmContent'>";
			echo "<div id='nameF'>".$row['name']."</div>";
			echo "<iframe width='660' height='445'  src='".$row['link']."' allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true' scrolling='no' frameborder='0' >aaa</iframe>";
			echo "<div id='descFilm'>".$row['description']."</div>";
			echo "<div id='year'>Rok wydania fiilmu: ".$row['data']."</div>";
			echo "<div id='rate'>Średnia ocen filmu: ".$row['rate']."</div>";
			echo "<div id='wersja'>Wersja filmu: ".$row['version']."</div>";
			echo "<div id='filmweb'>Link do filmwebu: <a href='".$row['filmweb']."' target='_blank' >".$row['filmweb']."</a></div>";
			echo "<div id='autor'>Film dodał: ".$row['autor']."</div>";
			echo "</div>";
			

		}else{

		}
	}
	$Connect->close();

?>