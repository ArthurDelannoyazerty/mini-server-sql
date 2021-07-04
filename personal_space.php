<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Site SEIO - Sign In</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php
		include 'check_data.php';
		include 'header.php';
		
		
		if (count($_POST)==5){ 			//connecté par inscription
			if (!isset($_POST['lnom']) || !isset($_POST['lprenom']) || !isset($_POST['lmdp']) || !isset($_POST['lconfirmationmdp'])){ // si un des champs n'est pas remplit
				echo "Remplissez tous les champs du formulaire d'inscription. Le compte n'a pas été créé. Vous allez être redirigé vers la page d'accueil dans 5 secondes.";
				header( "refresh:5;url=index.php" );
				$_POST = array();
			}
			else if (preg_match('/[\'^£$%&*()}{@#~?>"<>,|=_+¬-]/', $_POST['lnom']) || preg_match('/[\'^£$%&*()}{@#~?>"<>,|=_+¬-]/', $_POST['lprenom'])){ // si il y a des caractères spéciaux
				echo "Pas de caractères spéciaux pour les noms et prénoms. Le compte n'a pas été créé. Vous allez être redirigé vers la page d'accueil dans 5 secondes.";
				header( "refresh:5;url=index.php" );
				$_POST = array();
			}
			else if ($_POST['lmdp'] != $_POST['lconfirmationmdp']) { // si les mots de passe sont différents
				echo "Les mots de passe ne correspondent pas. Le compte n'a pas été créé. Vous allez être redirigé vers la page d'accueil dans 5 secondes.";
				header( "refresh:5;url=index.php" );
				$_POST = array();
			} 
			else{ // si même mot de passe et pas de caractère spéciaux dans nom et prénoms et tous les champs remplis
			
				echo "connecté (inscription)";
				
				$nom = $_POST["lnom"];
				$prenom = $_POST['lprenom'];
				$mdphash = password_hash($_POST['lmdp'], PASSWORD_DEFAULT);
				
				echo $nom;
				
				
				$_SESSION["nom"] = $nom;
				$_SESSION["prenom"] = $prenom;
				
				mysqli_select_db($conn,'donnee_site');
				
				$nom = addslashes($nom);
				$prenom = addslashes($prenom);
				$mdphash = addslashes($mdphash);
				
				$sql = "INSERT INTO user_data (`id`, nom, prenom, mdp, score, connected) VALUES (NULL, '$nom', '$prenom', '$mdphash', '0', '1')";
				
				if ($conn->query($sql) === TRUE) {
					echo "New account created successfully";
					$_POST = array();
					header( "Location: personal_space.php" );
				} 
				else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			
		}
		else if (count($_POST)==4){				//connecté par connexion (la page d'avant)
			mysqli_select_db($conn,'donnee_site');
			
			$nom = $_POST['lnom'];
			$prenom = $_POST['lprenom'];
			
			$nom = addslashes($nom);
			$prenom = addslashes($prenom);
			
			$result = $conn->query("SELECT mdp FROM user_data WHERE nom = '$nom' AND prenom = '$prenom'");
			if ($result->num_rows > 0) { // si on trouve le compte
				$row = $result->fetch_assoc();
				$mdp = $row['mdp'];
				
				$isPasswordCorrect = password_verify($_POST['lmdp'], $mdp);
				
				if ($isPasswordCorrect) { // si le mdp est bon
					
					
					$sql = "UPDATE user_data SET connected = 1 WHERE nom = '$nom' AND prenom = '$prenom' ";
				
					if ($conn->query($sql) === TRUE) {
						$_SESSION['nom'] = $nom;
						$_SESSION['prenom'] = $prenom;
						echo "Connecté (connexion)";
						header( "Location: personal_space.php" );
					} 
					else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				else {  // mauvais mdp
					echo 'Mauvais mot de passe !';
				}
			}
			else {	//pas de compte trouvé
			  echo "Mauvais identifiant. Vous allez être redirigé vers la page d'accueil dans 5 secondes.";
				header( "refresh:5;url=index.php" );
				$_POST = array();
			}
		}
		else if(!isset($_POST)){	//pas de formulaire donné => redirigé vers la page d'accueil
			header( "Location: index.php" );
		}
		
	?>
	
		<h1>Espace Personnel</h1>
	
	<?php
		if (isset($_SESSION['nom'])){
			$nom = $_SESSION['nom'];
			$prenom = $_SESSION['prenom'];
					
			mysqli_select_db($conn,'donnee_site');
			
			$result = $conn->query("SELECT score FROM user_data WHERE nom = '$nom' AND prenom = '$prenom'");
			if ($result->num_rows > 0) { // si on trouve le compte
				$row = $result->fetch_assoc();
				$score = $row['score'];
				echo "Ton score : ". $score;
			}
			
			echo "<form action='increment.php' method='POST'>";
			echo "	<input type='submit' value='+1'>";
			echo "</form>";
			
			
		}
	?>
	

	

</body>
</html>