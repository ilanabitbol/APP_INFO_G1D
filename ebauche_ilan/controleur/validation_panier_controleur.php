<?php 
//Inclusion de l'object permettant de recuperer la connexion à la base.
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();


//Controle des champs issus du formulaire
$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : NULL;
$prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : NULL;
$numero = isset($_POST['tel']) ? ctype_digit($_POST['tel']) && strlen($_POST['tel'])==10 ? htmlspecialchars($_POST['tel']) : NULL : NULL;
$date_livraison = isset($_POST['date_livraison']) ? $_POST['date_livraison'] : NULL;
$pays = isset($_POST['pays']) ? htmlspecialchars($_POST['pays']) : NULL;
$code_postal = isset($_POST['code_postal']) ?  ctype_digit($_POST['code_postal']) && strlen($_POST['code_postal'])==5 ?htmlspecialchars($_POST['code_postal']) : NULL : NULL;
$adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : NULL;
$prix_total = isset($_POST['prix_total']) ? $_POST['prix_total'] : NULL;

$numero_commande = uniqid();
$numero_commande = isset($numero_commande) ? $numero_commande : NULL;


if ($nom != NULL AND $prenom != NULL AND $numero != NULL AND $date_livraison != NULL AND $pays != NULL AND $code_postal != NULL AND $adresse != NULL AND $numero_commande != NULL AND $prix_total != NULL){

	$req = $connexion_base->getDb()->prepare('INSERT INTO commande(nom, prenom, tel, date_livraison, pays, code_postal, adresse_livraison, num_commande, prix)
												VALUES(:nom, :prenom, :tel, :date_livraison, :pays, :code_postal, :adresse_livraison, :num_commande, :prix)
											');
	
	$req->execute(array(
			'nom'=>$nom,
			'prenom' => $prenom,
			'tel' => $numero,
			'date_livraison'=> $date_livraison,
			'pays' => $pays,
			'code_postal' => $code_postal,
			'adresse_livraison' =>$adresse,
			'num_commande' => $numero_commande,
			'prix' =>$prix_total,
	
	));
	echo"Votre commande a bien ete enregistree et son numero est le suivant ".$numero_commande.". Veuillez bien le conserver afin de pouvoir effectuer votre inscription";
	
}else {echo "Votre commande n'a pas ete correctement enregistree";}
?>