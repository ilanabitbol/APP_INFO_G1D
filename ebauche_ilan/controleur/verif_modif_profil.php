<?php
session_start();
//Inclusion de l'object permettant de recuperer la connexion à la base.
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();

//Controle des champs issus du formulaire
$same_email = false;
$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : NULL;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
$numero = isset($_POST['numero']) ? ctype_digit($_POST['numero']) && strlen($_POST['numero'])==10 ? htmlspecialchars($_POST['numero']) : NULL : NULL;
$pays = isset($_POST['pays']) ? htmlspecialchars($_POST['pays']) : NULL;
$ville = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : NULL;
$code_postal = isset($_POST['code_postal']) ?  ctype_digit($_POST['code_postal']) && strlen($_POST['code_postal'])==5 ?htmlspecialchars($_POST['code_postal']) : NULL : NULL;
$adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : NULL;

// Hachage du nouveau mot de passe avec la verification de du nouveau mot de passe
if ( $_POST['mdp'] != NULL AND $_POST['confirm_mdp']!=NULL AND $_POST['mdp']== $_POST['confirm_mdp']){
	$password_hache = sha1(htmlspecialchars($_POST['mdp']));
}else{ $password_hache = NULL;}

// hachage du mot de passe actuel pour le compare a celui en base par la suite
if($_POST['old_mdp'] != NULL){
	$oldpassword_hache = sha1(htmlspecialchars($_POST['old_mdp']));
}else{ $oldpassword_hache = NULL;}

//recuperation du mot de passe actuel crypte depuis la base
$response=$connexion_base->getDb()->query('SELECT password FROM utilisateur WHERE ID = "'.$_SESSION['ID'].'"');
$donnees_user = $response->fetch();

//verification de tout le formulaire de modification du profil
if($nom != NULL AND $email != NULL AND $password_hache != NULL AND $numero != NULL AND $pays != NULL AND $ville != NULL AND $code_postal != NULL AND $adresse != NULL AND ($oldpassword_hache == $donnees_user['password'])){
//update de la table utilisateur de la base de donnee
	$req = $connexion_base->getDb()->query('	UPDATE utilisateur
												SET nom = "'.$nom.'", email = "'.$email.'", numero= "'.$numero.'", pays = "'.$pays.'", ville = "'.$ville.'", code_postal = "'.$code_postal.'", adresse = "'.$adresse.'", password = "'.$password_hache.'"
												WHERE ID ="'.$_SESSION['ID'].'"');
		header("Location: ../Vue/profil.php");
}else{ header("Location: ../Vue/err_modification_profil.php");
}
?>