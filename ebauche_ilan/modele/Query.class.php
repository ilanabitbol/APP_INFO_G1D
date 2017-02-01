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
    private $date_actuelle;
    private $id_piece;
    private $id_user;
    private $id_sensor;
    private $new_data_sensor;
    private $nom_piece;
    private $fin;
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
	public function  getUtilisateur($connexion_base, $email, $password){
		$req = $connexion_base->getDb()->prepare('SELECT ID, prenom FROM utilisateur WHERE email = :email AND password = :password');
		$req->execute(array(
				'email' => $email,
				'password' => $password,
		));
		return $resultat = $req->fetch();//retourne un boolean
	}
	
	public function getEmail($connexion_base){

	    $query = "SELECT email
	              FROM utilisateur";
	
	    $param = $tableau;
	    $requete = $connexion_base->getDb()->prepare($query);
	    $requete->execute($param);//Remplace les variables marquées par le point d'interogation
	
	    $tableau = array();
	    while ($donnees = $requete->fetch()) {
	        $tableau[] = $donnees;
	    }
	    return $tableau;
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
	
	//Fonction d'ajout d'une piece
	public function newpiece_query($connexion_base, $nom_piece, $id_user){
		
		
		$req = $connexion_base->getDb()->prepare('INSERT INTO piece(nom_piece, ID)
                                                          VALUES(:nom_piece, :id_user)
                                                        ');
		$req->execute(array(
				'nom_piece' => $nom_piece,
				'id_user' =>$id_user,
		));
	
	}
	
	//Fonction d'ajout d'une piece
	public function ajout_capteur($connexion_base, $adresse_mac, $id_user){
	
	
		$req = $connexion_base->getDb()->prepare('INSERT INTO actionneurs_capteurs(adresse_mac, ID)
                                                          VALUES(:adresse_mac, :id_user)
                                                        ');
		$req->execute(array(
				'adresse_mac' => $adresse_mac,
				'id_user' =>$id_user,
		));
	
	}
	
	public function getUtilisateurBy($connexion_base,$where,$post)
	{
		if ($where == "email") {
			$requete = $db->prepare('SELECT prenom, ID FROM utilisateur WHERE email=:email');
			$requete->execute(array(
					"email" => $post
			));
	
			$donnees = $requete->fetch();
			$requete->closeCursor();
			return $donnees;
		}
		else if ($where == "nom") {
			$requete = $db->prepare('SELECT ID,nom, permis_id FROM conducteur WHERE nom=:nom');
			$requete->execute(array(
					"nom" => $post
			));
	
			$donnees = $requete->fetch();
			$requete->closeCursor();
			return $donnees;
		}
		else if ($where == "type") {
			$requete = $db->prepare('SELECT ID, nom, permis_id FROM conducteur WHERE nom=:nom');
			$requete->execute(array(
					"permis_id" => $post
			));
	
			$donnees = $requete->fetch();
			$requete->closeCursor();
			return $donnees;
		}
	}
	
}


?>