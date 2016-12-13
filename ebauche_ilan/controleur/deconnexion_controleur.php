<?php


// On appelle la session
session_start();

// On ecrase le tableau de session
$_SESSION = array();

// On detruit la session
session_destroy();

header("Location: ../Vue/sign_in-up.php");
?>