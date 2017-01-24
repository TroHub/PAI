<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE!!
	session_start();
	
	if((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: login.php');
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


		<div class="header">
				<div class="logorocket">
					<i class="icon-rocket"></i>
				</div>
			
				<div class="logo">
					<span style="color: #335284"> Choose</span>YourWay.com 
				</div>
				<div style="clear:both;"></div>
		</div>
						
						<?php
						
						
							//przekazanie parametrow 
							require_once "connect.php";	 
							
							//@ wyciszenie raportowania bledow 
							$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
							
							//sprawdzanie polaczenia
							if ($polaczenie->connect_errno!=0)
							{
								echo "Error: ".$polaczenie->connect_errno; "Opis: ". $polaczenie->connect_error;
							}
							else
							{
								
								//przechwycenie danych z bazy
								$login = $_POST['login'];
								$password = $_POST['password'];
								
								//zabezpieczenie przed wstrzykiwaniem blednych danych do mysqla
								//sprawdza wpisany login i haslo
								$login = htmlentities($login, ENT_QUOTES, "UTF-8");
								$password = htmlentities($password, ENT_QUOTES, "UTF-8");
								
								//sprawdzanie loginu oraz hasla znajdujacego sie w bazie. 
								//mysqli_real_escape_string - funkcja zabezpieczajaca. Sprawdza znaki wprowadzone przez uzytkownika. Zabezpiecza baze przed wstrzykiwaniem sql
								//wyslanie zapytania sql do bazy danych
								//sprintf pilnuje typow danych 
								if ($result = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'", 
								mysqli_real_escape_string($polaczenie,$login),
								mysqli_real_escape_string($polaczenie,$password))))
								{
									$ilu_userow = $result->num_rows;
									if($ilu_userow>0)
									{
									

											//informacja o zalogowaniu 
											$_SESSION['zalogowany'] = true;
											
											//tworzenie tablicy przechowujacej wszystkie dane z kolumny. Funkcja fetch_assoc tworzy tablice asoscjacyjną.
										$wiersz = $result->fetch_assoc();
											
											//informacja o id uzytkownika
											$_SESSION['id'] = $wiersz['id'];
											
											//wyciagniecie danych z tablicy asocjacyjnej
											//_SESSION umozliwia przesylanie zmiennych miedzy dokumentami (globalna tablica asocjacyjna)
											$_SESSION['user'] = $wiersz['user'];
											$_SESSION['zarobki'] = $wiersz['zarobki'];
											$_SESSION['wydatki'] = $wiersz['wydatki'];
											$_SESSION['oszczednosci'] = $wiersz['oszczednosci'];
											$_SESSION['email'] = $wiersz['email'];
											$_SESSION['dnipremium'] = $wiersz['dnipremium'];
											
											//usuń zmienna z sesji, aby była niewidoczna po zalogowaniu
											unset($_SESSION['blad']);
											
											//czyszczenie ram serwera z danych wyciagnietych z bazy
											$result->free_result();
											
											//przekierowanie uzytkownika na jego panel sterowania 
											header('location: panel_uzytkow.php');
								
									}
									else
									{
											// alert o bledzie logowania
											$_SESSION['blad'] = '<span style = "color:red"> WRONG LOGIN OR PASSWORD!</span>';
											// przekierowanie do strony logowania
											header('location: login.php');
											
									}
								}
								
								//zakonczenie polaczenia z baza
								$polaczenie->close();
							
							}
						
							
						?>
						


</body>
</html>


