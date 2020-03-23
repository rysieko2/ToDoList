<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>

<?php


if (isset($_SESSION['zarejestrowany']) == true)
{
	echo '<span style="color:red">Użytkownik został poprawnie zarejestrowany,!!!</span><br /><br />';
	session_destroy();
	}

?>


	Logowanie do TO DO<br /><br />
	
	<form action="p-login.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	
<?php
	if(isset($_SESSION['err_login']))	echo $_SESSION['err_login'];
	
	$_SESSION['err_login'] = '';
	$_SESSION['err_pass'] = '';
?>

</body>
</html>