<?php
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$nom_piece = isset($_POST['nom_piece']) ? $_POST['nom_piece'] : NULL ;
$id_user = $_SESSION['ID'];

var_dump($_POST);
echo 'id : ' . $id_user;

if ($nom_piece != NULL && $id_user != NULL){
	$req = $connexion_base->getDb()->prepare('INSERT INTO piece(nom_piece, ID) VALUES(:nom_piece, :id_user) ');
	$req->execute(array(
			'nom_piece' => $nom_piece,
			'id_user' =>$id_user,
	));
	print ("votre salle est bien ajouter ! ");
}
else {
	print ("erreur");
}
?>