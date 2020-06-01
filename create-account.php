<?php
	session_start();
	include 'conn.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";

	$result = $conn-> query($checkEmail);

	$count = mysqli_num_rows($result);
	if ($count == 1) {
		echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Este usuario ya está registrado.</p>
					<p><a href='index.html'>Inicia sesión acá</a></p>
				</div>";
	} else {	
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
		$query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$passHash')";

		if (mysqli_query($conn, $query)) {
			header("Location: index.php");		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
?>