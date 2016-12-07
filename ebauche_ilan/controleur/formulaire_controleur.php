<?php 
	include 'sign_in-up.php';
	include 'connexion.php';
	if(isset ($POST['signin-valider'])){
		$nom=$POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['numero'];
		$numero=$_POST['pays'];
		$ville=$_POST['ville'];
		$code_postale=$_POST['code_postale'];
		$adresse=$_POST['adresse'];
		
	}

?>