<?php
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		//Recuperation des champs remplis dans le form
		$email=isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
		if( $_POST['password'] != NULL ){
			$password_hache = sha1(htmlspecialchars($_POST['password']));
 		}else $password_hache = NULL;		
		// Verification des identifiants
		if (!$query->connexion_query($connexion_base, $email, $password_hache))
		{
			header("Location: ../Vue/erreurConnexion.php");
		}else{
			session_start();
			$response=$connexion_base->getDb()->query("SELECT prenom, ID FROM utilisateur WHERE email='$email'");
			$resultat=$response->fetch();
			$_SESSION['ID']=$resultat['ID'];
			$_SESSION['prenom']=$resultat['prenom'];
			$_SESSION['email']=$email;
			header("Location: ../Vue/maMaison.php");
		}
?>