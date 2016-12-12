<?php
		include_once ('../modele/Connexion_Base.class.php');
			
		$connexion_base= new Connexion_Base();
		
		
		$email=$_POST['email'];
		// Hachage du mot de passe
		$password_hache = sha1($_POST['password']);
		
		// Vérification des identifiants
		$req = $connexion_base->getDb()->prepare('SELECT id FROM utilisateur WHERE email = :email AND password = :password');
		$req->execute(array(
				'email' => $email,
				'password' => $password_hache));
		
		$resultat = $req->fetch();
		
		if (!$resultat)
		{
			header("Location: ../Vue/erreuConnexion.php");
		}
		else
		{
			session_start();
			$_SESSION['email']=$email;
			print_r($_SESSION);
			header("Location: ../Vue/dashboard.php");
		}
?>