<?php
include '../Vue/entete.php';
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$reponse_cap= $connexion_base->getDb()->query('SELECT DISTINCT actionneurs_capteurs.adresse_mac, type_fonction.nom_fonction
													FROM actionneurs_capteurs, type_fonction,piece
													WHERE piece.ID = "'.$_SESSION['ID'].'" AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
													');



//$adresse_mac = isset($_POST['adresse_mac']) ? $_POST['adresse_mac'] : NULL ;
$fonction = isset($_POST['liste_capteur']) ? $_POST['liste_capteur'] : NULL ;



// Recuperation de lid de la piece
$id_piece = $_POST['ID_piece'];


//on cherche l'id de la fonction correspondant
$response1 = $connexion_base->getDb()->query('SELECT ID_fonction FROM type_fonction WHERE nom_fonction="'.$fonction.'"');
$resultat1=$response1->fetch();
$id_fonction = $resultat1['ID_fonction'];

//on cherche l'id du capteur
$response1 = $connexion_base->getDb()->query('SELECT actionneurs_capteurs.ID_ac_cap FROM actionneurs_capteurs WHERE actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND ID_fonction="'.$id_fonction.'"');
$resultat1=$response1->fetch();
$id_capteur = $resultat1['ID_ac_cap'];

echo $id_capteur;


//On fait la suppression ds la table
if($id_capteur!=NULL){
	$req = $connexion_base->getDb()->prepare('DELETE FROM actionneurs_capteurs WHERE ID_ac_cap = :id_cap');
	$req->execute(array(
			'id_cap' =>$id_capteur,
				
	));
	?>
		<p>Votre capteur a bien ete supprime !</p>
		<div>
		<a href='../Vue/maMaison.php'><button id='param-button' >Fermer</button></a>
		</div><?php 
	}
	?>