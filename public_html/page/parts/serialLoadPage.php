<?php
	
	$localhost = 'localhost';
	$name = 'root';
	$password = '';
	$db = 'films';
	$id = $_GET['id'];
	$Connect = new mysqli($localhost,$name,$password,$db);
	if($Connect->connect_errno != 0){
		echo "Error: ".$Connect->connect_errno; }

	if($res = $Connect->query("SELECT * FROM serials WHERE id = '$id' ")){
		$v = $res->num_rows;
		if($v > 0){

			echo "<div id='serialTab'>";
			$row = $res->fetch_assoc();
			$description1= substr($row['description'], 0,1000)."...";
			echo "<img src='".$row['image']."' width='215' height='300' id='imgSerial' >";
			echo "<div class='nameSerial'>".$row['name']."</div><br>";
			echo "<div class='descSerial'>".$description1."</div>";
			echo "<div class='categorySerial'>".$row['category']."</div>";
			echo "<div class='rateSerial'>Ocen serialu: ".$row['rate']."</div>";
			echo "<div class='filmwebSerial'><a href='".$row['filmweb']."' target='_blank' >Filmweb</a></div>";
			echo "<div class='autorSerial'>Serial dodał: ".$row['autor']."</div>";
			echo "</div>";
			echo "<div style='clear:both;'></div>";



			if($res1 = $Connect->query("SELECT * FROM odcinki WHERE idserial = '$id' ")){
				$b = $res1->num_rows;

				if($b > 0){
					echo "<div id='listSeasons'>";
					while($row['sezons'] >= 1){
						echo "<div id='numSeasons'> Sezon ". $row['sezons']."</div>";
						$sezonnr = $row['sezons'];
						if($res1 = $Connect->query("SELECT * FROM odcinki WHERE idserial = '$id' AND sezons = '$sezonnr' AND admincheck = '1' ORDER BY nr ")){
								$n = $res1->num_rows;
								if($n > 0){
									while($row2 = $res1->fetch_assoc()){
									echo "<div class='linkSerial'>";
					 				echo "<a  href='ogladajSerial.php?serial=".$id."&sezon=".$sezonnr."&odcinek=".$row2['id']."'>";
					 				echo $row2['name'];
									echo "</a>";
									echo "</div>";
								}
							}else{echo "<div class='blankSerial'>Brak odcinków</div>";}
						}
						$row['sezons']--;
					}
					echo "</div>";

				}else{
					echo "<div id='listSeasons'>";
						while($row['sezons'] >= 1){
							echo "<div id='numSeasons'> Sezon ". $row['sezons']."</div>";
							$sezonnr = $row['sezons'];
							if($res1 = $Connect->query("SELECT * FROM odcinki WHERE idserial = '$id' AND sezons = '$sezonnr' ORDER BY nr ")){
								$n = $res1->num_rows;
								if($n > 0){
									while($row2 = $res1->fetch_assoc()){
									echo "<div class='linkSerial'>";
					 				echo "<a  href='ogladajSerial.php?serial=".$id."&sezon=".$sezonnr."&odcinek=".$row2['id']."'>";
					 				echo $row2['name'];
									echo "</a>";
									echo "</div>";
								}
							}else{echo "<div class='blankSerial'>Brak odcinków</div>";}
						}
						$row['sezons']--;
					}
					echo "</div>";
				}
			}else{
				echo "<div id='errorAdd'>Coś poszło nie tak. Sprubój za chwile.</div>";
			}

		}
	}

	$Connect->close();








					// while($row1 = $res1->fetch_assoc()){
					// 	echo "<div id='numSeasons'> Sezon ". $i."</div>";
					// 	if($res2 = $Connect1->query("SELECT * FROM `sezon ".$i."` WHERE admincheck = '1' ")){
					// 		$n = $res2->num_rows;
					// 		if($n > 0){
					// 			while($row2 = $res2->fetch_assoc()){
					// 				echo "<div class='linkSerial'>";
					// 				echo "<a  href='ogladajSerial.php?serial=".$db1."&sezon=".$i."&odcinek=".$row2['id']."'>";
					// 				echo $row2['name'];
					// 				echo "</a>";
					// 				echo "</div>";
					// 			}
					// 		}else{
					// 			echo "<div class='blankSerial'>Brak odcinków</div>";
					// 		}
					// 	}else{

					// 	}	

					// 		$i++;
					// }


?>