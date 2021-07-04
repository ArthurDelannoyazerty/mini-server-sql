<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Site SEIO - Log Out</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php
		include 'check_data.php';
		include 'header.php';
		
		mysqli_select_db($conn,'donnee_site');
		if (isset($_SESSION['nom'])){
			$sql ="UPDATE user_data SET connected = 0 WHERE nom = '$_SESSION[nom]' AND prenom = '$_SESSION[prenom]'";
		
			if ($conn->query($sql) === TRUE) {
			  echo "Déconnecté";
			  session_destroy();
			} 
			else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		
	?>
	
	
	
	
</body>
</html>