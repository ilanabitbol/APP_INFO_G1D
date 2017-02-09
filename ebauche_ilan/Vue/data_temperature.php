<?php session_start();
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'APP_G1D_BASE');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
if (isset($_SESSION['admin'])){
	$query = sprintf("SELECT donnees.valeur, donnees.date_donnees
	FROM donnees, actionneurs_capteurs, type_fonction, piece
	WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap  
		AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND type_fonction.nom_fonction = 'Température' 
		AND actionneurs_capteurs.ID_piece = piece.ID_piece AND piece.ID = '{$_SESSION['ID_choisis']}' ");
}else {
	$query = sprintf("SELECT donnees.valeur, donnees.date_donnees
			FROM donnees, actionneurs_capteurs, type_fonction, piece
			WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap
			AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND type_fonction.nom_fonction = 'Température'
			AND actionneurs_capteurs.ID_piece = piece.ID_piece AND piece.ID = '{$_SESSION['ID']}' ");
}

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);




