<?php 	

		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base = new Connexion_Base();
		$query = new Query();

		$email=$_POST['email'];
		$message=$_POST['message'];
	
		
		//Insertion
		
		$query->assistance_query($connexion_base,$email,$message);
		header("Location: ../Vue/envoi_mail.php");
		
?>