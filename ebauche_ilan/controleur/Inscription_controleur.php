<?php 	
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		// Hachage du mot de passe
		$password_hache=sha1($_POST['password']);
		$numero=$_POST['numero'];
		$pays=$_POST['pays'];
		$ville=$_POST['ville'];
		$code_postal=$_POST['code_postal'];
		$adresse=$_POST['adresse'];
			
		//Insertion
		try {
			$query->inscription_query($connexion_base, $nom,  $prenom, $email, $password_hache, $numero, $pays,
					$ville, $code_postal, $adresse);
			header("Location: ../Vue/about.php");
				
		}catch( Exception $e){
				echo $e->getMessage();
				header ("Location: ../Vue/erreurConnexion.php");
		}
				
		
		
?>