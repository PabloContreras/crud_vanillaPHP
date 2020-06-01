<?php
	include 'conn.php';	
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$id = $_GET['id']; 
	$sql = "DELETE FROM blog WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: index.php");
	
?>