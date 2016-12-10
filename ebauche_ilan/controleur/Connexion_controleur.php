<?php
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=APP_G1D_BASE;charset=utf8', 'root', 'root');
		}catch(Exception $e){
			echo 'Exception reçue : ', $e->getMessage();
		}
		$email=$_POST['email'];
		// Hachage du mot de passe
		$password_hache = sha1($_POST['password']);
		
		// Vérification des identifiants
		$req = $bdd->prepare('SELECT id FROM utilisateur WHERE email = :email AND password = :password');
		$req->execute(array(
				'email' => $email,
				'password' => $password_hache));
		
		$resultat = $req->fetch();
		
		if (!$resultat)
		{
			echo 'Mauvais email ou mot de passe !';
		}
		else
		{
			session_start();
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['email'] = $email;
			echo 'Vous êtes connecté !';
		}
?>