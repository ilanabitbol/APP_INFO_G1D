<?php include 'entete.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>dosmoz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
 </head>
 
 <body>
 		/*<?php
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		// lecture dans la table catalogue
		$reponse= $connexion_base->getDb()->query( "SELECT xxxxxxx FROM piece WHERE ID='{$_SESSION['ID']}' ");?>*/
 <header>
 			
 			<section>
  				<p><a href = "maMaison.php"><?php echo 'Retour';?></a></p>
  			</section>
  			
  			<section>
  				 <p>Humidité <br> 32% <br> </p>
 			 </section>
  
			  <section>
			   <p> Température <br> 18° <br> </p>
			  </section>
			    
			 <section>
			  <p> Luminosité <br> 10Lux <br> </p>
			 </section>
			
			 <section>
			  <p> Mouvement <br> Non <br> </p>
			 </section>
			 <section>
			  <p> <a onclick="window.open('ajout_capteur.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">AJOUTEZ CAPTEUR</a> <br> <br> </p>
			 </section>
 </header>
 
 </body>