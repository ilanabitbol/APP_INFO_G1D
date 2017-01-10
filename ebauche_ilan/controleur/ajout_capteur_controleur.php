<?php
	session_start(); 
+	include_once ('../modele/Connexion_Base.class.php');
+	include_once ('../modele/Query.class.php');
+	$connexion_base= new Connexion_Base();
+	$query = new Query();
+	
+$nom_piece = isset($_POST['adresse_mac'])?$_POST['adresse_mac'] : NULL ;
$id_user = $_SESSION['ID'];
+	
var_dump($_POST);
echo 'id : ' . $id_user;

+		$query->ajout_capteur($connexion_base, $adresse_mac);
+		print ("ok cpateurr ! ");
?>