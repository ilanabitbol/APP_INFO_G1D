<?php
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$nom_piece = isset($_POST['nom_piece']) ? $_POST['nom_piece'] : NULL ;
$nom_utilisateur_supprimer= isset($_POST['nom_utilisateur_supprimer']) ? $_POST['nom_utilisateur_supprimer'] : NULL ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type="text/css" href="../stylesheet/contact.css">

</head>
<body>
<div class="container"><!--Creation de l'unique section de la page.-->
	
	
	
	<?php 
	if ($nom_utilisateur_supprimer != NULL){
		$req = $connexion_base->getDb()->query("DELETE FROM utilisateur WHERE email='$nom_utilisateur_supprimer' ");?>
		<p> Votre utilisateur est supprime </p>
	<?php }?>


	<div>
		<a href='admin.php'><button id='param-button' onclick='window.close()'>Fermer</button></a>
	</div>

</div>
</body>
</html>