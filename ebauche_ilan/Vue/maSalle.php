<?php include 'entete.php';

		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		if (isset($_SESSION['admin'])){
			$reponse= $connexion_base->getDb()->query('SELECT type_fonction.nom_fonction, donnees.ID_ac_cap, actionneurs_capteurs.adresse_mac, donnees.valeur, donnees.date_donnees, actionneurs_capteurs.etat, actionneurs_capteurs.batterie 
													FROM type_fonction, actionneurs_capteurs, piece, donnees 
													JOIN ( 
													SELECT MAX( donnees.date_donnees ) AS last_date, donnees.ID_ac_cap AS id_cap 
													FROM donnees
													GROUP BY donnees.ID_ac_cap 
													) AS TEMP ON donnees.ID_ac_cap = TEMP.id_cap 
													AND donnees.date_donnees = TEMP.last_date 
													WHERE donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND piece.ID = "'.$_SESSION['ID_choisis'].'" 
													GROUP BY donnees.ID_ac_cap
                                                        ');
		}else{
		$reponse= $connexion_base->getDb()->query('SELECT type_fonction.nom_fonction, donnees.ID_ac_cap, actionneurs_capteurs.adresse_mac, donnees.valeur, donnees.date_donnees, actionneurs_capteurs.etat, actionneurs_capteurs.batterie 
													FROM type_fonction, actionneurs_capteurs, piece, donnees 
													JOIN ( 
													SELECT MAX( donnees.date_donnees ) AS last_date, donnees.ID_ac_cap AS id_cap 
													FROM donnees
													GROUP BY donnees.ID_ac_cap 
													) AS TEMP ON donnees.ID_ac_cap = TEMP.id_cap 
													AND donnees.date_donnees = TEMP.last_date 
													WHERE donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND piece.ID = "'.$_SESSION['ID'].'" 
													GROUP BY donnees.ID_ac_cap');
		}
		$reponse_humidite= $connexion_base->getDb()->query('SELECT type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, 
				donnees.valeur, donnees.date_donnees
FROM donnees, actionneurs_capteurs, type_fonction
WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" 
				AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction 
				AND type_fonction.nom_fonction = "Humidité"
														');
		$reponse_temperature = $connexion_base->getDb()->query('SELECT type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac,
				donnees.valeur, donnees.date_donnees
FROM donnees, actionneurs_capteurs, type_fonction
WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'"
				AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
				AND type_fonction.nom_fonction = "Temperature"
														');
		$reponse_luminosite = $connexion_base->getDb()->query('SELECT type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac,
				donnees.valeur, donnees.date_donnees
FROM donnees, actionneurs_capteurs, type_fonction
WHERE actionneurs_capteurs.ID_ac_cap = donnees.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'"
				AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
				AND type_fonction.nom_fonction = "Luminosité"
														');
		
		
		?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>dosmoz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script></head>
	
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
						<tr><th>Date</th> <td><?php echo $donnes['date_donnees'];?></td></tr>
						<tr><th>Batterie</th> <td><?php echo $donnes['batterie'];?></td></tr>
						<tr><th>Etat</th> <td><?php echo $donnes['etat'];?></td></tr>
					</thead>
				</table>
  			</section>
  			<?php }
  				?>
				<table>
				    <caption>Humidité</caption>
				    <thead>
				        <tr>
				            <th scope="col">Date</th>
				            <th scope="col">Données</th>
				        </tr>
				    </thead>
				    <tbody><?php while($donnes_humidite = $reponse_humidite->fetch()){ ?>
				        <tr>
				            <th scope="row"><?php echo $donnes_humidite['date_donnees'];?></th>
				            <td><?php echo $donnes_humidite['valeur'];?></td>
				        </tr><?php }?>
				    </tbody>
				</table>
				
				<table>
				    <caption>Luminosité</caption>
				    <thead>
				        <tr>
				            <th scope="col">Date</th>
				            <th scope="col">Données</th>
				        </tr>
				    </thead>
				    <tbody><?php while($donnes_luminosite = $reponse_luminosite->fetch()){ ?>
				        <tr>
				            <th scope="row"><?php echo $donnes_luminosite['date_donnees'];?></th>
				            <td><?php echo $donnes_luminosite['valeur'];?></td>
				        </tr><?php }?>
				    </tbody>
				</table>
				
			   <table>
				    <caption>Temperature</caption>
				    <thead>
				        <tr>
				            <th scope="col">Date</th>
				            <th scope="col">Données</th>
				        </tr>
				    </thead>
				    <tbody><?php while($donnes_temperature = $reponse_temperature->fetch()){ ?>
				        <tr>
				            <th scope="row"><?php echo $donnes_temperature['date_donnees'];?></th>
				            <td><?php echo $donnes_temperature['valeur'];?></td>
				        </tr><?php }?>
				    </tbody>
				</table>
			
	</div>
    
 <footer><?php include 'footer.php';?></footer>

 </body>
 
 </html>