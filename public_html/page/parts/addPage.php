<?php
	if(!isset($_SESSION['islogin']) || !isset($_SESSION['id']) ){

		echo '<div id="info">Aby dodawać materiały musisz być zalogowany</div>';
	}else
	{



?>

<div id='registryForm'>
	
<div id='descReg'>Dodaj
	<br>
	<br>
	<a href="#" id='filmButton'>Dodaj Film</a>
	<a href="#" id='serialButton'>Dodaj Serial</a>
	<a href="#" id="odcinekButton">Dodaj odcinek</a>
</div>
	

<div id="formFilm">
<form  method="post" >
	<label for="nameFilm">Tytuł filmu:</label>
	<input type="text" class="form-control"  name="nameFilm" placeholder="Nazwa filmu" value="<?php if(isset($_SESSION['FilmName'])){echo $_SESSION['FilmName']; unset($_SESSION['FilmName']); }  ?>" >
	
	<label for="descriptionFilm">Opis filmu:</label>
	<textarea style="margin-bottom: 30px;" class="form-control" name="descriptionFilm"><?php if(isset($_SESSION['FilmDescription'])){echo $_SESSION['FilmDescription']; unset($_SESSION['FilmDescription']); }  ?></textarea>
	
	<label for="imgFilm">Okładka filmu:</label>
	<input type="text" class="form-control"  name="imgFilm" placeholder="Url okładki filmu" value="<?php if(isset($_SESSION['FilmCover'])){echo $_SESSION['FilmCover']; unset($_SESSION['FilmCover']); }  ?>">
	
	<label for="yearFilm">Rok wydania filmu:</label>
	<input type="text" class="form-control" name="yearFilm" placeholder="2017" value="<?php if(isset($_SESSION['FilmYear'])){echo $_SESSION['FilmYear']; unset($_SESSION['FilmYear']); }  ?>" >

	<label for="versionFilm">Wersja:</label>	
	<select style="margin-bottom: 30px;" name="versionFilm" class="form-control">
		<option>Lektor</option>
		<option>Dubbing</option>
		<option>Napisy</option>
		<option>ENG</option>
	</select>
	
	<label for="categoryFilm">Gatunek:</label>
	<select style="margin-bottom: 30px" name="categoryFilm" class="form-control">
		<option>Kategorie</option>
		<option>Akcji</option>
		<option>Animacje</option>
		<option>Biograficzne</option>
		<option>Dokumentalne</option>
		<option>Dramaty</option>
		<option>Edukacyjne</option>
		<option>Erotyczne</option>
		<option>Familijne</option>
		<option>Fantasy</option>
		<option>Filmy HD</option>
		<option>Historyczne</option>
		<option>Horrory</option>
		<option>Katastroficzne</option>
		<option>Komedie</option>
		<option>Kostiumowe</option>
		<option>Kryminały</option>
		<option>Melodramaty</option>
		<option>Musicale</option>
		<option>Muzycznye</option>
		<option>Przygodowe</option>
		<option>Przyrodnicze</option>
		<option>Psychologiczne</option>
		<option>Romanse</option>
		<option>Satyry</option>
		<option>Sci-fi</option>
		<option>Sensacyjne</option>
		<option>Sporotowe</option>
		<option>Thillery</option>
		<option>Westerny</option>
		<option>Wojenne</option>
	</select>

	<label for="urlFilmwebFilm">Link do filmwebu:</label>
	<input type="url"  class="form-control"  name="urlFilmwebFilm" placeholder="Link do filmwebu" value="<?php if(isset($_SESSION['FilmFilmweb'])){echo $_SESSION['FilmFilmweb']; unset($_SESSION['FilmFilmweb']); }  ?>">

	<label for="urlFilm">Link do filmu:</label>
	<input type="url"  class="form-control"  name="urlFilm" placeholder="Url filmu" value="<?php if(isset($_SESSION['FilmUrl'])){echo $_SESSION['FilmUrl']; unset($_SESSION['FilmUrl']); }  ?>" >

	<input type="submit" id="addButton" class="red push_button" name="submitFilms" value="Dodaj film">

</form>

</div>



<div id='formSerial'>
	<form method="post">

		<label for="nameS">Tytuł serialu:</label>
		<input type="text" class="form-control"  name="nameS" placeholder="Nazwa serialu" value="<?php if(isset($_SESSION['SerialName'])){echo $_SESSION['SerialName']; unset($_SESSION['SerialName']); }  ?>">

		<label for="descriptionS">Opis serialu:</label>
		<textarea style="margin-bottom: 30px;" class="form-control" name="descriptionS"><?php if(isset($_SESSION['SerialDescription'])){echo $_SESSION['SerialDescription']; unset($_SESSION['SerialDescription']); }  ?></textarea>

		<label for="img">Okładka serialu:</label>
		<input type="text" class="form-control"  name="imgS" placeholder="Url okładki serialu" value="<?php if(isset($_SESSION['SerialCover'])){echo $_SESSION['SerialCover']; unset($_SESSION['SerialCover']); }  ?>" >

		<label for="sessons">Ilość sezonów:</label>
		<input type="text" class="form-control"  name="sessons" placeholder="Ilość sezonów " value="<?php if(isset($_SESSION['SerialSeasons'])){echo $_SESSION['SerialSeasons']; unset($_SESSION['SerialSeasons']); }  ?>" >

		<label for="yearS">Rok wydania filmu:</label>
		<input type="text" class="form-control" name="yearS" placeholder="2017" value="<?php if(isset($_SESSION['SerialYear'])){echo $_SESSION['SerialYear']; unset($_SESSION['SerialYear']); }  ?>" >

		<label for="versionS">Wersja:</label>	
		<select style="margin-bottom: 30px;" name="versionS" class="form-control">
			<option>Lektor</option>
			<option>Dubbing</option>
			<option>Napisy</option>
			<option>ENG</option>
		</select>

		<label for="categoryFilm">Gatunek:</label>
		<select style="margin-bottom: 30px" name="categoryS" class="form-control">
			<option>Kategorie</option>
			<option>Akcji</option>
			<option>Animacje</option>
			<option>Biograficzne</option>
			<option>Dokumentalne</option>
			<option>Dramat</option>
			<option>Edukacyjny</option>
			<option>Erotyczny</option>
			<option>Familijny</option>
			<option>Fantasy</option>
			<option>Historyczny</option>
			<option>Horror</option>
			<option>Katastroficzny</option>
			<option>Komedia</option>
			<option>Kostiumowy</option>
			<option>Kryminał</option>
			<option>Melodramat</option>
			<option>Musical</option>
			<option>Muzyczny</option>
			<option>Przygodowy</option>
			<option>Przyrodniczy</option>
			<option>Psychologiczny</option>
			<option>Romans</option>
			<option>Satyra</option>
			<option>Sci-fi</option>
			<option>Sensacyjny</option>
			<option>Sporotowy</option>
			<option>Thiller</option>
			<option>Western</option>
			<option>Wojenny</option>
		</select>

		<label for="urlFilmwebS">Link do filmwebu:</label>
		<input type="url"  class="form-control"  name="urlFilmwebS" placeholder="Link do filmwebu" value="<?php if(isset($_SESSION['SerialFilmweb'])){echo $_SESSION['SerialFilmweb']; unset($_SESSION['SerialFilmweb']); }  ?>" >

		<input type="submit" id="addButton" class="red push_button" name="submitSerials" value="Dodaj serial">

	</form>
</div>

<?php } ?>
<div id='formOdcinek'>
	
	<form method="post">

	<?php 
		$localhost = 'localhost';
		$name = 'underwat_root';
		$password = 'kubenq';
		$db = 'underwat_films';

		$Connect = new mysqli($localhost,$name,$password,$db);
		
		if($Connect->connect_errno != 0)
		{
			echo "Error: ".$Connect->connect_errno; 
		}
		if($res = $Connect->query("SELECT id,name FROM serials WHERE 1")){
			echo "<label for='toSerial'>Wybierz do którego serialu chcesz dodać odcinek:</label>";
			echo "<select onchange='Fselect(this.value)' style='margin-bottom: 30px;' name='toSerial' id='select' class='form-control'>";
			echo "<option>Wybierz serial</option>";
			while($row = $res->fetch_assoc()){
				echo "<option id='".$row['id']."' value='".$row['id']."' class='option' '>".$row['name']."</option>";
			}
			echo "</select>";

			echo "<div id='sezon'></div>";
			

		}
	?>
		<div id='chooseSeason'></div>;

		<label for="nameO">Nazwa odcinka:</label>
		<input type="text" class="form-control"  name="nameO" placeholder="Nazwa odcinka (jeżeli odcinek nie posiada nazwy proszę podać jego numer)" value="<?php if(isset($_SESSION['OdcinekNazwa'])){echo $_SESSION['OdcinekNazwa']; unset($_SESSION['OdcinekNazwa']); }  ?>">

		<label for="nrO">Numer odcinka:</label>
		<input type="text"  class="form-control"  name="nrO" placeholder="Numer odcinka" value="<?php if(isset($_SESSION['OdcinekOdcinek'])){echo $_SESSION['OdcinekOdcinek']; unset($_SESSION['OdcinekOdcinek']); }  ?>">

		<label for="descriptionO">Opis odcinka:</label>
		<textarea style="margin-bottom: 30px;" class="form-control" name="descriptionO"><?php if(isset($_SESSION['OdcinekOpis'])){echo $_SESSION['OdcinekOpis']; unset($_SESSION['OdcinekOpis']); }  ?></textarea>

		<label for="urlO">Url do odcinka:</label>
		<input type="url"  class="form-control"  name="urlO" placeholder="Url odcinka" value="<?php if(isset($_SESSION['OdcinekUrl'])){echo $_SESSION['OdcinekUrl']; unset($_SESSION['OdcinekUrl']); }  ?>">

		<input type="submit" id="addButton" class="red push_button" name="submitOdcinek" value="Dodaj odcinek">

	</form>

