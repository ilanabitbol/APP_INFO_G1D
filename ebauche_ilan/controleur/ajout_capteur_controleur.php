<?php
include '../Vue/entete.php';
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$reponse_cap= $connexion_base->getDb()->query("SELECT nom_fonction FROM type_fonction");



$adresse_mac = isset($_POST['adresse_mac']) ? $_POST['adresse_mac'] : NULL ;
$fonction = isset($_POST['liste_capteur']) ? $_POST['liste_capteur'] : NULL ;



// Recuperation de lid de la piece
$id_piece = $_POST['ID_piece'];



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
	?>
	<div class="container">
		<p>Votre capteur a bien &#233t&#233 ajout&#233 !</p>
		<br>
		<div>
		<a href='../Vue/maMaison.php'><button class="boutonbleu" >Fermer</button></a>
		</div>
	</div>
	<?php 
	}
	?>