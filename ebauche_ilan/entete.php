<?php
	print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/entete.css">
</head>
<body>
		
		<nav id="nav-2">
		  <a class="link-2" href="dashboard.php">Dashboard</a>
		  <a class="link-2" href="about.php">About</a>
		  <a class="link-2" href="contact.php">Contact</a>
		  <a class="link-2" href="#">Shop</a>
		  <a class="link-2" href="sign_in-up.php">Connexion-Inscription</a>
		  <a class="link-2">
		  <?php 
		  session_start();
//Session start doit etre avant le doctype !!! mal place ( le prof la fait dans sa version je me fais chier en atendant raph)
		  echo 'Bienvenue boubou';
		  echo  $_SESSION['email'];
		  ?></a>
		  <a class="link-2" href="../controleur/deconnexion_controleur.php">Déconnexion</a>
		</nav>

</body>

</html>
