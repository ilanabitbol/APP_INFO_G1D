<?php 
echo 'point 1';
		include 'modele/Connexion.class.php';
		
		echo 'point 2';
		$bdd = new Connexion('localhost','APP_G1D_BASE','root','root');
		echo 'point 3';
		var_dump($bdd);
		die();
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$numero=$_POST['numero'];
		$pays=$_POST['pays'];
		$ville=$_POST['ville'];
		$code_postale=$_POST['code_postale'];
		$adresse=$_POST['adresse'];
	
		$bdd->insertion($table, $prams);
		
		
		
		$req = $bdd->prepare("INSERT INTO utilisateur(NOM, PRENOM, EMAIL, PASSWORD, NUMERO, PAYS, VILLE, CODE_POSTALE, ADRESSE) 
				VALUES(:nom, :prenom, :email, :password, :numero, :pays, :ville, :code_postale, :adresse)");
		$req->execute(array(
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'numero'=> $numero,
				'password' => $password,
				'pays' => $pays,
				'ville' => $ville,
				'code_postale' =>$code_postale,
				'adresse' =>$adresse
		));
		
		echo 'Utilisateur a bien été ajouté !';
		
?>