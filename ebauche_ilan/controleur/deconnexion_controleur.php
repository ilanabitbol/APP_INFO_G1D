<?php


// On appelle la session
session_start();

// On �crase le tableau de session
$_SESSION = array();

// On d�truit la session
session_destroy();

header("Location: http://localhost/APP_INFO_G1D/ebauche_ilan/Vue/sign_in-up.php");
?>