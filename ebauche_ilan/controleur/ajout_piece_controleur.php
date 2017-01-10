<?php
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$nom_piece = isset($_POST['nom_piece'])?$_POST['nom_piece'] : NULL ;
$id_user = $_SESSION['ID'];

if ($nom_piece != NULL && $id_user != NULL){
	$query->newpiece_query($connexion_base, $id_user, $nom_piece);
	print ("votre salle est bien ajouter ! ");
}
else {
	print ("erreur");
}
?>