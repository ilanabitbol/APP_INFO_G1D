<?php
+	include_once ('../modele/Connexion_Base.class.php');
+	include_once ('../modele/Query.class.php');
+	$connexion_base= new Connexion_Base();
+	$query = new Query();
+	
+	$adresse_mac = $_POST['adresse_mac'];
+	

+		$query->ajout_capteur($connexion_base, $adresse_mac);
+		print ("ok cpateurr ! ");
?>