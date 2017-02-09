<?php include 'entete.php'?>
<div class="container"><!--Creation de l'unique section de la page.-->
	  	<form id="signin-form" method="post" action="../controleur/piece_controleur.php">

	 		<input  type="text" placeholder="nom de la piece" name="nom_piece_supprimer"/>
	 		<button type="submit" name="bouton" class="submit-button">Supprimer</button>

	 	</form>
</div>
<?php include 'footer.php'?>