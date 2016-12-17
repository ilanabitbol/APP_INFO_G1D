<?php

class Query {
	private $nom;
	private $prenom;
	private $email;
	private $password;
	private $numero;
	private $pays;
	private $ville;
	private $code_postal;
	private $adresse;
	//	//
	
	//Constructeur
	public function __construct(){
	}
	
	//Fonction permettant la persistance en base des inscrits
	public function inscription_query($connexion_base,$nom, $prenom, $email, $password, $numero, $pays, $ville, $code_postal,$adresse){
		$req = $connexion_base->getDb()->prepare('INSERT INTO utilisateur(nom, prenom, email, password, numero,
				pays, ville, code_postal, adresse) 
				VALUES(:nom, :prenom, :email, :password, :numero, :pays, :ville, :code_postal, :adresse)');
		$req->execute(array(
				'nom'=>$nom,
				'prenom' => $prenom,
				'email' => $email,
				'password' => $password,
				'numero'=> $numero,
				'pays' => $pays,
				'ville' => $ville,
				'code_postal' =>$code_postal,
				'adresse' =>$adresse,
				
		));	
	}
	//Fonction permettant d'interroger une ligne de la table en fonction des champs de connexions renseignes par le client
	public function connexion_query($connexion_base, $email, $password){
		$req = $connexion_base->getDb()->prepare('SELECT id FROM utilisateur WHERE email = :email AND password = :password');
		$req->execute(array(
				'email' => $email,
				'password' => $password,
		));
		return $resultat = $req->fetch();
		
	}
	
	
}


?>