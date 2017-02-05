<?php
$onglet = "Modification du Profil";
$titre = "Modification du Profil";

$menu = $function; //connecte ou pas

ob_start();
include("Vue/modification_profil.php");
$contenu = ob_get_clean();
require("Vue/gabarit.php");

 ?>