</div>
<script>
	
		
	function Fselect(val){
			
		document.getElementById('sezon').innerHTML = '';


		var string = "id=" + val;
		var request = $.ajax({
			url:"sezony.php",
			type: "POST",
			datatype: "json",
			data: string
		});
		request.done(function(html){
			var array = $.parseJSON(html);

			$("#select").after(function(){
				$("#sezon").append("<label for='nrsezon'>Sezon:</label>")
				$("#sezon").append("<select class='form-control' style='margin-bottom: 30px;' name='nrsezon' id='nrsezon'>");
				while(array >= 1){
					$("#nrsezon").append("<option>" + array + "</option>");
					array--;
				}
				$("#sezon").append("</select>");
				$("#sezon").append("<a href='kontakt.php' target='_blank' id='addSezo' >Nie ma sezonu do którego chcesz dodać odcinek ? Napisz do nas</a>");




			});

		})


	}


	$("#formFilm").hide();
	$("#formSerial").hide();
	$("#formOdcinek").hide();
	$(document).ready(function(){

		$("#filmButton").click(function(){
			$("#formFilm").toggle();
			$("#formSerial").hide();
			$("#formOdcinek").hide();
		});

		$("#serialButton").click(function(){

			$("#formSerial").toggle();
			$("#formFilm").hide();
			$("#formOdcinek").hide();

		});



		$("#odcinekButton").click(function(){
			$("#formOdcinek").toggle();
			$("#formSerial").hide();
			$("#formFilm").hide();
		})

		

	})

</script>

