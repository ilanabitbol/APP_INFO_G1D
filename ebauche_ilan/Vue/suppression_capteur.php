<?php include 'entete.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
</head>
<body>

<?php include ('../controleur/suppression_capteur_controleur.php');?>

	<div class="container">
		<div class="command-buttons">
		<a href = "maSalle.php"><button id='salle'>Retour</button></a>
		</div>
		<div class="room-buttons">
		<section class="ajout-suppression">
		<form id="signin-form" method="POST" action="../controleur/suppression_capteur_controleur.php">
			<select  name="liste_capteur" >
			<?php 
				while($donnes_cap = $reponse_cap->fetch()){
				echo '<option value="'.$donnes_cap['nom_fonction'].'"> Capteur :'.$donnes_cap['nom_fonction'].'   Adresse Mac :'.$donnes_cap['adresse_mac'].'</option>';
				
				}
				
			?>
			</select>
			
			<?php echo '<input type="hidden" name="ID_piece" value= "'.$_POST['ID_piece'].'"/>'?>
			
			
			<button type="submit" name="boutton" class="submit-button">Supprimer</button>
		</form>
		</section>
		</div>
		
		
		
	</div>


</body>

</html>