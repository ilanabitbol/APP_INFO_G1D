<?php 	/**
		* Controle des informations envoyes lors de l'inscription.
		*/
		//Inclusion de l'object permettant de recuperer la connexion à la base.
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		//
		//Controle des champs issus du formulaire
		$same_email = false;
		$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : NULL;
		$prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : NULL;
		$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
		$numero = isset($_POST['numero']) ? ctype_digit($_POST['numero']) && strlen($_POST['numero'])==10 ? htmlspecialchars($_POST['numero']) : NULL : NULL;
		$pays = isset($_POST['pays']) ? htmlspecialchars($_POST['pays']) : NULL;
		$ville = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : NULL;
		$code_postal = isset($_POST['code_postal']) ?  ctype_digit($_POST['code_postal']) && strlen($_POST['code_postal'])==5 ?htmlspecialchars($_POST['code_postal']) : NULL : NULL;
		$adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : NULL;
		// Hachage du mot de passe
		if ( $_POST['password'] != NULL ){
			$password_hache = sha1(htmlspecialchars($_POST['password']));
				
		}else $password_hache = NULL;
		
		 foreach ( $query->getEmail($connexion_base) as $line){//Verification si l'email exite deja dans la base.
		 	if($email == $line['email']){
		 		 $same_email = true;	//Alors on active le flag same_email si on detecte un mail present deja en base	.		 
		 	}
			 }
		//Insertion de l'inscription
		if ($nom != NULL AND $prenom != NULL AND $email != NULL AND $password_hache != NULL AND $numero != NULL AND
			 $pays != NULL AND $ville != NULL AND $code_postal != NULL AND $adresse != NULL AND $same_email == false){
			 	$query->inscription_query($connexion_base, $nom,  $prenom, $email, $password_hache, $numero, $pays,
			 							$ville, $code_postal, $adresse);
			 		header("Location: ../Vue/about.php");
		}else{
			 		header("Location: ../Vue/erreurInscription.php");
			 }
			 		
?>