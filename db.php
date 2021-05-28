<?php


	$conn = mysqli_connect("localhost", "root", "", "biddingsystemdb");
	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}


?>
