<?php

require('Modele/gestion_utilisateur.php');
$id =  $_SESSION['UserID'];
$reponse = mdp($db,$_SESSION['login']);
$modification_login = "login = '".$_POST['login']."'";
$modification_adresse = "adresse = '".$_POST['adresse']."'";
$modification_mot_de_passe = "mot_de_passe = '".sha1($_POST['mdp'])."'";

$ligne = $reponse->fetch();
if(sha1($_POST['old_mdp'])!=$ligne['mot_de_passe'])
{
  $_SESSION['erreur'] = "Le Mot de passe est incorrect";
  header("Location: index.php?page=modification_profil");//Redirection vers la page de profil
  exit();//Permet l'arret du script
}
else
{
  if (!empty($_POST['login']))
  {
    modif_profil($modification_login,$id,$db);
  }
  if (!empty($_POST['adresse']))
  {
    modif_profil($modification_adresse,$id,$db);
  }
  if (!empty($_POST['mdp']))
  {
    modif_profil($modification_mot_de_passe,$id,$db);
  }
}

header("Location: index.php?page=profil");

 ?>
