<?php include 'entete.php';

include_once ('../modele/Connexion_Base.class.php');

$today = date("Y-m-d");
$connexion_base= new Connexion_Base();

//Requete d'extraction des donnees capteur
$reponse= $connexion_base->getDb()->query('SELECT DISTINCT type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, donnees.date_donnees, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs, type_fonction
                                                        WHERE piece.ID = "'.$_SESSION['ID'].'"  AND donnees.date_donnees = "'.$today.'" AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
                                                        ');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>dosmoz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
 </head>
 
 <body>

 	<div class="container">
 			
 			<header class="boutons_salle">
  				<a href = "maMaison.php"><button id='salle'>Retour</button></a>
  				<button onclick="window.open('ajout_capteur.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Ajouter un capteur</button>
  			</header>
  			
  			<?php while($donnes = $reponse->fetch()){?>
		
			<section>
			<p>
				<table border="1px solid white">
					<thead>
						<tr><th>Type de capteur</th> <td><?php echo $donnes['nom_fonction'];?></td></tr>
						<tr><th>Adresse mac</th> <td><?php echo $donnes['adresse_mac'];?></td></tr>
						<tr><th>Mesure</th> <td><?php echo $donnes['valeur'];?></td></tr>
						<tr><th>Date</th> <td><?php echo $donnes['date_donnees'];?></td></tr>
						<tr><th>Batterie</th> <td><?php echo $donnes['batterie'];?></td></tr>
						<tr><th>Etat</th> <td><?php echo $donnes['etat'];?></td></tr>
					</thead>
				</table>
			 </p>
  			</section>
  		
  			<?php }
  			?>

	</div>
 
 </body>