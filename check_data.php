<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$req = "CREATE DATABASE IF NOT EXISTS Donnee_site";
	$conn->query($req);

	$req = "CREATE TABLE IF NOT EXISTS `donnee_site`.`user_data` ( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL , `prenom` VARCHAR(255) NOT NULL , `mdp` TEXT NOT NULL , `score` INT NOT NULL , `connected` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM";
	$conn->query($req);


?>
	
