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
		
		<img  class="logo" src=../images/logo_dosmoz_contact.jpg alt="Background de la page de connexion.">
		<!--Ajout des boutons de connexion et d'inscription.-->
		<div>
		  <p class='contact'>CONTACT</p>
		</div>
		<!--Ajout des formulaires.-->
		<div>
		

		  <form id="contact-form" method="post" action="../controleur/Contact_controleur.php">
				<input type="email" placeholder='EMAIL' name="email"/>
				<textarea name="demande" id="textarea" rows="6" cols="40" placeholder='Ecrivez ici votre demande.'></textarea>
				<button type="submit" name="signin-valider"class="submit-button">Envoyer</button>
		  </form>

		</div>

	</div>

<footer><?php include 'footer.php';?></footer>
	
</body>

</html>
