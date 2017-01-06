<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/shop.css">
</head>
<body>
	<?php include 'entete.php';
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		// lecture dans la table catalogue
		$reponse= $connexion_base->getDb()->query('SELECT nom_produit, prix, stock FROM catalogue');?>
		
		<?php while($donnes = $reponse->fetch()){?>
		<div id="container">
			<ul class="list">
		        <li><?php 
		        		  echo 'Voici le produit : '.$donnes['nom_produit'].'<br />';
						  echo 'Son prix est de : '.$donnes['prix'].' euros TTC'.'<br />';
						  echo 'Il en reste '.$donnes['stock'].'<br />'; 
					?>
				<button href="../Vue/about.php" class="buttons">acheter</button>
					
				</li>
					
    		</ul>
		</div>
		<?php }
		$reponse->closeCursor(); // Termine le traitement de la requête
?>
	  
</body>


</html>
