<?php 	
		include_once ('../modele/Connexion_Base.class.php');
			
		$connexion_base= new Connexion_Base();
		

		$email=$_POST['email'];

		$demande=$_POST['demande'];
	
		
		//Insertion
		if(isset($_POST['email'])==true){
		$req = $connexion_base->getDb()->prepare('INSERT INTO assistance(email, demande) 
			VALUES(:email, :demande)');
		$req->execute(array(
				'email' => $email,
				'demande' => $demande,
		));
				
				header("Location: ../Vue/about.php");
		}
?>