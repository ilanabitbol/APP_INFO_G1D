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
 		
 	<div class="container">
 			
 			<div class='command_buttons'>
  				<a href = "maMaison.php"><button id='retour'><?php echo 'Retour';?></button></a>
			  	<a onclick="window.open('ajout_capteur.php', 'dosmoz', 'height = 550px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');"><button>Ajouter un capteur</button></a>
			 </div>
  			<?php while($donnes = $reponse->fetch()){?>
		
			<section>
			 	<p> <?php echo $donnes['nom_capteur'];?> <br> <?php echo $donnes['adresse_mac'];?> <br> 
               		<?php switch ($donnes['ID_fonction']){
               			case '1':
               			echo $donnes['donnees'] . ' °';
               			break;
               			case '2':
               			echo $donnes['donnees'] . ' %';
               			break;
               			case '3':
               			echo $donnes['donnees'] . ' Lux';
               			break;
               		}
               		?>
               			
               </p>
  			</section>
  		
  			<?php }
  			?>
	</div>
 
 </body>