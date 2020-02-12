<?php
	session_start(); // Start połączenia/sesji
	$error = ''; // Na wypadek błędu
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {	//W wypadku pustego pola wyświetl
		$error = "Username or Password is invalid";
	}
	else{
		// Zebranie nazwy użytkownika i hasła
		$username = $_POST['username'];
		$password = $_POST['password'];
		// Połączenie z mySQL
		$conn = mysqli_connect("localhost", "root", "", "html_pol");
		// Zebranie informacji z bazy danych
		$query = "SELECT username, password from register where username=? AND password=? LIMIT 1";
		
		// Ochrona
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		$stmt->store_result();
		
		//Zebranie info z  tabel
		if($stmt->fetch()) 
			$_SESSION['login_user'] = $username; // Sprawdzenie danych
			header("location: mainpage_logged.php"); // Powrót do strony logowania
		}
		mysqli_close($conn); // Wyłączenie
	}
?>