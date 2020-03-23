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
	<title>Registration</title>

</head>

<body>
<?php
if (isset($_SESSION['istnieje']) == true)
{
	echo '<span style="color:red">Użytkownik już istnieje</span><br /><br />';
	session_destroy();
	}
?>
	Form of Registration<br /><br />
	
	<form action="p-registration.php" method="post">
	
		Login: <br /> <input type="text" id="log" name="login" /> <br />
		Password: <br /> <input type="password" id="a" name="pass" /> <br />
		Repeat Password: <br /> <input type="password" id="b"name="pass2" /> <br /><br />
		<input type="submit" value="Register" />
		
	
	</form>
	


<?php
	
	if(isset($_SESSION['err_pass']))	echo $_SESSION['err_pass'];
	$_SESSION['err_pass'] = '';

?>

</body>
</html>