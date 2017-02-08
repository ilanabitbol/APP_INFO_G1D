<?php include 'entete.php';
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/global.css">
</head>
<body>
		
	<div class="container">
	
		<div>
		<form method="POST" action="profil.php">
		  <button id="param-button">Profil</button>
		</form>
		</div>
		<!--Outil pas encore disponible-->
		<form method="POST" action="profil.php">
		<div>
		  <button id="param-button">Ajouter un utilisateur</button>
		</div>
		</form>
		<!--Outil pas encore disponible-->
		<form method="POST" action="profil.php">
		<div>
		  <button id="param-button">Modifier les utilisateurs</button>
		</div>
		</form>
	</div>
			
<footer><?php include 'footer.php';?></footer>
	
</body>

</html>
