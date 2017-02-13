<?php
	clearstatcache();
	date_default_timezone_set("ASIA/DHAKA");
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "wiki";
	$conn = mysqli_connect($server,$username,$password);
	/*
	if(!$conn)
	{
		echo "Couldnot connect to the server";
		die();
	}
	//else echo "connected to the server";
	$select_db = mysqli_select_db($conn,$db);
	if(!$select_db)
	{
		echo "Could not select database";
		die();
	}
	*/
	
	$conn = new mysqli($server, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>