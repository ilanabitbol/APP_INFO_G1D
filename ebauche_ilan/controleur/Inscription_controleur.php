<?php 	
		include_once ('../modele/Connexion_Base.class.php');
			
		$connexion_base= new Connexion_Base();
		
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
		if(isset($_POST['nom'])==true){
		$req = $connexion_base->getDb()->prepare('INSERT INTO utilisateur(nom, prenom, email, password, numero, pays, ville, code_postal, adresse) 
				VALUES(:nom, :prenom, :email, :password, :numero, :pays, :ville, :code_postal, :adresse)');
		$req->execute(array(
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'password' => $password_hache,
				'numero'=> $numero,	
				'pays' => $pays,
				'ville' => $ville,
				'code_postal' =>$code_postal,
				'adresse' =>$adresse,
				
		));
		echo 'Utilisateur a bien etait ajoute !';
		
		}else{
			header("Location: ../Vue/erreurConnexion.php");
		}
		
?>