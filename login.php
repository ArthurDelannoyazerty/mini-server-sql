<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Site SEIO - Login</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php
		include 'check_data.php';
		include 'header.php';
	?>
	
	
	<h1>Login</h1>
	<form action="personal_space.php" method="POST">
		<label for="lnom">Nom:</label><br>
		<input type="text" id="lpseudo" name="lnom"><br>
		<label for="lprenom">Prenom:</label><br>
		<input type="text" id="lpseudo" name="lprenom"><br>
		<label for="lmdp">Mot de passe:</label><br>
		<input type="text" id="lmdp" name="lmdp"><br>
		<input type="submit" name="submit" value="Se Connecter" />
	</form>





</body>
</html>