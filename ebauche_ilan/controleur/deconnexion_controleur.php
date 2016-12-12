<?php


// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();

header("Location: http://localhost/APP_INFO_G1D/ebauche_ilan/Vue/sign_in-up.php");
?>