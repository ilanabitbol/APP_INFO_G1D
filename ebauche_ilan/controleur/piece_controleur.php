<?php
session_start();
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

$nom_piece = isset($_POST['nom_piece']) ? $_POST['nom_piece'] : NULL ;
$id_user = $_SESSION['ID'];
$nom_piece_supprimer= isset($_POST['nom_piece_supprimer']) ? $_POST['nom_piece_supprimer'] : NULL ;
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
	if ($nom_piece != NULL && $id_user != NULL){
		$req = $connexion_base->getDb()->prepare('INSERT INTO piece(nom_piece, ID) VALUES(:nom_piece,:ID)');
		$req->execute(array(
				'nom_piece' => $nom_piece,
				'ID' =>$id_user,
		));?>
			<p>Votre salle a bien été ajoutée !</p>
	<?php }else if( $nom_piece != NULL && $_SESSION['admin'] != NULL ){
		$req = $connexion_base->getDb()->prepare('INSERT INTO piece(nom_piece,ID) VALUES(:nom_piece,:ID)');
		$req->execute(array(
				'nom_piece' => $nom_piece,
				'ID' =>$_SESSION['ID_choisis'],
		));?>
			<p>La salle de a bien été ajoutée !</p>
	<?php }?>
	
	<?php 
	if ($nom_piece_supprimer != NULL && $id_user != NULL){
		$req = $connexion_base->getDb()->query("DELETE FROM piece
		WHERE nom_piece='$nom_piece_supprimer' AND ID='{$_SESSION['ID']}'");?>
		<p> Votre piece est supprimee </p>
	<?php } else if ($nom_piece_supprimer != NULL && $_SESSION['admin'] != NULL){
		$req = $connexion_base->getDb()->query("DELETE FROM piece
		WHERE nom_piece='$nom_piece_supprimer' AND ID='{$_SESSION['ID_choisis']}'");?>
				<p> La piece est supprimee </p>
	<?php }?>


	<div>
		<a href='maMaison.php'><button id='param-button' onclick='window.close()'>Fermer</button></a>
	</div>

</div>
</body>
</html>