<?php
	//funkcja umozliwjajaca programowi korzystanie z sesji. OBOWIAZKOWE!!
	session_start();
	//zniszczenie sesji
	session_unset();
	
	//przekierowanie na strone glowna
	header('Location: login.php');
	
?>

