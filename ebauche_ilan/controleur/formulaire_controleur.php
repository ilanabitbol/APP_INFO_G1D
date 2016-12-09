<?php 

	
		$bdd = new PDO('mysql:host=localhost;dbname=APP_G1D_BASE; charset=utf8', 'root', 'root');

		
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$numero=$_POST['numero'];
		$pays=$_POST['pays'];
		$ville=$_POST['ville'];
		$code_postale=$_POST['code_postale'];
		$adresse=$_POST['adresse'];
		 echo "bonjour les azdamiazs";
	
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