<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE!!
	session_start();
	
		//podtrzymuje sesje, zalogowanego uzytkownika
		if (!isset($_SESSION['successfulregistration'])) 
	{
		//przejscie do panelu uzytkownika
		header('Location: login.php');
		//zakonczenie funkcji, brak wykonywania dalszej czesi kodu
		exit();
	}
	else
	{
		unset($_SESSION['successfulregistration']);
	}
	
?>

<!DOCTYPE HTML> <!--definiuje wersje html5 -->
<html lang="pl">
<head>

	<meta charset="utf-8" /> <!-- ustawienie odpowiedniego stylu znakowego (mustbe) -->
	<title>Welcome</title>  <!-- tytul strony -->
	<meta name="description" content="Welcome on website " />  <!-- opis zakladki -->
	
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
		
		<div class="welcome">
				Thank you for creating a new account!
				<br/><br/>
		
		
				<a href = "login.php" class="tilelinkhtml"> [Login on your account!] </a>
		</div>
	

</body>
</html>