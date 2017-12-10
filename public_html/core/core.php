<?php




	class Service{
			
		function __construct($server,$user,$pass,$db){
        	$this->Connect = new mysqli($server,$user,$pass,$db);
       		$this->Connect->set_charset('utf8');
       		
    	}

		function __destruct(){
			$this->Connect->close();
		}

		function head(){
			//require_once(LOCAL.'\page\hide\head.php');
			require_once('http://underwatch.pl/page/hide/head.php');
		}
		function metaDescription($description){
			echo "<meta name='description'";
			echo "content=";
			echo $description;
			echo ">";
		}

		function metaTags($tags){
			echo "<meta name='keywords'";
			echo "content=";
			
			echo ">";
		}





		function Topbar()
		{
			//require_once(LOCAL."\\films\page\Topbar.php");
			if(isset($_SESSION['islogin'])){
				if($_SESSION['islogin'] == true){
					echo "<div id='topbar'>";
					echo "<div id='logoTheme'><a id='logo' href='http://underwatch.pl/'><img style='position: absolute;top: 2.5%;left: 50%;transform: translate(-50%, -50%);' src='http://underwatch.pl/res/images/logo.png' ></a></div>";
					echo "<center>";
					echo "<ul id='topbarLine' >";
					echo "<li><a href='http://underwatch.pl/index.php'  >Strona główna</a></li>";
					echo "<li><a href='http://underwatch.pl/page/filmy.php'  >Filmy</a></li>";
					echo "<li><a href='http://underwatch.pl/page/seriale.php'  >Seriale</a></li>";
					echo "<li><a href='http://underwatch.pl/page/dodaj.php'  >Dodaj</a></li>";
					echo "<li><a href='http://underwatch.pl/page/profil.php'  >Profil</a></li>";
					echo "<li style=''><a href='http://underwatch.pl/page/logout.php' >Wyloguj</a></li>";
					if(isset($_SESSION['admin'])){
						echo "<li style=''><a href='http://underwatch.pl/page/admin.php' class='' >Panel administracyjny</a></li>"; }
					echo "<ul>";
					echo "</center>";
					echo "</div>";
				}else{}
			}else{
				echo "<div id='topbar'>";
				echo "<div id='logoTheme'><a id='logo' href='http://underwatch.pl/'><img style='position: absolute;top: 2.5%;left: 50%;transform: translate(-50%, -50%);' src='http://underwatch.pl/res/images/logo.png' ></a></div>";
				echo "<center>";
				echo "<ul>";
				echo "<li><a href='http://underwatch.pl/index.php' class='btna btn-1' >Strona główna</a></li>";
				echo "<li><a href='http://underwatch.pl/page/filmy.php' class='' >Filmy</a></li>";
				echo "<li><a href='http://underwatch.pl/page/seriale.php' class='' >Seriale</a></li>";
				echo "<li><a href='http://underwatch.pl/page/dodaj.php' class='' >Dodaj</a></li>";
				echo "<li><a href='http://underwatch.pl/page/logowanie.php' class='' >Zaloguj</a></li>";
				echo "<li style=''><a href='http://underwatch.pl/page/rejestracja.php' class='' >Zarejestruj</a></li>";
				echo "<ul>";
				echo "</center>";
				echo "</div>";
			
	}


			//require_once('http://underwatch.stronazen.pl/page/Topbar.php');

		}

		function Front()
		{
			//require_once(LOCAL."\\films\page\parts\\frontPage.php");
			require_once('http://underwatch.pl/page/parts/frontPage.php');
		}

		function Films(){

			//require_once(LOCAL."\\films\page\parts\\filmsPage.php");
			require_once('http://underwatch.pl/page/parts/filmsPage.php');
		}

		function Serials(){

			//require_once(LOCAL."\\films\page\parts\\serialPage.php");
			require_once('http://underwatch.pl/page/parts/serialPage.php');
		}

		function RegistryForm(){

			//require_once(LOCAL."\\films\page\parts\\registryPage.php");
			require_once('http://underwatch.pl/page/parts/registryPage.php');
		}

		function Login(){

			//require_once(LOCAL."\\films\page\parts\\loginPage.php");
			require_once('http://underwatch.pl/page/parts/loginPage.php');
		}

		function Add()
		{
			//require_once(LOCAL."\\films\page\parts\\addPage.php");
			require_once('http://underwatch.pl/page/parts/addPage.php');
		}

		function Profil()
		{
			//require_once(LOCAL."\\films\page\parts\\profilPage.php");
			require_once('http://underwatch.pl/page/parts/profilPage.php');
		}

		function Admin()
		{
			//require_once(LOCAL."\\films\page\parts\\adminPage.php");
			require_once('http://underwatch.pl/page/parts/adminPage.php');
		}

		function WatchFilm()
		{
			//require_once(LOCAL."\\films\page\parts\\filmPage.php");
			require_once('http://underwatch.pl/page/parts/filmPage.php');
		}

		function SerialLoad()
		{
			//require_once(LOCAL."\\films\page\parts\\serialLoadPage.php");
			require_once('http://underwatch.pl/page/parts/serialLoadPage.php');
		}

		function WatchSerial()
		{
			//require_once(LOCAL."\\films\page\parts\\watchSerialPage.php");
			require_once('http://underwatch.pl/page/parts/watchSerialPage.php');
		}

		function Footer()
		{
			//require_once(LOCAL."\\films\page\\DownFooter.php");
			require_once('http://underwatch.pl/page/DownFooter.php');
		}

		function loadCategory($category){


			$localhost = 'localhost';
			$name = 'underwat_root';
			$password = 'kubenq';
			$db = 'underwat_films';
			$Connect = new mysqli($localhost,$name,$password,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; 
			}
			echo "<div id='content'>";
			echo "<div id='Desc'>".$category."</div>";
			echo "<ul class='allFilms'>";

			if($res = $Connect->query("SELECT * FROM films WHERE category = '$category' ")){

				$v = $res->num_rows;
				if($v > 0){

					while($row = $res->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='http://underwatch.pl/page/film.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
						echo "</li>";
					}
				echo "</ul>";
				echo "</div>";

				}else
				{
					echo "<div id='info'>Brak filmów w danej kategorii</div>";
				}

			}else{
				echo "<div id='info'>Brak filmów w danej kategorii.</div>";
			}

			$Connect->close();
		}

		function loadCategorySerial($category){
			$localhost = 'localhost';
			$name = '';
			$password = '';
			$db = '';
			$Connect = new mysqli($localhost,$name,$password,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; 
			}
			echo "<div id='content'>";
			echo "<div id='Desc'>".$category."</div>";
			echo "<ul class='allFilms'>";

			if($res = $Connect->query("SELECT * FROM serials WHERE category = '$category' ")){

				$v = $res->num_rows;
				if($v > 0){

					while($row = $res->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='http://underwatch.pl/page/serial.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
						echo "</li>";
					}
				echo "</ul>";
				echo "</div>";

				}else
				{
					echo "<div id='info'>Brak seriali w danej kategorii</div>";
				}

			}else{
				echo "<div id='info'>Brak seriali w danej kategorii.</div>";
			}

			$Connect->close();
		}
		

		function searchFilm($search){
			$search = filter_var($search, FILTER_SANITIZE_STRING);
			$localhost = 'localhost';
			$name = '';
			$password = '';
			$db = '';
			$Connect = new mysqli($localhost,$name,$password,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; 
			}
			echo "<div id='content'>";
			echo "<div id='Desc'>".$search."</div>";
			echo "<ul class='allFilms'>";
			if($res = $Connect->query("SELECT id,name,image FROM films WHERE name LIKE  '%" . $search . "%' AND admincheck = '1' ")){
				$v = $res->num_rows;
				if($v > 0){
					while($row = $res->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='../film.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
						echo "</li>";
					}
				echo "</ul>";
				echo "</div>";
				}else{
					echo "<div class='info'>Brak filmów o danej nazwie</div>";
				}
			}else{
				echo "<div class='info'>Brak filmów o danej nazwie.</div>";
			}
			$Connect->close();
		}


		function searchSerial($search){

			$search = filter_var($search, FILTER_SANITIZE_STRING);
			$localhost = 'localhost';
			$name = '';
			$password = '';
			$db = '';
			$Connect = new mysqli($localhost,$name,$password,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; 
			}
			echo "<div id='content'>";
			echo "<div id='Desc'>".$search."</div>";
			echo "<ul class='allFilms'>";
			if($res = $Connect->query("SELECT id,name,image FROM serials WHERE name LIKE  '%" . $search . "%' AND admincheck = '1' ")){
				$v = $res->num_rows;
				if($v > 0){
					while($row = $res->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='../serial.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
						echo "</li>";
					}
				echo "</ul>";
				echo "</div>";
				}else{
					echo "<div class='info'>Brak seriali o danej nazwie</div>";
				}
			}else{
				echo "<div class='info'>Brak seriali o danej nazwie.</div>";
			}
			$Connect->close();
		}

		function searchB($search){
			//$search = mysql_real_escape_string($search);
			$search = filter_var($search, FILTER_SANITIZE_STRING);
			$localhost = 'localhost';
			$name = '';
			$password = '';
			$db = '';
			$Connect = new mysqli($localhost,$name,$password,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; 
			}
			echo "<div id='content'>";
			echo "<div id='Desc'>".$search."</div>";
			echo "<ul class='allFilms'>";

			if($res = $Connect->query("SELECT id,name,image FROM films WHERE name LIKE  '%" . $search . "%' ")){
				if($res1 = $Connect->query("SELECT id,name,image FROM serials WHERE name LIKE  '%" . $search . "%' ")){

					$v = $res->num_rows;
					$b = $res->num_rows;
					if($v > 0){
						while($row = $res->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='../film.php?id=".$row['id']."' class='linkImage' ><img src='".$row['image']."' width='215' height='300' /></a>";
						echo "</li>";
						}
					}
					if($b > 0){
						while($row1 = $res1->fetch_assoc()){
						echo "<li class='onceFilm' id='".$row1['id']."'>";
						//echo "<span>".$row['name']."</span>";
						echo "<a href='../serial.php?id=".$row1['id']."' class='linkImage' ><img src='".$row1['image']."' width='215' height='300' /></a>";
						echo "</li>";
						}

					}

				}
			}else{
				echo "<div class='info'>Brak seriali o danej nazwie.</div>";
			}

			$Connect->close();
		}

		function PageWatchFilm($id){
			$localhost = 'localhost';
			$nameHost = '';
			$passwordHost = '';
			$db = '';
			$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; }
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
		}


		function PageSerialList($id){
			$localhost = 'localhost';
			$nameHost = '';
			$passwordHost = '';
			$db = '';
			$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
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
					 				echo "<a  href='ogladajSerial.php?serial=".$id."&sezon=".$sezonnr."&odcinek=".$row2['nr']."'>";
					 				echo $row2['nr'].".".$row2['name'];
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
			}else{echo "<div id='errorAdd'>Coś poszło nie tak. Sprubój za chwile.</div>";}
		}
	}$Connect->close();
	}

		function WatchSerialPage($serial,$sezon,$odc){
			$localhost = 'localhost';
			$nameHost = '';
			$passwordHost = '';
			$db = '';
			$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; }

			if($res = $Connect->query("SELECT * FROM odcinki WHERE idserial = '$serial' AND sezons = '$sezon' AND nr = '$odc' ")){
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
					}else{echo "<div id='newsDesc'>Nie znaleziono odcinka</div>";
					}
			}else{echo "<div id='errorAdd'>Error</div>";
		}$Connect->close();
	}


	function LoadTags($id){
			$localhost = 'localhost';
			$nameHost = '';
			$passwordHost = '';
			$db = '';
			$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; }

				if($res = $Connect->query("SELECT name FROM films WHERE id = '$id' ")){

					$row = $res->fetch_assoc();

					echo "<meta name='keywords' content='".$row['name'].",underwatch,filmy,seriale,online,daromwe,oglądaj,za,darmo,baza,bez,rejestracji,free'>";

				}
				//$Connect->query();
	}


	function LoadTagsSerial($id){

			$localhost = 'localhost';
			$nameHost = '';
			$passwordHost = '';
			$db = '';
			$Connect = new mysqli($localhost,$nameHost,$passwordHost,$db);
			if($Connect->connect_errno != 0){
				echo "Error: ".$Connect->connect_errno; }
			if($res = $Connect->query("SELECT name FROM serials WHERE id = '$id' ")){
				$row = $res->fetch_assoc();
				echo "<meta name='keywords' content='".$row['name'].",underwatch,filmy,seriale,online,daromwe,oglądaj,za,darmo,baza,bez,rejestracji,free'>";}
	}



	}

?>