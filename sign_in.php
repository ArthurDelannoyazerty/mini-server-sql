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
	?>
	
	<h1>Sign In</h1>
	
	
	<form action="personal_space.php" method="POST">
		<label for="lnom">Nom :</label><br>
		<input type="text" id="lnom" name="lnom"><br>
		<label for="lprenom">Prénom :</label><br>
		<input type="text" id="lprenom" name="lprenom"><br>
		<label for="lmdp">Mot de passe:</label><br>
		<input type="text" id="lmdp" name="lmdp"><br>
		<label for="lconfirmationmdp">Confirmation du mot de passe:</label><br>
		<input type="text" id="lconfirmationmdp" name="lconfirmationmdp"><br>
		<input type="submit" name="submit" value="Envoyer" />
	</form>
	
	

</body>
</html>