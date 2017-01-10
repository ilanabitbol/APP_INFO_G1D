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
  	
  	<?php
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		// lecture dans la table catalogue
		$reponse= $connexion_base->getDb()->query( "SELECT nom_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");?>
		
		<p><a onclick="window.open('ajout_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">ajouter une salle</a></p>
		<?php while($donnes = $reponse->fetch()){?>
		<header>
  			<p><?php echo $donnes['nom_piece'];?></p>
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
			  <p> <a onclick="window.open('ajoutCapteur.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">AJOUTEZ CAPTEUR</a> <br> <br> </p>
			 </section>
  		</header>
  		<?php }
  		?>
  <!--Pattern HTML-->



	<!--End Pattern HTML-->
  
</body>
</html>