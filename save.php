<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		header('Location: login.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($db_host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['pass'];
		$haslo2 = $_POST['pass2'];

		if  ($login =="" | $haslo =="" | $haslo2 =="")
		{
			$_SESSION['err_pass'] = '<span style="color:red">Proszę wypełnić wszystkie pola</span>';
			$haslo ="";
			$haslo2 ="";
			$login ="";
			header('Location: registration.php');
			exit();
		}
		elseif ($haslo != $haslo2)
		{
			$_SESSION['err_pass'] = '<span style="color:red">Niezgodność haseł!!</span>';
			$haslo ="";
			$haslo2 ="";
			$login ="";
			header('Location: registration.php');
			exit();
		}
		
		if ($rezultat = @$polaczenie->query(
				sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
		
				mysqli_real_escape_string($polaczenie,$login))))
				{
					$ilu_userow = $rezultat->num_rows;
					if($ilu_userow>0)
					{
						$_SESSION['istnieje'] = true;	
						header('Location: registration.php');
						$polaczenie->close();
						exit();
					}



		$haslo = $_POST['pass'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("INSERT INTO uzytkownicy(user, pass) VALUES ('%s','%s')",
				mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))




		$_SESSION['zarejestrowany'] = true;	
		header('Location: login.php');
		$polaczenie->close();
	}
}
?>