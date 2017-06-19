<?php


//Inclusion des modeles objets.
		include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		
		

$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL,
"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=0904");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");


//mettre les données sous forme d'un tableau 

$data_tab = str_split($data,33);
$data_mac = []; 
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
	//decoder une trame
	
	$trame = $data_tab[$i];
	// décodage avec des substring
	$t = substr($trame,0,1);
	$o = substr($trame,1,4);
	$r = substr($trame,4,5);
	$c = substr($trame,5,6);
	$n = substr($trame,6,7);
	$v = substr($trame,7,9);
	$a = substr($trame,9,13);
	$x = substr($trame,13,17);
	$year = substr($trame,17,19);
	$month = substr($trame,19,23);
	$day = substr($trame,23,25);
	$hour = substr($trame,25,27);
	$min = substr($trame,27,29);
	$sec = substr($trame,29,33);
	
	// décodage avec sscanf
	list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
	sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
	echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
echo "Trame $i: $data_tab[$i]<br />";

$req = $connexion_base->getDb()->prepare("SELECT 'ID_ac_cap' FROM 'actionneurs_capteurs' WHERE 'adresse_mac' =: 'mac'");
$req->execute(array(
		'mac' => $o . $n,
));

$req=$response1->fetch();
$id_cap =  $req['ID_ac_cap'];
/*
for($j = 0; $j<count(data_mac); $j++){
	if(data_mac[$j] != $o . $n){
		/*$data_mac = array(array( $o . $n => $id_cap));
		
	}
}*/
echo "-------------------------------------------------";
echo $id_cap;
echo "-------------------------------------------------";
}





//chercher dans la trame, le numero du capteur et écriture dans la base, $n
/*
$req = $connexion_base->getDb()->prepare("INSERT INTO `app_g1d_base`.`actionneurs_capteurs` 
		(`ID_ac_cap`, `adresse_mac`, `etat`, `batterie`, `ID_commande`, `ID_piece`, `ID_fonction`) 
		VALUES (NULL, 'adresse_mac', NULL, NULL, NULL, '', 'ID_fonction') ");
$req->execute(array(
		'adresse_mac' => $o . $n ,
		'ID_fonction' =>$c,
		
));

echo $req;
*/

/*
$req = $connexion_base->getDb()->prepare("INSERT INTO `app_g1d_base`.`donnees` (`ID_donnees`, `valeur`, `date_donnees`, `ID_ac_cap`)
														 VALUES (NULL, 'valeur', '', '') ");
$req->execute(array(
		'valeur' => $v ,
		'date_donnees' => $year."-".$month."-".$day." ".$hour.":".$min.":".$sec,
));

echo $req;


*/

/*
$trames = getTrames();
$trames = decoupetrames(); //tableau de tableaux
$ids = getIdAdressesMac(); 
$trames_fin = ajouteIds($trames, $ids);

*//*
for ($i = 1;; $i++){
	$trames = $data_tab[$i];
	echo "---------------------------------";
	echo $trames; 
	echo "---------------------------------";
}*/
	/*
[0] = ['090401', '20/06/2017', '12']
[1] = ['090401', '20/06/2017', '512']
[2] = ['090401', '20/06/2017', '122']

*//*
$req = $connexion_base->getDb()->prepare("SELECT 'ID_ac_cap INTO' 'actionneurs_capteurs' WHERE 'adresse_mac' = 'mac'");
$req->execute(array(
		'mac' => $o . $n,
		
));
echo "---------------------------------";
echo $o . $n; 
echo "---------------------------------";*/
/*$ids =
[0] = ['090401', '1' ]
[1] = ['090401', '2' ]
[2] = ['090401', '3']
*/
/*
$ids =
['090401'] = ['1']
['090401'] = ['2']
[090401] = ['3']
*/
/*
  =
[0] = ['090401', '1', '20/06/2017', '12']
[1] = ['090401', '2', '20/06/2017', '512']
[2] = ['090401', '3', '20/06/2017', '122']


*/
?>