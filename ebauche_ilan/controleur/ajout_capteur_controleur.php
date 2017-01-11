<?php
	session_start(); 
	include_once ('../modele/Connexion_Base.class.php');
	include_once ('../modele/Query.class.php');
	$connexion_base= new Connexion_Base();
	$query = new Query();
	
	$nom_piece = isset($_POST['nom_piece']) ? $_POST['nom_piece'] : NULL ;
	$adresse_mac = isset($_POST['adresse_mac']) ? $_POST['adresse_mac'] : NULL ;
	$nom_capteur = isset($_POST['nom_capteur']) ? $_POST['nom_capteur'] : NULL ;
	$fonction = isset($_POST['fonction']) ? $_POST['fonction'] : NULL ;
	$response = $connexion_base->getDb()->query("SELECT ID_piece FROM piece WHERE nom_piece='$nom_piece' AND ID='{$_SESSION['ID']}'");
	$resultat=$response->fetch();
	$id_piece = $resultat['ID_piece'];
	$_SESSION['ID_piece_unique']=$id_piece;
	echo $id_piece;
	$req = $connexion_base->getDb()->prepare('INSERT INTO actionneurs_capteurs(nom_capteur,adresse_mac, ID_piece, ID_fonction) VALUES(:nom_capteur, :adresse_mac, :ID_piece, :ID_fonction) ');
		$req->execute(array(
				'nom_capteur' => $nom_capteur,
				'adresse_mac' => $adresse_mac,
				'ID_piece' =>$id_piece,
				'ID_fonction' =>$fonction,
		));
	
?>