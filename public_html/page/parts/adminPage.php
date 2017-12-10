

<div id="adminContent">
		<div id='descReg'>Czekające na sprawdzenie
		<br>
		<br>
		<a href="#" id='filmButton'>Filmy</a>
		<a href="#" id='serialButton'>Seriale</a>
		<a href="#" id="odcinekButton">Odcinki</a>
	</div>


	
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





	echo "<div id='filmsCheck'>";
	//echo '<div id="newsDesc">Filmy czekające na sprawdzenie</div>';
		if($res = $Connect->query("SELECT * FROM films WHERE admincheck = '0' ")){

			$v = $res->num_rows;
			if($v > 0){
				while($row = $res->fetch_assoc()){
					echo "<div class='frameFilm' id='".$row['id']."film'>";
					echo "<a href='film.php?id=".$row['id']."'</a>";
					echo "<img src='".$row['image']."' width='215' height='300' /></a>";
					echo "<div id='nameFilm'>".$row['name']."</div>";
					echo "<div id='descFilm'>".substr($row['description'], 0,200)."...</div><br>";
					echo "<div id='year'>Data wydania filmu:&nbsp;&nbsp;&nbsp;".$row['data']."</div>";
					echo "<div id='autor'>Film dodał:&nbsp;&nbsp;&nbsp;".$row['autor']."</div>";
					echo "<div id='version'>Wersja filmu:&nbsp;&nbsp;&nbsp;".$row['version']."</div>";
					echo "<div id='link'>Link do filmwebu:&nbsp;&nbsp;&nbsp;<a href='".$row['filmweb']."' target='_blank'>".$row['filmweb']."</a></div>";
					echo "<div id='category'>Kategoria filmu:&nbsp;&nbsp;&nbsp;".$row['category']."</div>";
					echo "<hr>";
					echo "<button class='btn btn-success akcept' id='akcept' value='".$row['id']."' >Akceptuj</button>
					
					<a href='parts/edytujFilm.php?id=".$row['id']."' target='_blank' class='btn btn-warning' >Edytuj</a>
					<button class='btn btn-danger delete' id='delete' value='".$row['id']."' >Usuń</button>";
					echo "</div>";
				}

			}else
			{
				echo "<div id='newsDesc'>Brak filmów do sprawdzenia</div>";
			}
		}
		echo "</div>";
		echo "<div style='clear:both;'></div>";

	?>




	<?php

		echo "<div id='serialsCheck'>";
		//echo '<div id="newsDesc">Nowe seriale czekające na sprawdzenie</div>';	
			if($res2 = $Connect->query("SELECT * FROM serials WHERE admincheck = '0' ")){
				$b = $res2->num_rows;
				if($b > 0){
					while($row2 = $res2->fetch_assoc()){
						echo "<div class='frameSerial' id='".$row2['id']."serial'>";
						echo "<a href='serial.php?id=".$row2['id']."'</a>";
						echo "<img src='".$row2['image']."' width='215' height='300' /></a>";
						echo "<div id='nameFilm'>".$row2['name']."</div>";
						echo "<div id='descFilm'>".substr($row2['description'], 0,200)."</div><br>";
						echo "<div id='year'>Data wydania filmu:&nbsp;&nbsp;&nbsp;".$row2['data']."</div>";
						echo "<div id='autor'>Film dodał:&nbsp;&nbsp;&nbsp;".$row2['autor']."</div>";
						echo "<div id='version'>Wersja filmu:&nbsp;&nbsp;&nbsp;".$row2['version']."</div>";
						echo "<div id='link'>Link do filmwebu:&nbsp;&nbsp;&nbsp;<a href='".$row2['filmweb']."' target='_blank'>".$row2['filmweb']."</a></div>";
						echo "<div id='category'>Kategoria filmu:&nbsp;&nbsp;&nbsp;".$row2['category']."</div>";
						echo "<hr>";
						echo "<button class='btn btn-success akceptS ' id='akceptS' value='".$row2['id']."' >Akceptuj</button>
						<a href='parts/edytujSerial.php?id=".$row2['id']."' target='_blank' class='btn btn-warning' >Edytuj</a>
						<button class='btn btn-danger deleteS' id='deleteS' value='".$row2['id']."' >Usuń</button>";
						echo "</div>";
					}
				}else{
					echo "<div id='newsDesc'>Brak seriali do sprawdzenia</div>";
				}
			}
		echo "</div>";

	?>






	<?php

		echo "<div id='odcCheck'>";
		//echo '<div id="newsDesc">Nowe odcinki czekające na sprawdzenie</div>';	

		if($res3 = $Connect->query("SELECT * FROM odcinki WHERE  admincheck = '0' ")){

			$n = $res3->num_rows;
			if($n > 0){
				while($row3 = $res3->fetch_assoc()){
					$serial = $row3['idserial'];
					$sezon = $row3['sezons'];
					$odcinek = $row3['nr'];
						if($res4 = $Connect->query("SELECT name FROM serials WHERE id = '$serial' ")){
							$row4 = $res4->fetch_assoc();
							echo "<div class='frameOdcinek' id='".$row3['id']."odc'>";
							echo "<a href='ogladajSerial.php?serial=".$serial."&sezon=".$sezon."&odcinek=".$odcinek."'>";
							echo "<div id='nameFilm'>".$row4['name']."</div>";
							echo "<div id='nameFilm'>".$row3['name']."</div></a>";
							echo "<div id='year'>Data dodania:&nbsp;&nbsp;&nbsp;".$row3['data']."</div>";
							echo "<div id='autor'>Odcinek dodał:&nbsp;&nbsp;&nbsp;".$row3['autor']."</div>";
							echo "<hr>";
							echo "<button class='btn btn-success akceptO' id='akceptO' value='".$odcinek.".".$serial.".".$sezon.".".$row3['id']." ' >Akceptuj</button>
							<a href='parts/edytujOdcinek.php?id=".$row3['id']."&sezon=".$sezon."&serial=".$serial." ' target='_blank' class='btn btn-warning' >Edytuj</a>
							<button class='btn btn-danger deleteO' id='deleteO' value='".$odcinek.".".$serial.".".$sezon.".".$row3['id']."' >Usuń</button>";
						echo "</div>";
						}
						
						}
						echo "<div style='clera:both;'></div>";
					}else{
						echo "<div id='newsDesc'>Brak seriali do sprawdzenia</div>";
					}
				

				}else{
					echo "<div id='errorAdd'>Wystąpił nieporządany błąd.Spróbuj za chwile lub skontaktuj sie z nami podając numer błędu<br>ER.NUM #28</div>";
				}





		echo "</div>";

	?>


	<div id="adminContent">
		<div id='descReg'>Edytuj 
		<br>
		<br>
		<a href="#" id='filmButtonE'>Film</a>
		<a href="#" id='serialButtonE'>Serial</a>
		<a href="#" id="odcinekButtonE">Odcinek</a>
	</div>


	<?php
	//Edycja filmu
		echo "<div id='filmsEedit'>";

			if($res5 = $Connect->query("SELECT id,name FROM films WHERE 1")){
				$v = $res5->num_rows;
				if($v > 0){
					echo "<label for='editFIlm' style='color:#fff; margin-top:40px;'>Wybierz film:</label>";
					echo "<select onchange='Fselect(this.value)' style='margin-bottom: 30px;' name='toSerial' id='select' class='form-control'>";
					echo "<option value='0' >Wybierz film</option>";
					while($row = $res5->fetch_assoc()){
						echo "<option id='".$row['id']."' value='".$row['id']."' class='selectFilm' >".$row['name']."</div>";
					}
					echo "</select>";

					echo "<div id='editFiled'></div>";
				}
			}

		echo "</div>";

	?>


	<?php

		//Edycja serialu
		echo "<div id='erialEdit'>";
		if($res6 = $Connect->query("SELECT id,name FROM serials WHERE 1")){
			$v = $res6->num_rows;
			if($v > 0){
				echo "<label for='editFIlm' style='color:#fff; margin-top:40px;'>Wybierz serial:</label>";
				echo "<select onchange='Sselect(this.value)' style='margin-bottom: 30px;' name='toSerial' id='select' class='form-control'>";
				echo "<option value='0' >Wybierz serial</option>";
				while($row = $res6->fetch_assoc()){
						echo "<option id='".$row['id']."' value='".$row['id']."' class='selectFilm' >".$row['name']."</div>";
					}
					echo "</select>";

					echo "<div id='editFiledSerial'></div>";
			}
		}
		echo "</div>";
	?>



	<?php
		//Edycja odcinka
		echo "<div id='editOdcinek'>";
			if($res7 = $Connect->query("SELECT id,name FROM serials WHERE 1")){
				$v = $res7->num_rows;
				if($v > 0){
					echo "<label for='editFIlm' style='color:#fff; margin-top:40px;'>Wybierz serial w którym chcesz edytować odcinek:</label>";
					echo "<select onchange='Oselect(this.value)' style='margin-bottom: 30px;' name='toSerial' id='select' class='form-control'>";
					echo "<option value='0' >Wybierz serial</option>";
					while($row = $res7->fetch_assoc()){
						echo "<option id='".$row['id']."' value='".$row['id']."' class='selectFilm' >".$row['name']."</div>";
					}
					echo "</select>";
					echo "<div id='editFiledOdcinek'></div>";
					echo "<div id='selectSezon'></div>";
					echo "<div id='fieldEdit'></div>";
				}
			}

		echo "</div>";

		$Connect->close();
	?>








