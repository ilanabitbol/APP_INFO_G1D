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
		$reponse= $connexion_base->getDb()->query( "SELECT nom_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");
	?>
	<div class='container'>		
		<div>
			<button onclick="window.open('ajout_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Ajouter une salle</button>
			<button>Supprimer une salle</button>
		</div>
		
		<header>
	
		<?php while($donnes = $reponse->fetch()){?>
		
			<section>
  			<a href = "maSalle.php"><button id="salle"><?php echo $donnes['nom_piece'];?></button></a>
  			</section>
  		
  		<?php }
  		?>
  		</header>
  	</div>
  		
</body>
</html>