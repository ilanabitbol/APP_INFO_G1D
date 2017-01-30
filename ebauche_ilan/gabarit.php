<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/entete.css">
</head>
<body>
		<nav id="nav-2">
			<a class="circleENTETE"><img class="logoDMZ" src=images/logo_dosmoz.jpg height=40 width=40></a>
		  <?php 
		  	if (isset($_SESSION['prenom'])){?>
		  		<a class='link-2' href='parametres.php'><img  class="logoPARAM" src=images/settings.png alt="Parametres"></a>	
		  		<a class="link-2">
		  		<?php echo 'Bienvenue ' . $_SESSION['prenom'];?>
		  		</a>
		  <?php } ?>
		  <?php 
		  	if (isset($_SESSION['prenom'])){?>
		  		<a class="link-2" href="Vue/maMaison.php">Maison</a>
		  <?php } ?>
		  <a class="link-2" href="Vue/shop.php">Shop</a>
		  <a class="link-2" href="Vue/about.php">About</a>
		  <a class="link-2" href="Vue/accueil.php">Accueil</a>
		  <a class="link-2" href="Vue/envoi_mail.php">Contact</a>
		  <?php 
		  	if (empty($_SESSION['prenom'])){?>
		  		<a class="link-2" href="Vue/sign_in-up.php">Connexion-Inscription</a>
		  <?php } ?>
		  <?php 
		  	if (isset($_SESSION['prenom'])){?>
		  		<a class="link-2" href="controleur/deconnexion_controleur.php">Déconnexion</a>
		  <?php } ?>
		</nav>

</body>

</html>
