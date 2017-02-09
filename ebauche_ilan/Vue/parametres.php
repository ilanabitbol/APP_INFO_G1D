<?php include 'entete.php';
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
</head>
<body>
		
	<div class="container">
	
		<div>
		<form method="POST" action="profil.php">
		  <button class="boutonbleu">Profil</button>
		</form>
		</div>
		<!--Outil pas encore disponible-->
		<form method="POST" action="profil.php">
		<div>
		  <button class="boutonbleu">Ajouter un utilisateur</button>
		</div>
		</form>
		<!--Outil pas encore disponible-->
		<form method="POST" action="profil.php">
		<div>
		  <button class="boutonbleu">Modifier les utilisateurs</button>
		</div>
		</form>
	</div>
			
<footer><?php include 'footer.php';?></footer>
	
</body>

</html>
