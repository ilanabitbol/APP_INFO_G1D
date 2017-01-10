<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type="text/css" href="../stylesheet/contact.css">
</head>

<?php
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$nom_piece = isset($_POST['nom_piece']) ? $_POST['nom_piece'] : NULL ;
$id_user = $_SESSION['ID'];
?>

<?php
if ($nom_piece != NULL && $id_user != NULL){
	$req = $connexion_base->getDb()->prepare('INSERT INTO piece(nom_piece, ID) VALUES(:nom_piece, :id_user) ');
	$req->execute(array(
			'nom_piece' => $nom_piece,
			'id_user' =>$id_user,
	));?>
	<div class="container"><!--Creation de l'unique section de la page.-->
		<p class='msg'>Votre salle a bien été ajoutée !</p>
	</div>
<?php 	
}
else {?>
	<div class="container"><!--Creation de l'unique section de la page.-->
		<p class='msg'>Erreur, le nom choisi est invalide !</p>
	</div>
<?php 
}
?>