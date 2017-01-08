@<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Grid Block With Section Titles</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
 </head>

<body>
  	<?php include 'entete.php';
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		// lecture dans la table catalogue
		$reponse= $connexion_base->getDb()->query( "SELECT nom_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");?>
		
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
			  <p> <a href="shop.php">AJOUTEZ CAPTEUR</a> <br> <br> </p>
			 </section>
  		</header>
  		<<?php }
		$reponse->closeCursor(); // Termine le traitement de la requête
		?>
  <!--Pattern HTML-->



	<!--End Pattern HTML-->
  
</body>
</html>
