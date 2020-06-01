
	<?php
		session_start();
		include 'conn.php';	
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$email = $_POST['email']; 
		$password = $_POST['password'];
		$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
		$row = mysqli_fetch_assoc($result);
		$hash = $row['Password'];
		

		if (password_verify($_POST['password'], $hash)) {	
			
			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $row['Name'];
			$_SESSION['email'] = $row['Email'];
			$_SESSION['start'] = time();		
			header("HTTP/1.1 302 Moved Temporarily"); 
			header("Location: index.php");
		
		} else {
			header("Location: index.html");			
		}	
	?>