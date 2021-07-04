<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Site SEIO -accueil </title>
	<meta charset="UTF-8">
</head>
<body>
	<?php
		include 'check_data.php';
		include 'header.php';
	?>
	
	
	<h1>Start Page</h1>

	<?php
		mysqli_select_db($conn,'donnee_site');
		
		$result = $conn->query('SELECT nom, prenom, score FROM user_data ORDER BY score');
		if ($result->num_rows > 0) {
			if (mysqli_num_rows($result) > 0) {
	?>
	<table border="1">
  
	  <tr>
		<td><strong>Nom</strong></td>
		<td><strong>Prénom</strong></td>
		<td><strong>Score</strong></td>
	  </tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr>
		<td><?php echo $row["nom"]; ?></td>
		<td><?php echo $row["prenom"]; ?></td>
		<td><?php echo $row["score"]; ?></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</table>
	 <?php
	}
			} 
			else {
			  echo "0 results";
			}
		?>

</body>
</html>