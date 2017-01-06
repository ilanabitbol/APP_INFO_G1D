<?php
	session_start();
	print_r($_SESSION);
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/styleall.css">
</head>
<body>
		
		<nav id="nav-2">
		  <?php 
		  	if ($_SESSION['prenom']){?>
		  		<a class="link-2">
		  		<?php echo 'Bienvenue ' . $_SESSION['prenom'];?>
		  		</a>
		  		<a class="link-2" href="../controleur/deconnexion_controleur.php">Deconnexion</a>
		  <?php } ?>
		  <a class="link-2" href="dashboard.php">Dashboard</a>
		  <a class="link-2" href="about.php">About</a>
		  <a class="link-2" href="contact.php">Contact</a>
		  <a class="link-2" href="shop.php">Shop</a>
		  <a class="link-2" href="sign_in-up.php">Connexion-Inscription</a>
		  <a class="link-2" href="../controleur/deconnexion_controleur.php">Deconnexion</a>
		</nav>