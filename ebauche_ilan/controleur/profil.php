<?php
require("modele/gestion_utilisateur.php");
$onglet = "Profil";
$titre = "Profil";

$menu = $function; //connecte ou pas

affichage_profil($db);
ob_start();
include("Vue/profil.php");
$contenu = ob_get_clean();
require("Vue/gabarit.php");

 ?>
