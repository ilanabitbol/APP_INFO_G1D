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
		$reponse= $connexion_base->getDb()->query( "SELECT nom_piece, ID_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");
	?>
	<div class='container'>		
		<header>
			<button onclick="window.open('ajout_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Ajouter une pi&egravece</button>
			<button onclick="window.open('supprimer_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Supprimer une pi&egravece</button>
		</header>
		
<!-- 		<header> -->
		
	
		<?php while($donnes = $reponse->fetch()){?>
		
			<section>	
  			<form action="maSalle.php" method="POST">
  			<?php echo '<input type="hidden" name="ID_piece" value= "'.$donnes['ID_piece'].'"/>'?>
  			<?php echo '<input type="submit" value= "'.$donnes['nom_piece'].'" class="buttons" />' ?>
  			</form>
  			
  			<?php $_SESSION['nom_piece']=$donnes['nom_piece']?>
  			</section>
  		
  		<?php }
  		?>
<!--   		</header> -->
  	</div>
  		
</body>
</html>