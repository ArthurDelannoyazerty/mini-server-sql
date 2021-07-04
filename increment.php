<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	
	if(!isset($_POST)){	//pas de formulaire donné => redirigé vers la page d'accueil
			header( "Location: index.php" );
	}
	
	
	mysqli_select_db($conn,'donnee_site');
	
	$nom = $_SESSION['nom'];
	$prenom = $_SESSION['prenom'];
	
	$sql = "UPDATE user_data SET score = score+1 WHERE nom = '$nom' AND prenom = '$prenom' ";
				
	if ($conn->query($sql) === TRUE) {
		header( "Location: personal_space.php" );
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
	
	
?>