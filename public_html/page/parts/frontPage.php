<?php
	
	$localhost = 'localhost';
	$nameH = 'underwat_root';
	$passwordH = 'kubenq';
	$db = 'underwat_films';
	$count = 0;
	$Connect = new mysqli($localhost,$nameH,$passwordH,$db);
	if($Connect->connect_errno != 0){
		echo "Error: ".$Connect->connect_errno; 
	}


	//Wyszukiwanie filmu
	echo "<div id='serachSpace'>";
	echo "<form method='POST' action='#'>";
	echo '<input type="text"  id="find" class="form-control" name="find" placeholder="Wyszukaj film lub serial..." >';
	echo "<input type='button' value='Szukaj' class='btn btn-warning' id='buttonFind' name='button' >";
	echo "</form>";
	echo "</div>";



	################################

	//Polecane



	echo "<div id='contentM'>";
	
	echo "<div id='images'>";
	echo "<div id='spaceMaker'>Polecane</div>";
	echo "<div id='newsDesc'>Najnowsze filmy</div>";
	echo "<ul class='images'>";

	if ($res = $Connect->query("SELECT * FROM films WHERE admincheck = '1' ORDER BY id DESC LIMIT 15 ")) {
			$v = $res->num_rows;
			if($v > 0){
				while($row = $res->fetch_assoc()){
						if($count == 0)
						{
							echo "<li>";
						}
						$count++;
						echo "<a href='page/film.php?id=".$row['id']." ' class='nameNews' ><img src='".$row['image']."'  width='215px'  height='300' ></a>";
						if($count == 5)
						{
							echo "</li>";
							$count = 0;
						}
						
					}
				}
			}

	
	echo "</div>";
	echo "</ul>";
	echo "<div style='clear: both;'></div>";	
	echo "</div>";


	// echo "<div id='content2'>";
	// echo "<div id='rate'>";
	// echo "<div id='newsDesc'>Filmy najwyżej oceniane</div>";
	// echo "<ul class='rate'>";

	// 	if($res2 = $Connect->query("SELECT * FROM toprate WHERE 1")){

	// 		$v = $res2->num_rows;
	// 		if($v > 0){
	// 			while($row = $res2->fetch_assoc()){
	// 				if($count == 0)
	// 					{
	// 						echo "<li>";
	// 					}
	// 					$count++;
	// 					echo "<a href='#' class='nameNews' ><img src='".$row['image']."'  width='300'  height='200' ></a>";
	// 					if($count == 5)
	// 					{
	// 						echo "</li>";
	// 						$count = 0;
	// 					}
	// 			}
	// 		}

	// 	}

	// echo "</ul>";
	// echo "</div>";
	// echo "<div style='clear: both;'></div>";
	// echo "</div>";



	echo "<div id='content3'>";
	echo "<div id='newsserial'>";
	echo "<div id='newsDesc'>Nowe seriale</div>";
	echo "<ul class='newsserial'>";
	if($res2 = $Connect->query("SELECT * FROM serials WHERE admincheck = '1'  LIMIT 20 ")){

			$v = $res2->num_rows;
			if($v > 0){
				while($row = $res2->fetch_assoc()){
					if($count == 0)
						{
							echo "<li>";
						}
						$count++;
						echo "<a href='page/serial.php?id=".$row['id']."' class='nameNews' ><img src='".$row['image']."'  width='215'  height='300' ></a>";
						if($count == 5)
						{
							echo "</li>";
							$count = 0;
						}
				}
			}

		}

	echo "</ul>";
	echo "</div>";
	echo "<div style='clear: both;'></div>";
	echo "</div>";

	$Connect->close();

	// echo "<div id='content4'>";
	// echo "<div id='toprateserials'>";
	// echo "<div id='newsDesc'>Seriale najwyżej oceniane</div>";
	// echo "<ul class='toprateserials'>";
	// if($res2 = $Connect->query("SELECT * FROM toprateserials WHERE 1")){

	// 		$v = $res2->num_rows;
	// 		if($v > 0){
	// 			while($row = $res2->fetch_assoc()){
	// 				if($count == 0)
	// 					{
	// 						echo "<li>";
	// 					}
	// 					$count++;
	// 					echo "<a href='#' class='nameNews' ><img src='".$row['image']."'  width='300'  height='200' ></a>";
	// 					if($count == 5)
	// 					{
	// 						echo "</li>";
	// 						$count = 0;
	// 					}
	// 			}
	// 		}

	// 	}

	// echo "</ul>";
	// echo "</div>";
	// echo "<div style='clear: both;'></div>";
	// echo "</div>";



	echo "<div id='redirect'>";
	echo "Chcesz zobaczyć więcej ?<br><br>";
	echo "<a href='page/filmy.php' class='' >Filmy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
	echo "<a href='page/seriale.php' class='' >Seriale</a>";
	echo "</div>";


?>



<script>
	

	$(document).ready(function(){
  $('.images').bxSlider();
  $('.videos').bxSlider();
  $('.rate').bxSlider();
  $('.newsserial').bxSlider();
  $('.toprateserials').bxSlider();

  		$(".push_button").click(function(){
			$("#category").toggle();
		});

		$("#buttonFind").click(function(){
		var val = $("#find").val();
		window.location.href = "/page/parts/szukaj.php?value="+ val;
	});

});

</script>