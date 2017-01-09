<?php include 'entete.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type="text/css" href="../stylesheet/contact.css">
</head>
<body>


<div class="container"><!--Creation de l'unique section de la page.-->
	  	<form id="signin-form" method="post" action="../controleur/ajout_piece_controleur.php">

	 		<input type="text" placeholder="nom de la piece" name="nom_piece"/>
	 		<button type="submit" name="nom_piece" class="submit-button">ajouter</button>

	 	</form>
	</div>


</body>

</html>