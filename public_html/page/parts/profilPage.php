<?php

	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	$Connect = new mysqli($localhost,$name,$password,$db);
	$name = $_SESSION['name'];
	$id = $_SESSION['id'];
	if($res = $Connect->query("SELECT * FROM users WHERE id = '$id' ")){

		$v = $res->num_rows;
		if($v > 0){

			$row = $res->fetch_assoc();

			echo "<div id='profil' style='background-image: url(".$row['background'].")'>";
			echo "<img id='profilImg' src='".$row['image']."' width='300'>";
			echo "<div id='nameProfil'>".$row['name']."</div>";
			echo "</div>";
			echo "</div>";
			echo "<div style='clear:both;'></div>";
			echo "<div id='tabProfil'>";
				echo "<ul id='listProfil'>";
				echo "<li class='liProfil' >Profil</li>";
				echo "<li class='liProfil' >Newsy</li>";
				echo "<li class='liProfil' >Dodane materiały</li>";
				echo "<li class='liProfil' >Użytkownicy</li>";
				echo "<li class='liProfil' >Ustawienia</li>";
				echo "</ul>";
				echo "<div style='clear:both;'></div>";
			echo "</div>";

			echo "<div id='Tabprofil'>";
			echo "<div id='newsDesc'>Prace trwają</div>";
			echo "</div>";

		}
		$Connect->close();
	}


?>