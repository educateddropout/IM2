<?php
	
	$servername = "Localhost";
	$username = "root";
	$password = "";
	$dbname = "im";

	// Create connection
	$Conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($Conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

?>