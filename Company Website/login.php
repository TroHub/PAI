<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE!!
	session_start();
	
		//podtrzymuje sesje, zalogowanego uzytkownika
		if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		//przejscie do panelu uzytkownika
		header('Location: panel_uzytkow.php');
		//zakonczenie funkcji, brak wykonywania dalszej czesi kodu
		exit();
	}
	
?>

<!DOCTYPE HTML> <!--definiuje wersje html5 -->
<html lang="pl">
<head>

	<meta charset="utf-8" /> <!-- ustawienie odpowiedniego stylu znakowego (mustbe) -->
	<title>login</title>  <!-- tytul strony -->
	<meta name="description" content="Login to website " />  <!-- opis zakladki -->
	
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
		
	
	<br /><br />
	
	<div class= "logowanie">
		<form action="signin.php" method="post">														<!-- formularz logowania -->
			
			
			<div class="welcome">
				Login to your account<br /><br />
			</div>
			Username <br /> <input type="text" name="login" /> <br />
			Password <br /> <input type="password" name="password" /> <br />
				<br /><br />
				<input type="submit" value="SIGN IN" />
				<br /><br />
		</form>
	
			<a href = "registration.php" class="tilelinkhtml"> <span style="color: white"> Create new account! </span></a>
			<br/><br/>

		<?php
			//informacja o bledzie logowania
			if(isset($_SESSION['blad']))
			echo $_SESSION['blad'];
		?>
	</div>
	
</body>
</html>