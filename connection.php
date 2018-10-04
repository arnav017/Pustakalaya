<?php

	$servername="localhost";
	$username="root";
	$password="kronosServer";
	$dbname="pustakalaya";

	$conn= mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	}

?>
