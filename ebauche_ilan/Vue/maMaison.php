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
		$reponse= $connexion_base->getDb()->query( "SELECT nom_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");
	?>
	<div class='container'>		
		<div class='command_buttons'>
			<button onclick="window.open('ajout_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Ajouter une piece</button>
			
			<button onclick="window.open('supprimer_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Supprimer une piece</button>
		</div>
		<div class='room_buttons'>
		<?php while($donnes = $reponse->fetch()){?>
		
			<section>
  			<a href = "maSalle.php"><button id="salle"><?php echo $donnes['nom_piece'];?></button></a>
  			</section>
  		<?php }
  		?>
  		</div>
  	</div>
  		
</body>
</html>