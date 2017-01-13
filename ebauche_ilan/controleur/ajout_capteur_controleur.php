<?php
	session_start(); 
	include_once ('../modele/Connexion_Base.class.php');
	include_once ('../modele/Query.class.php');
	$connexion_base= new Connexion_Base();
	$query = new Query();
	
	$reponse_cap= $connexion_base->getDb()->query("SELECT nom_fonction FROM type_fonction");
	
	
	
	$adresse_mac = isset($_POST['adresse_mac']) ? $_POST['adresse_mac'] : NULL ;
	$fonction = isset($_POST['liste_capteur']) ? $_POST['liste_capteur'] : NULL ;
	
	
	//On cherche l'id de la piece correspondant 
	$response = $connexion_base->getDb()->query("SELECT ID_piece FROM piece WHERE nom_piece='{$_SESSION['nom_piece']}' AND ID='{$_SESSION['ID']}'");
	$resultat=$response->fetch();
	$id_piece = $resultat['ID_piece'];
	$_SESSION['ID_piece_unique']=$id_piece;
	
	
	
	//on cherche l'id de la fonction correspondant
	$response1 = $connexion_base->getDb()->query('SELECT ID_fonction FROM type_fonction WHERE nom_fonction="'.$fonction.'"');
	$resultat1=$response1->fetch();
	$id_fonction = $resultat1['ID_fonction'];
	
	
	
	//On fait l'insertion ds la table
	if($adresse_mac!=NULL && $id_piece!=NULL && $id_fonction!=NULL){
	$req = $connexion_base->getDb()->prepare('INSERT INTO actionneurs_capteurs(adresse_mac,ID_piece ,ID_fonction) VALUES(:adresse_mac, :ID_piece, :ID_fonction) ');
		$req->execute(array(
				'adresse_mac' => $adresse_mac,
				'ID_piece' =>$id_piece,
				'ID_fonction' =>$id_fonction,
		));
		
		echo '<p>Votre capteur a bien été ajouté !</p>';
	}
	
	
?>