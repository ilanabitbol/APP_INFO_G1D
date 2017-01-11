<?php include 'entete.php';

		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		$reponse= $connexion_base->getDb()->query( "SELECT * FROM actionneurs_capteurs WHERE ID_piece='{$_SESSION['ID_piece_unique']}' ");
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
 		
 <header>
 	<div class="container">
 			
 			<section>
  				<a href = "maMaison.php"><button id='salle'><?php echo 'Retour';?></button></a>
  			</section>
  			<?php while($donnes = $reponse->fetch()){?>
		
			<section>
			 	<p> <?php echo $donnes['nom_capteur'];?> <br> <?php echo $donnes['adresse_mac'];?> <br> Température : 18°</p>
  			</section>
  		
  			<?php }
  			?>

  
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
			  	<a onclick="window.open('ajout_capteur.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');"><button>Ajouter un capteur</button></a>
			 </section>
	</div>
 </header>
 
 </body>