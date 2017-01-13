<?php include 'entete.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/shop.css">
</head>
<body>
	<div class="container_global">
		<?php
				include_once ('../modele/Connexion_Base.class.php');
				$connexion_base= new Connexion_Base();
				// lecture dans la table catalogue
				$reponse= $connexion_base->getDb()->query('SELECT nom_produit, prix, stock FROM catalogue');?>
				
				<?php while($donnes = $reponse->fetch()){?>
				<div id="container">
					<ul class="list">
				        <li>
					        <div class="innercontainer">
						        <div id="content">
						        	<section id="image">
							        	<?php 
											switch ($donnes['nom_produit'])
											{
												case 'hydrometre':?>
										  		<img alt="hydrometre" src="../images/rain.png"/>
										  		<?php break;?>
										<?php 
												case 'thermometre':?>
												<img alt="thermometre" src="../images/temperature.png"/>
												<?php break;?>
										<?php 
												case 'pressiometre':?>
												<img alt="pressiometre" src="../images/meter.png">
												<?php break;?>
												
										<?php }?>
									</section>
									<section id="infos">
							        <?php 
							        		  echo 'Produit : '.$donnes['nom_produit'].'<br />';
											  echo 'Prix : '.$donnes['prix'].' euros TTC'.'<br />';
											  echo 'Stock : '.$donnes['stock'].'<br />'; 
										?>
									</section>
								</div>		
								<form action="../Vue/paiement.php">
						    			<input type="submit" value="Acheter" class="buttons">
								</form>
													
							</div>
						</li>
							
		    		</ul>
				</div>
				<?php 
				}
				$reponse->closeCursor(); // Termine le traitement de la requête
		?>
	</div>	  
</body>


</html>
