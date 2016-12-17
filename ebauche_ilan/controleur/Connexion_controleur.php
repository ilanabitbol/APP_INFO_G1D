<?php
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		//Recuperation des champs remplis dans le form
		$email=$_POST['email'];
		$password_hache = sha1($_POST['password']);
		
		// Verification des identifiants
		
		
		if (!$query->connexion_query($connexion_base, $email, $password_hache))
		{
			header("Location: ../Vue/erreurConnexion.php");
		}else{
			session_start();
			$response=$connexion_base->getDb()->query("SELECT prenom FROM utilisateur WHERE email='$email'");
			$prenom=$response->fetch();
			$_SESSION['prenom']=$prenom['prenom'];
			$_SESSION['email']=$email;
			header("Location: ../Vue/dashboard.php");
		}
?>