<script>
	
	$('#filmsCheck').hide();
	$('#serialsCheck').hide();
	$('#odcCheck').hide();
	$("#filmsEedit").hide();
	$("#erialEdit").hide();
	$("#editOdcinek").hide();
	function Fselect(val){

			document.getElementById('editFiled').innerHTML = '';

			var string = "id=" + val;
			var request = $.ajax({
			url:"parts/edytujDodanyFilm.php",
			type: "POST",
			datatype: "json",
			data: string
		});


			request.done(function(html){
				var array = $.parseJSON(html);
				if(array['ok'] == '1'){
					$("#editFiled").append('<div id="formFilm"><div id="descReg">Edycja filmu</div><form method="post" action="parts/edytujDodanyFilm.php"><input type="hidden" name="idFilm" value="'+val+'" ><label for="name" >Tytuł filmu: </label><input type="text" name="name" class="form-control" value="'+ array['name'] +'"> <label for="descriptionFilm" >Opis filmu: </label><textarea style="margin-bottom: 30px;" class="form-control" name="descriptionFilm">'+ array['description'] +'</textarea><label for="year1" >Rok wydania filmu: </label><input type="text" name="year1" class="form-control" value="'+ array['data'] +'"><label for="image" >Okładka filmu: </label><input type="text" name="image" class="form-control" value="'+array['image']+'"><label for="link" >Url do filmu: </label><input type="text" name="link" class="form-control" value="'+array['link']+'"><label for="filmweb" >Url do filmwebu: </label><input type="text" name="filmweb" class="form-control" value="'+array['filmweb']+'"><label for="versionFilm">Wersja:</label><select style="margin-bottom: 30px;" name="versionFilm" class="form-control"><option>'+ array['version'] +'</option><option>Lektor</option><option>Dubbing</option><option>Napisy</option><option>ENG</option></select><label for="categoryFilm">Gatunek:</label><select style="margin-bottom: 30px" name="categoryFilm" class="form-control"><option>Kategorie</option><option>'+array['category']+'</option><option>Akcji</option><option>Animacje</option><option>Biograficzne</option><option>Dokumentalne</option><option>Dramat</option><option>Edukacyjny</option><option>Erotyczny</option><option>Familijny</option><option>Fantasy</option><option>Filmy HD</option><option>Historyczny</option><option>Horror</option><option>Katastroficzny</option><option>Komedia</option><option>Kostiumowy</option><option>Kryminał</option><option>Melodramat</option><option>Musical</option><option>Muzyczny</option><option>Przygodowy</option><option>Przyrodniczy</option><option>Psychologiczny</option><option>Romans</option><option>Satyra</option><option>Sci-fi</option><option>Sensacyjny</option><option>Sporotowy</option><option>Thiller</option><option>Western</option><option>Wojenny</option></select><input type="submit" name="submit" id="addButton" class="red push_button" value="Edytuj"></form>');
				}else if(array['ok'] == '0' ){
					$("#editFiled").append("<div id='newsDesc'>Coś poszło nie tak</div>");
				}else if( array['ok'] == '2' ){

				}
			})

	}

	function Sselect(val){

		document.getElementById('editFiledSerial').innerHTML = '';
			var string = "id=" + val;
			var request = $.ajax({
			url:"parts/edytujDodanySerial.php",
			type: "POST",
			datatype: "json",
			data: string
		});
		request.done(function(html){
		var array = $.parseJSON(html);
				if(array['ok'] == '1'){
					$("#editFiledSerial").append('<div id="formFilm"><div id="descReg">Edycja serialu</div><form method="post" action="parts/edytujDodanySerial.php"><input type="hidden" name="idSerialu" value="'+val+'" ><input type="hidden" name="idFilm" value="'+val+'" ><label for="name" >Tytuł serialu: </label><input type="text" name="name" class="form-control" value="'+ array['name'] +'"> <label for="descriptionFilm" >Opis serialu: </label><textarea style="margin-bottom: 30px;" class="form-control" name="descriptionFilm">'+ array['description'] +'</textarea><label for="year1" >Rok wydania serialu: </label><input type="text" name="year1" class="form-control" value="'+ array['data'] +'"><label for="image" >Okładka: </label><input type="text" name="image" class="form-control" value="'+array['image']+'"><label for="filmweb" >Url do filmwebu: </label><input type="text" name="filmweb" class="form-control" value="'+array['filmweb']+'"><label for="versionFilm">Wersja:</label><select style="margin-bottom: 30px;" name="versionFilm" class="form-control"><option>'+ array['version'] +'</option><option>Lektor</option><option>Dubbing</option><option>Napisy</option><option>ENG</option></select><label for="categoryFilm">Gatunek:</label><select style="margin-bottom: 30px" name="categoryFilm" class="form-control"><option>Kategorie</option><option>'+array['category']+'</option><option>Akcji</option><option>Animacje</option><option>Biograficzne</option><option>Dokumentalne</option><option>Dramat</option><option>Edukacyjny</option><option>Erotyczny</option><option>Familijny</option><option>Fantasy</option><option>Filmy HD</option><option>Historyczny</option><option>Horror</option><option>Katastroficzny</option><option>Komedia</option><option>Kostiumowy</option><option>Kryminał</option><option>Melodramat</option><option>Musical</option><option>Muzyczny</option><option>Przygodowy</option><option>Przyrodniczy</option><option>Psychologiczny</option><option>Romans</option><option>Satyra</option><option>Sci-fi</option><option>Sensacyjny</option><option>Sporotowy</option><option>Thiller</option><option>Western</option><option>Wojenny</option></select><input type="submit" name="submit" id="addButton" class="red push_button" value="Edytuj"></form>');
				}else if(array['ok'] == '0' ){
					$("#editFiledSerial").append("<div id='newsDesc'>Coś poszło nie tak</div>");
				}else if( array['ok'] == '2' ){
				}
			})

	}



	function Oselect(val){

		document.getElementById('editFiledOdcinek').innerHTML = '';
		var string = "id=" + val;
		var request = $.ajax({
			url:"parts/edytujDodanyOdcinek.php",
			type: "POST",
			datatype: "json",
			data: string
		});

		request.done(function(html){
			var array = $.parseJSON(html);

			$("#editFiledOdcinek").append("<label for='editFIlm' style='color:#fff; margin-top:40px;'>Sezon:</label>");
			$("#editFiledOdcinek").append("<select onchange='Suchselect(this.value,"+val+")' class='form-control' style='margin-bottom: 50px;' name='nrsezon' id='nrsezon'>");
			while(array['sezony'] >= 1){
				$("#nrsezon").append("<option>"+ array['sezony'] +"</option>");
				array['sezony']--;
			}
			$("#editFiledOdcinek").append("</select>");


		})

	}



	function Suchselect(val,val1){
		document.getElementById('selectSezon').innerHTML = '';
		var string = "val=" + val + "&val1=" + val1;
		var request = $.ajax({
			url:"parts/edytujDodanyOdcinek.php",
			type: "POST",
			datatype: "json",
			data: string
		});

		request.done(function(html){
			var array = $.parseJSON(html);
			if(array['ok'] == '0'){
				$("#selectSezon").append("<div id='newsDesc'>Coś poszło nie tak</div>");
			}
				$("#selectSezon").append("<label for='nrsezon1' style='color:#fff; margin-top:20px;'>Odcinek:</label>");
				$("#selectSezon").append("<select onchange='Editselect(this.value,"+val+","+val1+")' class='form-control' style='margin-bottom: 40px;' name='nrsezon1' id='nrsezon1'>");
				while(array['odcinki'] >= 1){
				$("#nrsezon1").append("<option>"+ array['odcinki'] +"</option>");
				array['odcinki']--;
				}
				$("#selectSezon").append("</select>");
			
		})

	}


	function Editselect(odc,sezon,serial){
		document.getElementById('fieldEdit').innerHTML = '';
		var string = 'odc=' + odc + "&sezon="+ sezon + "&serial=" + serial;
		var request = $.ajax({
			url:"parts/edytujDodanyOdcinek.php",
			type: "POST",
			datatype: "json",
			data: string
		});
		request.done(function(html){
			var array = $.parseJSON(html);

			if(array['ok'] == '0'){
				$("#fieldEdit").append("<div id='newsDesc'>Coś poszło nie tak</div>");
			}else{
				$("#fieldEdit").append('<div id="formFilm">	<div id="descReg">Edycja odcinka</div> 	<form method="post" action="parts/edytujDodanyOdcinek.php" ><input type="hidden" name="causeOdc" value="odcinek.'+odc+'.sezon.'+sezon+'.serial.'+serial+'" >	<label for="name" >Numer odcinka: </label>      <input type="text" name="nr" class="form-control" value="'+array['nr']+'"><label for="name" >Tytuł: </label>		<input type="text" name="name" class="form-control" value="'+ array['name'] + '"><label for="link" >Url: </label><input type="text" name="link" class="form-control" value="'+array['link']+'"><input type="submit" name="submit" id="addButton" class="red push_button" value="Edytuj">')
			}

				

			

		})
	}





	$(document).ready(function(){



		$(".akcept").click(function(){

			var id = $(this).attr("value");
			var string = 'id='+ id;

			var request = $.ajax({
				url:"parts/zaakceptowany.php",
				type: "POST",
				datatype: "json",
				data: string
			});

			request.done(function(html){
				var array = $.parseJSON(html);

				if(array == 1){
					$("#newsDesc").after("<div id='info'>Zaakceptowano film</div>");
					$("#info").fadeOut(2500);
					$("#"+id+"film").remove();
				}else{
					$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
				}

			});

		});


		$(".delete").click(function(){
			var id = $(this).attr("value");
			var string = 'id='+ id;

			var request = $.ajax({
				url: "parts/usun.php",
				type: "POST",
				datatype: "json",
				data: string
			});

			request.done(function(html){
				var array = $.parseJSON(html);

				if(array == 1){
					$("#newsDesc").after("<div id='info'>Film został usunięty</div>");
					$("#info").fadeOut(2500);
					$("#"+id+"film").remove();
				}else{
					$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
				}

			});
		});

		///////////////////////////////////////////////////////////////////////////////////////////////////////

		$(".akceptS").click(function(){
			var id = $(this).attr("value");
			var string = 'id='+ id;

			var request = $.ajax({
				url: "parts/zaakceptowanyS.php",
				type: "POST",
				datatype: "json",
				data: string
			});
			request.done(function(html){
				var array = $.parseJSON(html);
				if(array == 1){
					$("#newsDesc").after("<div id='info'>Zaakceptowano film</div>");
					$("#info").fadeOut(2500);
					$("#"+id+"serial").remove();
				}else{
					$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
				}
			});
		});


	$('.deleteS').click(function(){
			var id = $(this).attr("value");
			var string = 'id='+ id;
			var request = $.ajax({
				url: "parts/usunS.php",
				type: "POST",
				datatype: "json",
				data: string
			});
			request.done(function(html){
				var array = $.parseJSON(html);
				if(array == 1){
					$("#newsDesc").after("<div id='info'>Serial został usunięty</div>");
					$("#info").fadeOut(2500);
					$("#"+id+"serial").remove();
				}else{
					$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
				}

			});
	});

	//////////////////////////////////////////////////////////////////////////////////////////////////////////


	$(".akceptO").click(function(){
		var id = $(this).attr("value");
		var string = 'id='+ id;
		var request = $.ajax({
			url: "parts/zaakceptowanyO.php",
			type: "POST",
			datatype: "json",
			data: string
		});
		request.done(function(html){
			var array = $.parseJSON(html);
			if(array == 1){
				$("#newsDesc").after("<div id='info'>Zaakceptowano odcinek film</div>");
				$("#info").fadeOut(2500);
				$("#"+id+"odc").remove();
			}else{
				$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
			}
		});

	});


	$(".deleteO").click(function(){
		var id = $(this).attr("value");
		var string = 'id='+ id;
		var request = $.ajax({
			url: "parts/usunO.php",
			type: "POST",
			datatype: "json",
			data: string
		});
		request.done(function(html){
			var array = $.parseJSON(html);
			if(array == 1){
				$("#newsDesc").after("<div id='info'>Odcinek został usunięty</div>");
				$("#info").fadeOut(2500);
				$("#"+id+"odc").remove();
			}else{
				$("#newsDesc").after("<div id='info'>Coś poszło nie tak</div>");
			}
		});
	});




		$("#filmButton").click(function(){

			$('#filmsCheck').toggle();
			$("#serialsCheck").hide();
			$("#odcCheck").hide();

		});

		$("#serialButton").click(function(){
			$("#serialsCheck").toggle();
			$('#filmsCheck').hide();
			$("#odcCheck").hide();
		});

		$("#odcinekButton").click(function(){
			$("#odcCheck").toggle();
			$("#serialsCheck").hide();
			$('#filmsCheck').hide();
		})
		$("#filmButtonE").click(function(){
			$("#filmsEedit").toggle();
			$("#erialEdit").hide();
			$("#editOdcinek").hide();
		});

		$("#serialButtonE").click(function(){
			$("#erialEdit").toggle();
			$("#filmsEedit").hide();
			$("#editOdcinek").hide();
		});
		$("#odcinekButtonE").click(function(){
			$("#editOdcinek").toggle();
			$("#erialEdit").hide();
			$("#filmsEedit").hide();
		})


	});


</script>