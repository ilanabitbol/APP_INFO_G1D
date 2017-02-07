<?php
session_start();
print_r($_SESSION);
/**
* Controle des informations envoyes lors de l'inscription.
*/
//Inclusion de l'object permettant de recuperer la connexion à la base.
include_once ('../modele/Connexion_Base.class.php');
include_once ('../modele/Query.class.php');
$connexion_base= new Connexion_Base();
$query = new Query();
//
//Controle des champs issus du formulaire
$same_email = false;
$nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : NULL;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
$numero = isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : NULL;
$pays = isset($_POST['pays']) ? htmlspecialchars($_POST['pays']) : NULL;
$ville = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : NULL;
$code_postal = isset($_POST['code_postal']) ? htmlspecialchars($_POST['code_postal']) : NULL;
$adresse = isset($_POST['adresse']) ? htmlspecialchars($_POST['adresse']) : NULL;
// Hachage du nouveau mot de passe
if ( $_POST['mdp'] != NULL AND $_POST['confirm_mdp']!=NULL AND $_POST['mdp']== $_POST['confirm_mdp']){
	$password_hache = sha1(htmlspecialchars($_POST['mdp']));
}else{ $password_hache = NULL;}




// verification de l'ancien mot de passe
if($_POST['old_mdp'] != NULL){
	$oldpassword_hache = sha1(htmlspecialchars($_POST['old_mdp']));
	//if($oldpassword_hache!=$donnees_user['password']){			
			//	header("Location: ../Vue/err_modification_profil.php");
//}
}else{ $oldpassword_hache = NULL;}
echo $_SESSION['ID'];

$response=$connexion_base->getDb()->query('SELECT password FROM utilisateur WHERE ID = "'.$_SESSION['ID'].'"');
$donnees_user = $response->fetch();


if($nom != NULL AND $email != NULL AND $password_hache != NULL AND $numero != NULL AND $pays != NULL AND $ville != NULL AND $code_postal != NULL AND $adresse != NULL AND ($oldpassword_hache == $donnees_user['password'])){
	echo "tout est ok";
	echo $_SESSION['ID'];
	$req = $connexion_base->getDb()->prepare('	UPDATE utilisateur
												SET nom = '.$nom.', email = '.$email.', numero= '.$numero.', pays = '.$pays.', ville = '.$ville.', code_postal = '.$code_postal.', adresse = '.$adresse.', password = '.$password_hache.'
												WHERE ID ='.$_SESSION['ID'].'');
	$req->execute(array(
			'nom'=>$nom,
			'email'=>$email,
			'password'=>$password_hache,
			'numero'=>$numero,
			'pays' =>$pays,
			'ville'=>$ville,
			'code_postal'=>$code_postal,
			'adresse'=>$adresse,
	));
	print_r($req);
}else{ header("Location: ../Vue/err_modification_profil.php");
}
?>