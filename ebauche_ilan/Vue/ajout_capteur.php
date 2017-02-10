<?php include 'entete.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dosmoz form</title>
<link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
</head>
<body>

<?php include ('../controleur/ajout_capteur_controleur.php');?>

	<div class="container">
		<div class="command_buttons">
			<a href = "maSalle.php"><button id='salle'>Retour</button></a>
		</div>
		<div class="room_buttons">
		<section class="ajout-suppression">
		<form method="POST" action="../controleur/ajout_capteur_controleur.php">
			<select  name="liste_capteur" >
			<?php 
				while($donnes_cap = $reponse_cap->fetch()){
				echo '<option value="'.$donnes_cap['nom_fonction'].'"> '.$donnes_cap['nom_fonction'].'</option>';
				}
				
			?>
			</select>
			
			<?php echo '<input type="hidden" name="ID_piece" value= "'.$_POST['ID_piece'].'"/>'?>
			<input type="text" placeholder="adresse mac" name="adresse_mac"/>
			<button type="submit" name="boutton" class="submit-button">Ajouter</button>
		</form>
		</section>
		</div>
		
		
		
		
	</div>


</body>

</html>		