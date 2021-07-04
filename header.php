

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
	
	
	$page_name = $_SERVER['SCRIPT_NAME'];
	if(isset($_SESSION['nom'])){
		echo "Bienvenue ";
		echo "$_SESSION[prenom] ";
		echo "$_SESSION[nom] ";
		echo " !";
	}
	else{echo 'Not connected';}
	echo "<div align='right'>";
	if (!isset($_SESSION['nom'])){ // si déconnecté
		if ($page_name != '/login.php'){
			echo "		<input onclick=\"window.location.href = 'login.php';\" type='button' value='Connexion'>";
		}
		if ($page_name != '/sign_in.php'){
			echo "		<input onclick=\"window.location.href = 'sign_in.php';\" type='button' value='Inscription'>";
		}
	}
	else{	//si connecté
		if ($page_name != '/logout.php'){
			echo "		<input onclick=\"window.location.href = 'logout.php';\" type='button' value='Deconnexion'>";
		}
		if ($page_name != '/personal_space.php' && $page_name != '/logout.php'){
			echo "		<input onclick=\"window.location.href = 'personal_space.php';\" type='button' value='Espace Personnel'>";
		}
	}
	if ($page_name != '/index.php'){
		echo "		<input onclick=\"window.location.href = 'index.php';\" type='button' value='Start page'>";
	}
	echo "</div>";
	
	
	
?>

<hr>