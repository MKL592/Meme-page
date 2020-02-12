<?php
include('Baza_login.php'); // Połączenie z plikiem
	if(isset($_SESSION['login_user'])){
	header("location: mainpage_logged.php"); // Zmiana strony
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form in PHP with Session</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="login">
		<h2>Login Form</h2>
		<form action="" method="post">
				<label>Nazwa Użytkownika :</label>
					<input id="name" name="username" placeholder="username" type="text">
				<label>Hasło :</label>
			<input id="password" name="password" placeholder="**********" type="password">
			<br>
			<br>
			<input name="submit" type="submit" value=" Login ">
			<br>
			<br>
			<br>
			<a href="Baza_html.html">Rejestracja</a><br><br>
			<a href="index.php">Powrót do strony głównej</a>
			<span>
				<?php echo $error; ?>
			</span>
		</form>
	</div>
</body>
</html>