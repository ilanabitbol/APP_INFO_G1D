<?php 	
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base = new Connexion_Base();
		$query = new Query();

		$email=$_POST['email'];
		$demande=$_POST['demande'];
	
		
		//Insertion
		$query->assistance_query($connexion_base,$email,$demande);
		header("Location: ../Vue/about.php");
		
?>