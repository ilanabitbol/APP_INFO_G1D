<?php session_start();
//Appelle de la librairie json
header('Content-Type: application/json');

//connexion à la base de donnee avec mysql en local
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'APP_G1D_BASE');

//connexion à la base de donnee avec mysql en ligne
//define('DB_HOST', 'mysql.hostinger.fr');
//define('DB_USERNAME', 'u691514939_eqyde');
//define('DB_PASSWORD', 'Cr19952002.');
//define('DB_NAME', 'u691514939_abyve');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//requetes pour recuperer la donnee associee à la date correspondante
if (isset($_SESSION['admin'])){
	$query = sprintf("SELECT donnees.valeur, donnees.date_donnees
			FROM donnees, actionneurs_capteurs, type_fonction, piece
			WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap
			AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND type_fonction.nom_fonction = 'Luminosité'
			AND actionneurs_capteurs.ID_piece = piece.ID_piece AND piece.ID = '{$_SESSION['ID_choisis']}' ");
}else {
	$query = sprintf("SELECT donnees.valeur, donnees.date_donnees
			FROM donnees, actionneurs_capteurs, type_fonction, piece
			WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap
			AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND type_fonction.nom_fonction = 'Luminosité'
			AND actionneurs_capteurs.ID_piece = piece.ID_piece AND piece.ID = '{$_SESSION['ID']}' ");
}

//execution de la requete
$result = $mysqli->query($query);

//boucle pour recuperer les donnees
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

$result->close();

//fermeture de la  connexion
$mysqli->close();

//affichage des donnees sous forme de balise json
print json_encode($data);
?>



