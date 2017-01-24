<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE na gorze dokumentu!!
	session_start();
	//zwroci wartosc true jesli wartosc nie bedzie ustawiony. Po wylogowaniu sie z strony nie da rady na nia wrocic.
	if(!isset($_SESSION['zalogowany']))
	{
		//przekierowanie na strone logowania
		header('Location: login.php');
		//wstrzymanie dalszego wykonywania skryptu 
		exit();
	}
	
?>

<!DOCTYPE HTML> <!--definiuje wersje html5 -->
<html lang="pl">
<head>

	<meta charset="utf-8" /> <!-- ustawienie odpowiedniego stylu znakowego (mustbe) -->
	<title>User</title>  <!-- tytul strony -->
	<meta name="description" content="User database" />  <!-- opis zakladki -->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!-- odpowiedni format dla 
																													przegladarek (mustbe!!) -->
	<link rel="stylesheet" href="style.css" type="text/css" />  
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />     <!--dodanie obrazkow z fontello -->
	<!--head zawartosc niedostepna do podgladu zawiera ogolne informacje oraz formaty projektowania strony -->

	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
</head>

<body>
		<a href="index.php" class="header">
				<div class="logorocket">
					<i class="icon-rocket"></i>
				</div>
			
				<div class="logo">
					<span style="color: #335284"> Choose</span>YourWay.com 
				</div>
				<div style="clear:both;"></div>
		</a>
		
	
			<?php
					echo "<p><span style='color: white'>Witaj ".$_SESSION['user'].'! </span></p>';
					echo "<p><span style='color: white'><b>Zarobki</b>: ".$_SESSION['zarobki'];
					echo "| <b>Wydatki</b>: ".$_SESSION['wydatki'];
					echo "| <b>Oszczędności</b>: ".$_SESSION['oszczednosci']."|</span></p>";
					
					echo "<p><span style='color: white'><b>E-mail</b>: ".$_SESSION['email'];
					echo "<br /><b>Dni Premium</b>: ".$_SESSION['dnipremium']."</span></p>";
					
					echo "<span style='color:white'>[<a href ='logout.php' class='tilelinkhtml'>Logout! </a>]</span></p>";
			?>


</body>
</html>