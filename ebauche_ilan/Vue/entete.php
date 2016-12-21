<?php
	print_r($_SESSION);
	session_start();
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
		  <a class="link-2" href="dashboard.php">Dashboard</a>
		  <a class="link-2" href="about.php">About</a>
		  <a class="link-2" href="contact.php">Contact</a>
		  <a class="link-2" href="shop.php">Shop</a>
		  <a class="link-2" href="sign_in-up.php">Connexion-Inscription</a>
		  <a class="link-2">
		  <?php 		  
		  echo 'Bienvenue  ';
		  echo  $_SESSION['prenom'];
		  ?></a>
		  <a class="link-2" href="../controleur/deconnexion_controleur.php">Deconnexion</a>
		</nav>

</body>

</html>
