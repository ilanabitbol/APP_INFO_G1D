<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/contact.css">
</head>
<body>
	<?php include 'entete.php' ?>
		
	<div class="container"><!--Creation de l'unique section de la page.-->
		
		<img  class="logo" src=../images/logo_dosmoz.jpg alt="Background de la page de connexion.">
		<!--Ajout des boutons de connexion et d'inscription.-->
		<div>
		  <button id="contact-button">Contact</button>
		</div>
		<!--Ajout des formulaires.-->
		<div>
		

		  <form id="signin-form" method="post" action="../controleur/Contact_controleur.php">
				<input type="email" placeholder='EMAIL' name="email"/>
				<textarea name="demande" id="textarea" rows="6" cols="40" placeholder='Ecrivez ici votre demande.'></textarea>
				<button type="submit" name="signin-valider"class="submit-button">Envoyez</button>
		  </form>

		</div>

	</div>
</body>

</html>
