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
	//Fonction permettant de persister les demandes d'assistances
	public function assistance_query($connexion_base, $email, $demande){
		$req = $connexion_base->getDb()->prepare('INSERT INTO assistance(email, demande)
				VALUES(:email, :demande)');
		$req->execute(array(
			'email' => $email,
			'demande' =>$demande,
		));
	}
	
	//Fonction de requete sur les data d'une piece pour un utilisateur
	public function datasensor_query($connexion_base, $id_user, $date_actuelle, $id_piece){
		$req = $connexion_base->getDb()->query('SELECT donnees.date_donnees, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs
                                                        WHERE piece.ID = :id_user AND donnees.date_donnees = :date_actuelle AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = :id_piece
                                                        ');
	
	
	}
	
	//Fonction de maj des donnees d'un capteur
	public function majdatasensor_query($connexion_base, $id_sensor, $date_actuelle, $new_data_sensor){
		$req = $connexion_base->getDb()->prepare('INSERT INTO donnees(valeur, date_donnees, ID_ac_cap)
                                                          VALUES(:new_data_sensor, :date_actuelle, :id_sensor)
                                                        ');
		$req->execute(array(
				'new_data_sensor' => $new_data_sensor,
				'date_actuelle' =>$date_actuelle,
				'id_sensor'=>$id_sensor,
		));
	
	}
	
	
}


?>