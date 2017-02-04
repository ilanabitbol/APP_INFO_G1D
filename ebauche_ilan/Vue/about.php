<?php include 'entete.php' ;
	  include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		$reponse= $connexion_base->getDb()->query('SELECT  type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, MAX(donnees.date_donnees) AS last_date, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs, type_fonction
                                                        WHERE piece.ID = "'.$_SESSION['ID'].'"  AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
														GROUP BY donnees.ID_ac_cap
                                                        ');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/about.css">
</head>
<body>
	
		<div class="container">
			  <div class="circle embossed">
			    <p class="embossedtext">Dosmoz</p>
			  </div>
			
			  <div class="content embossed">
			    <p class="embossedtext">
			    <?php 
			    while($donnes = $reponse->fetch()){
			    	echo $donnes['valeur'];
			    }
			    ?>
			    Clement Dosmoz est un projet r&Eacutealis&Eacute par une des &Eacutequipes de Mohai &Agrave la demande de DomIsep. Une &Eacutequipe de 6 grands apprentis ing&Eacutenieurs a con&ccedilu ce produit.
			  </div>
</div>
		<footer><?php include 'footer.php';?></footer>
</body>

</html>
