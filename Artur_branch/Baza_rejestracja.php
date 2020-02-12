<?php
	$username = $_POST['username'];		//Zebranie informacji z <form> przeglądarki
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	if(!empty($username) || !empty($password) || !empty($gender) || !empty($email)){	//jeżeli jakieś pole jest puste to błąd
		$host = "localhost";	//informacje o bazie danych
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "html_pol";
		//Połączenie
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {		// Na wypadek błędu przerwij działanie
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else {		//Zebranie info z bazy
			$SELECT = "SELECT email From register Where email = ? Limit 1";
			$INSERT = "INSERT Into register (username, password, gender, email) values(?, ?, ?, ?)";
			//Nie wiem
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			if($rnum==0) {		//Coś z bazą, wkładanie danych w tabele i konkretne rzędy
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssss", $username, $password, $gender, $email);
				$stmt->execute();
				header("LOCATION: login.php");		//Powrót do logowania
			}else {
				echo "Someone already register using this email";
			}
			$stmt->close();
			$conn->close();		//Zamknięcie połączenia
			}
	}else {		//Nie wszystkie pola były wpisane
		echo "All field are required";
		die();
	}
?>