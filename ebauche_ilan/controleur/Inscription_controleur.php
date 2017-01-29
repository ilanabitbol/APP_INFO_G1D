<?php 	
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		$reponse= $connexion_base->getDb()->query( "SELECT email FROM utilisateur ");
		
		$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
		$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
		$email = isset($_POST['email']) ? $_POST['email'] : NULL;
		// Hachage du mot de passe
		if ( $_POST['password'] != NULL ){
			$password_hache = sha1($_POST['password']);
				
		}else $password_hache = NULL;
		
		 while($donnes = $reponse->fetch()){
		 	if($email == $donnes['email']){
		 		header("Location: ../Vue/erreurInscription.php");
		 		 $_SESSION['same_email']=$email;
		 	}else{

		 		$numero = isset($_POST['numero']) ? $_POST['numero'] : NULL;
		 		$pays = isset($_POST['pays']) ? $_POST['pays'] : NULL;
		 		$ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
		 		$code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : NULL;
		 		$adresse = isset($_POST['adresse']) ? $_POST['adresse'] : NULL;
		 			
		 		//Insertion
		 		if ($nom != NULL AND $prenom != NULL AND $email != NULL AND $password_hache != NULL AND $numero != NULL AND
		 				$pays != NULL AND $ville != NULL AND $code_postal != NULL AND $adresse != NULL){
		 					$query->inscription_query($connexion_base, $nom,  $prenom, $email, $password_hache, $numero, $pays,
		 							$ville, $code_postal, $adresse);
		 					header("Location: ../Vue/about.php");
		 		}
		 		else  {
		 				
		 			header("Location: ../Vue/erreurInscription.php");
		 		}
		 		
		 	}
		 	
		 }  		
		 
	

		
?>