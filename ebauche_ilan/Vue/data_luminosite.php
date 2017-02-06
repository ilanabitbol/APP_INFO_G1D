<?php
session_start();
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
$query_temperature = sprintf('SELECT 
				donnees.valeur, donnees.date_donnees
FROM donnees, actionneurs_capteurs, type_fonction
WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap  
				AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction 
				AND type_fonction.nom_fonction = "Luminosité"
														');

//execute query
$result = $mysqli->query($query_temperature);

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



