<?php 	
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
			
		//Recuperation et control des champs du form
		$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : NULL;
		$prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : NULL;
		$email = isset($_POST['email']) ? filter_war($email, FILTER_VALIDATE_EMAIL) ? htmlspecialchars($_POST['email']): NULL : NULL;
		// Hachage du mot de passe
		if ( $_POST['password'] != NULL ){
			$password_hache = sha1(htmlspecialchars($_POST['password']));
		}else $password_hache = NULL;
		$numero = isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : NULL;
		$pays = isset($_POST['pays']) ? htmlspecialchars($_POST['pays']) : NULL;
		$ville = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : NULL;
		$code_postal = isset($_POST['code_postal']) ? htmlspecialchars($_POST['code_postal']) : NULL;
		$adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : NULL;
			
		//Insertion
		if ($nom != NULL AND $prenom != NULL AND $email != NULL AND $password_hache != NULL AND $numero != NULL AND
				$pays != NULL AND $ville != NULL AND $code_postal != NULL AND $adresse != NULL){
		$query->inscription_query($connexion_base, $nom,  $prenom, $email, $password_hache, $numero, $pays,
								$ville, $code_postal, $adresse);
			header("Location: ../Vue/about.php");
		}
		else {
			header ("Location: ../Vue/erreurInscription.php");
		}		
		

		
?>