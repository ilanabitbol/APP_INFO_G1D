<?php
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		//Recuperation et control des champs remplis dans le form
		$email=isset($_POST['email']) ? filter_var($email, FILTER_VALIDATE_EMAIL) ? htmlspecialchars($_POST['email']) : NULL : NULL;
		if( $_POST['password'] != NULL ){
			$password_hache = sha1(htmlspecialchars($_POST['password']));
		}else $password_hache = NULL;
		
		
		// Verification du remplissage des champs et vérification de la table
		if (!$query->connexion_query($connexion_base, $email, $password_hache) AND $email == NULL AND $password_hache == NULL)
		{
			header("Location: ../Vue/erreurConnexion.php");
		}else{
			//Ouverture de la saission et stockage dans cette derniere du nom et de l'email de l'utilisateur
			session_start();
			$response=$connexion_base->getDb()->query("SELECT prenom FROM utilisateur WHERE email='$email'");
			$prenom=$response->fetch();
			$_SESSION['prenom']=$prenom['prenom'];
			$_SESSION['email']=$email;
			//redirection vers le dashboard
			header("Location: ../Vue/dashboard.php");
		}
?>