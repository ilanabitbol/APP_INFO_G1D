<?php
session_start();// On commence la session car on va recuperer des variables stockees dans $_SESSION
	
/**
 * Controle des informations envoyes lors de la connexion.
 */
		//Inclusion des modeles objets.
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		//Recuperation des champs remplis dans le formulaire de connexion
		$email=isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
		if( $_POST['password'] != NULL ){
			$password_hache = sha1(htmlspecialchars($_POST['password']));
 		}else $password_hache = NULL;		
		// Verifie que les champs de connexion sont issus d'un utilisateur existant
		if ($query->getUtilisateur($connexion_base, $email, $password_hache)){
			$response=$connexion_base->getDb()->query("SELECT prenom, ID FROM utilisateur WHERE email='$email'");
			$resultat=$response->fetch();
			//recuperation de l'id et du prenom du connecte
			$_SESSION['ID']=$resultat['ID'];
			$_SESSION['prenom']=$resultat['prenom'];
			$_SESSION['email']=$email;
			
			$response=$connexion_base->getDb()->query("SELECT ID_piece FROM piece WHERE ID='{$_SESSION['ID']}'");
			while ($resultat=$response->fetch()){
				//recuperation des id des pieces du connecte
				$_SESSION['ID_piece'][]=$resultat['ID_piece'];
			}
			header("Location: ../Vue/maMaison.php");
		}
		else if ($_POST['email'] == "admin@admin.fr" && $_POST['password'] == "a"){
			//reference du compte admin
			$_SESSION['admin'] = "perspective admin";
			header("Location: ../Vue/admin.php");
		}
		else if (!$query->connexion_query($connexion_base, $email, $password_hache))
		{
			header("Location: ../Vue/erreurConnexion.php");
		}
		
?>