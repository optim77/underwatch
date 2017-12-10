<?php


	echo "<div id='serachSpace'>";
	echo "<form method='POST' action='#'>";
	echo '<input type="text"  id="find" class="form-control" name="find" placeholder="Wyszukaj film..." >';
	echo "<input type='button' value='Szukaj' class='btn btn-warning' id='buttonFind' name='button' >";
	echo "</form>";
	echo "</div>";

	$localhost = 'localhost';
	$name = 'underwat_root';
	$password = 'kubenq';
	$db = 'underwat_films';
	$i = 0;
	$Connect = new mysqli($localhost,$name,$password,$db);

	if($Connect->connect_errno != 0){

		echo "Error: ".$Connect->connect_errno; 

	}
	echo "<div id='categoryButton'><button class='push_button red'>Kategorie</button></div>";
	echo "<div id='category'>";

		echo "<a class='link link--kukuri' href='kategorie/filmy/akcji.php'><span id='Akcji' class='categoryList'>Akcji</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/animacje.php'><span id='Animacje'  class='categoryList'>Animacje</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/biograficzne.php'><span id='Biograficzne' class='categoryList'>Biograficzne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/dokumentalne.php'><span id='Dokumentalne' class='categoryList'>Dokumentalne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/dramaty.php'><span id='Dramaty' class='categoryList'>Dramaty</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/edukacyjne.php'><span id='Edukacyjne' class='categoryList'>Edukacyjne</span></a>";
		//echo "<a class='link link--kukuri' href='#'><span class='categoryList'>Erotyczny</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/familijne.php'><span id='Familijne' class='categoryList'>Familijne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/fantasy.php'><span id='Fantasy' class='categoryList'>Fantasy</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/filmyhd.php'><span id='Filmy HD' class='categoryList'>Filmy HD</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/historyczne.php'><span id='Historyczne' class='categoryList'>Historyczne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/horrory.php'><span id='Horrory' class='categoryList'>Horrory</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/katastroficzne.php'><span id='Katastroficzne' class='categoryList'>Katastroficzne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/komedie.php'><span id='Komedie' class='categoryList'>Komedie</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/kostiumowe.php'><span id='Kostiumowe' class='categoryList'>Kostiumowe</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/kryminały.php'><span id='Kryminały' class='categoryList'>Kryminały</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/melodramaty.php'><span id='Melodramaty' class='categoryList'>Melodramaty</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/musicale.php'><span id='Musicale' class='categoryList'>Musicale</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/muzyczne.php'><span id='Muzyczne' class='categoryList'>Muzyczne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/przygodowe.php'><span id='Przygodowe' class='categoryList'>Przygodowe</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/przyrodnicze.php'><span id='Przyrodnicze' class='categoryList'>Przyrodnicze</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/psychologiczne.php'><span id='Psychologiczne' class='categoryList'>Psychologiczne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/romanse.php'><span id='Romanse' class='categoryList'>Romanse</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/satyry.php'><span id='Satyry' class='categoryList'>Satyry</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/scifi.php'><span id='Sci-fi' class='categoryList'>Sci-fi</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/sensacyjne.php'><span id='Sensacyjne' class='categoryList'>Sensacyjne</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/sportowe.php'><span id='Sporotowe' class='categoryList'>Sporotowe</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/thillery.php'><span id='Thillery' class='categoryList'>Thillery</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/westerny.php'><span id='Westerny' class='categoryList'>Westerny</span></a>";
		echo "<a class='link link--kukuri' href='kategorie/filmy/wojenne.php'><span id='Wojenne' class='categoryList'>Wojenne</span></a>";
	echo "</div>";




	echo "<div id='content'>";
	echo "<div id='Desc'>Katalog filmów</div>";
	echo "<ul class='allFilms'>";

	if($res = $Connect->query("SELECT * FROM films WHERE admincheck = '1' "))
	{
		$v = $res->num_rows;
		if($v > 0){

			while($row = $res->fetch_assoc()){
				
				//$i++;
				echo "<li class='onceFilm' data-animate='bounceInUp'  id='".$row['id']."'>";
				//echo "<span>".$row['name']."</span>";
				echo "<a href='film.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
				echo "</li>";	


			}
		}
	}

	echo "</ul>";
	echo "<div style='clear:both;'></div>";
	echo "</div>";
	$Connect->close();

	?>
