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
		if (isset($_SESSION['admin'])){//traitement pour l'admin
			$email = $_POST['email_utilisateur'];
			$reponse= $connexion_base->getDb()->query( "SELECT ID  FROM utilisateur WHERE email='{$email}' ");
			while ($donnes =$reponse->fetch()){
				$_SESSION['ID_choisis'] = $donnes['ID'];
			}
			$reponse= $connexion_base->getDb()->query( "SELECT nom_piece, ID_piece FROM piece WHERE ID='{$_SESSION['ID_choisis']}' ");
		}else{//traitement pour l'utilisateur
			$reponse= $connexion_base->getDb()->query( "SELECT nom_piece, ID_piece FROM piece WHERE ID='{$_SESSION['ID']}' ");
		}
	?>
	<div class='container'>		
		<div class='command_buttons'><?php 
			if (isset($_SESSION['admin'])){?>
				<a href = "admin.php"><button id="salle">Retour</button></a>
			<?php }
			?>
			<button onclick="window.open('ajout_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Ajouter une piece</button>
			
			<button onclick="window.open('supprimer_piece.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Supprimer une piece</button>
		</div>
		<div class='room_buttons'>
		<?php while($donnes = $reponse->fetch()){?>
		
			<section class="rooms">	
  			<form action="maSalle.php" method="POST">
  			<?php echo '<input type="hidden" name="ID_piece" value= "'.$donnes['ID_piece'].'"/>'?>
  			<?php echo '<input type="submit" value= "'.$donnes['nom_piece'].'" class="buttons" />' ?>
  			</form>
  			</section>
  		<?php }
  		?>
  		</div>
  		
  		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
  		</div>
  	</div>
 
<footer><?php include 'footer.php';?></footer>
  		
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  	<script type="text/javascript" src="../stylesheet/stats.js"></script>
</body>
</html>