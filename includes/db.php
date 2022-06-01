<?php

 session_start();

//The administrator information are presented here for connection with the database
	$host = 'localhost';
	$dbname = 'crup1_18_GraphTech';
	$user = 'crup1_18_GraphTech';
	$pass = 'Skrrrt10';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
