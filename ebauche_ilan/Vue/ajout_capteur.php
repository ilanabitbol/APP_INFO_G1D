<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type="text/css" href="../stylesheet/contact.css">
</head>
<body>


<div class="container"><!--Creation de l'unique section de la page.-->
	  	<form id="signin-form" method="post" action="../controleur/ajout_capteur_controleur.php">

	 		<input type="text" placeholder="adresse mac" name="adresse_mac"/>
	 		<input type="text" placeholder="nom capteur" name="nom_capteur"/>
	 		<input type="text" placeholder="nom piece" name="nom_piece"/>
	 		<input type="text" placeholder="fonction du capteur" name="fonction"/>
	 		<button type="submit" name="boutton" class="submit-button">Ajouter</button>

	 	</form>
	</div>


</body>

</html>		