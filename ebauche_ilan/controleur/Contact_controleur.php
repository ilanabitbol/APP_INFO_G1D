<?php 	
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base = new Connexion_Base();
		$query = new Query();

		$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
		$demande = isset($_POST['demande']) ? htmlspecialchars($_POST['demande']) : NULL;
		
		//Insertion
		if( $email != NULL && $demande != NULL){
		$query->assistance_query($connexion_base,$email,$demande);
		header("Location: ../Vue/about.php");
		}
?>