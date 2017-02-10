<?php include 'entete.php'?>

<div class="container"><!--Creation de l'unique section de la page.-->

<p><?php echo "Le prix total de votre commande est de <strong>".$_POST['prix_total']."</strong> euros"?></p><br>
<p>Veuillez remplir le formulaire suivant pour la livraison de votre commande</p>
	<form id="signup-for" method="post" action="../controleur/validation_panier_controleur.php">
			  
		      <input type="text" placeholder="NOM" name="nom"/>
			  <input type="text" placeholder="PRENOM" name= "prenom"/>
			  <input type="text" placeholder="NUMERO DE TELEPHONE" name="tel"/>
			  <p class="date_livraison">Date de livraison : </p>
			  <input type="date" placeholder="DATE DE LIVRAISON" name="date_livraison"/>
			  <input type="text" placeholder="PAYS" name= "pays"/>
			  <input type="text" placeholder="CODE POSTAL" name= "code_postal"/>
			  <input type="text" placeholder="ADRESSE DE LIVRAISON" name= "adresse"/>
			  <input type="hidden" name= "prix_total" value=".$_POST['prix_total']."/>
			  <button type="submit" name="validation_commande" class="boutonbleu">Valider</button>
			  
	</form>
</div>
<?php include 'footer.php'?>