<?php
	include_once ('../modele/Connexion_Base.class.php');
	include_once ('../modele/Query.class.php');
	$connexion_base= new Connexion_Base();
	$query = new Query();
	
	$nom_piece = isset($_POST['nom_piece']);
	
	if ($nom_piece != NULL){
		$query->ajout_salle($connexion_base, $nom_piece);
		print ("votre salle est bien ajouter ! ");
	}
	else {
		print ("erreur"); 
	}