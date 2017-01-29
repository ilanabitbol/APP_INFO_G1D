<?php include 'entete.php';

		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		if (isset($_SESSION['admin'])){
			$reponse= $connexion_base->getDb()->query('SELECT  type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, MAX(donnees.date_donnees) AS last_date, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs, type_fonction
                                                        WHERE piece.ID = "'.$_SESSION['ID_choisis'].'"  AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
														GROUP BY donnees.ID_ac_cap
                                                        ');
		}else{
		$reponse= $connexion_base->getDb()->query('SELECT  type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, MAX(donnees.date_donnees) AS last_date, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs, type_fonction
                                                        WHERE piece.ID = "'.$_SESSION['ID'].'"  AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
														GROUP BY donnees.ID_ac_cap
                                                        ');
		}
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
 			
 			<div class="command-buttons">
  				<a href = "maMaison.php"><button id="salle">Retour</button></a>
  				<form action='ajout_capteur.php' method='POST'>
  					<?php echo '<input type="hidden" name="ID_piece" value= "'.$_POST['ID_piece'].'"/>'?>
  					<input type="submit" value= "Ajouter un capteur" class="buttons" />
  				</form>
  				
  				<form action='suppression_capteur.php' method='POST'>
  					<?php echo '<input type="hidden" name="ID_piece" value= "'.$_POST['ID_piece'].'"/>'?>
  					<input type="submit" value= "Supprimer un capteur" class="buttons" />
  				</form>
  				
  			</div>
  			
  			<?php while($donnes = $reponse->fetch()){?>
			<section class="tab">
				<table>
					<thead>
						<tr><th>Type de capteur</th> <td><?php echo $donnes['nom_fonction'];?></td></tr>
						<tr><th>Adresse mac</th> <td><?php echo $donnes['adresse_mac'];?></td></tr>
						<tr><th>Mesure</th> <td><?php echo $donnes['valeur'];?></td></tr>
						<tr><th>Date</th> <td><?php echo $donnes['last_date'];?></td></tr>
						<tr><th>Batterie</th> <td><?php echo $donnes['batterie'];?></td></tr>
						<tr><th>Etat</th> <td><?php echo $donnes['etat'];?></td></tr>
					</thead>
				</table>
  			</section>
  		
  			<?php }
  			?>
	</div>
 
 </body>