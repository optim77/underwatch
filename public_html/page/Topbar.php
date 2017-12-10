<?php
	ini_set( 'display_errors', 'On' ); 
	error_reporting( E_ALL );
	if(isset($_SESSION['islogin']))
	{
		if($_SESSION['islogin'] == true)
		{
			echo "<div id='topbar'>";
			echo "<div id='logoTheme'><a id='logo' href='http://underwatch.pl/'><img src='http://underwatch.pl/res/images/logo.png' ></a></div>";
			echo "<center>";
			echo "<ul id='topbarLine' >";
			echo "<li><a href='http://underwatch.pl/index.php'  >Strona główna</a></li>";
			echo "<li><a href='http://underwatch.pl/page/filmy.php'  >Filmy</a></li>";
			echo "<li><a href='http://underwatch.pl/page/seriale.php'  >Seriale</a></li>";
			echo "<li><a href='http://underwatch.pl/page/dodaj.php'  >Dodaj</a></li>";
			echo "<li><a href='http://underwatch.pl/page/profil.php'  >Profil</a></li>";
			echo "<li style=''><a href='href='http://underwatch.pl/page/logout.php' >Wyloguj</a></li>";
			if(isset($_SESSION['admin'])){
				echo "<li style=''><a href='http://underwatch.pl/page/admin.php' class='' >Panel administracyjny</a></li>"; 
			}
			echo "<ul>";
			echo "</center>";
			echo "</div>";
		}
		else
		{
		}
	}
	else
	{
		echo "<div id='topbar'>";
		echo "<div id='logoTheme'><a id='logo' href='http://underwatch.pl/'><img src='http://underwatch.pl/res/images/logo.png' ></a></div>";
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

?>