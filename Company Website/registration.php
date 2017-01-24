<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE!!
	session_start();
	
	//isset sprawdzanie czy jest ustawiona zmienna (pojemnik)
	//sprawdzanie poprawnosci walidacji, danych wprowadzanych przez uzytkownika
	if (isset($_POST['email']))
	{
		//udana walidacja ok
		$everything_OK=true;
		
		//sprawdzenie poprawnosci nickname
		$nick= $_POST['nick'];
		
		//sprawdzenie dlugosci znakow dla nick
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$everything_OK=false;
			$_SESSION['e_nick'] = "Nick must have from 3 to 20 characters";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$everything_OK=false;
			$_SESSION['e_nick']="Nick must have only letter and number";
		}
		
		//sprawdzanie poprawnosci adresu email
		$email = $_POST['email'];
		
		//przefiltrowanie zmiennej
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email))
		{
			$everything_OK=false;
			$_SESSION['e_email']="Enter correct email adress!";
		}
		
		//sprawdzanie poprawnosci hasla
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		
		if ((strlen($password1) < 8) || (strlen($password1)>20))
		{
			$everything_OK=false;
			$_SESSION['e_password']="Password must have from 8 to 20 characters!";
		}
		
		if ($password1!=$password2)
		{
			$everything_OK=false;
			$_SESSION['e_password']="Password is not the same!";
		}
		
		//haszowanie haseł, zabezpieczanie przed wlamaniem
		//$password_hash = password_hash($password1, PASSWORD_DEFAULT);
		

		//akceptacja regulaminu
		if (!isset($_POST['regulations']))
		{
			$everything_OK=false;
			$_SESSION['e_regulations']="You must confirm regulations!";
		}
		
		//sprawdzanie recaptcha
		$sicret = "6LdIAxIUAAAAALqCH2DzdE_KzLEbaOVWcNQN4CFm";
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sicret.'&response='.$_POST['g-recaptcha-response']);
		
		//dekodowanie wartosci json - javascript object notation
		$answer = json_decode($check); 
		
		//sprawdzenie poprawnosci zaznaczonego recaptcha
		if ($answer->success==false)
		{
			$everything_OK=false;
			$_SESSION['e_recaptcha']="You are bot!";
		}
		
		//zabezpieczenie przed dublowaniem loginow
		//polaczenie z baza
		require_once "connect.php";
		//zabezpieczenie przed wyswietlaniem niechcianych informacji
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		//proba nawiazania polaczenia
		try
		{
			$polaczenie = new mysqli($host, $db_user,$db_password, $db_name);
				if ($polaczenie->connect_errno!=0)
				{
					throw new Exception(mysqli_connect_errno());
				}
				else
				{
					//sprawdzanie email. czy juz taki istnieje w bazie?
					$result = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
					
					if (!$result) throw new Exception($polaczenie->error);
					
					//informacja o ilosci takich samych maili
					$how_many_mails = $result->num_rows;
					if ($how_many_mails>0)
					{
						$everything_OK=false;
						$_SESSION['e_email']="This email already exists in the database!";
					}
					
					//sprawdzanie nicku. czy juz taki istnieje w bazie?
					$result = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
					
					if (!$result) throw new Exception($polaczenie->error);
					
					//informacja o ilosci takich samych nickow
					$how_many_nicks = $result->num_rows;
					if ($how_many_nicks>0)
					{
						$everything_OK=false;
						$_SESSION['e_nick']="This nick already exists in the database!";
					}
					
					//sprawdzenie poprawnosci wszystkich danych wprowadzonych. umieszczanie usera do bazy
					if ($everything_OK==true)
					{
						if ($polaczenie->query("INSERT INTO uzytkownicy VALUES(NULL,'$nick', '$password1','$email', 0, 0, 0, 14)"))
						{
							//zmienna sesyjna 
							$_SESSION['successfulregistration'] = true;
							header('Location: welcome.php');
						}	
						else
						{
							throw new Exception($polaczenie->error);
						}
						
						
					}
					
					
					$polaczenie->close();
				}
		}
		//przechwycenie bledow jesli jakies sie pojawia
		catch(Exception $e)
		{
			echo '<span style="color: red;">"Server Error. Sorry for bugs."</span>';
			echo '<br/>Information for dev: '.$e;
		}
		
	}
	
?>

<!DOCTYPE HTML> <!--definiuje wersje html5 -->
<html lang="pl">
<head>

	<meta charset="utf-8" /> <!-- ustawienie odpowiedniego stylu znakowego (mustbe) -->
	<title>Create new account</title>  <!-- tytul strony -->
	<meta name="description" content="Create new account!" />  <!-- opis zakladki -->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!-- odpowiedni format dla 
																													przegladarek (mustbe!!) -->
	<link rel="stylesheet" href="style.css" type="text/css" />  
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />     <!--dodanie obrazkow z fontello -->
	<!--head zawartosc niedostepna do podgladu zawiera ogolne informacje oraz formaty projektowania strony -->

	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
		
	<div class="logowanie">
		<form method= "post">
		
		
			Nickname: <br /> <input type="text" name="nick" /><br />
			
			
			<?php
				
				if (isset($_SESSION['e_nick']))
				{
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
				
			?>
			
			<br />
			E-mail: <br /> <input type="text" name="email" /><br />
			<br />
			
			<?php
				
				if (isset($_SESSION['e_email']))
				{
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
				
			?>
			
			Password: <br /> <input type="password" name="password1" /><br />
			<br />
			
			<?php
				
				if (isset($_SESSION['e_password']))
				{
					echo '<div class="error">'.$_SESSION['e_password'].'</div>';
					unset($_SESSION['e_password']);
				}
				
			?>
			
			Confirm your password: <br /> <input type="password" name="password2" /><br />
			<br />
			
			<label>
				<Input type="checkbox" name="regulations" /><span style="color:white"> I accept the terms and conditions.</span><br />
			</label>
			
			<?php
				
				if (isset($_SESSION['e_regulations']))
				{
					echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
					unset($_SESSION['e_regulations']);
				}
				
			?>
				<div id="captcha">
					<br/>
					<div class="g-recaptcha" data-sitekey="6LdIAxIUAAAAAE1YQyQTC7GJf0pckDnyZVKUdEJg">
					</div>
				</div>

			<?php
				
				if (isset($_SESSION['e_recaptcha']))
				{
					echo '<div class="error">'.$_SESSION['e_recaptcha'].'</div>';
					unset($_SESSION['e_recaptcha']);
				}
				
			?>
			
			<input type="submit" value="Register your account!" />
			
		
			
		</form>
	</div>
		
		
</body>
</html>