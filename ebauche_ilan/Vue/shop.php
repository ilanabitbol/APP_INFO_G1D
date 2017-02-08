<?php include 'entete.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/global.css">
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
												case 'Anemometre':?>
										  		<img alt="Anemometre" class="arrondi" src="../images/anemometre.png"/>
										  		<?php break;?>
										<?php 
												case 'Station_meteo':?>
												<img alt="Station meteo" class="arrondi" src="../images/station.png"/>
												<?php break;?>
										<?php 
												case 'Thermostat':?>
												<img alt="Thermostat" class="arrondi" src="../images/thermostat.png">
												<?php break;?>
										<?php 
												case 'Pluviometre':?>
												<img alt="Pluviometre" class="arrondi" src="../images/Pluvio_shop.jpg">
												<?php break;?>
										<?php 
												case 'Camera':?>
												<img alt="Camera" class="arrondi" src="../images/camera_shop.jpg">
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
								<?php 
									if ($_SESSION == NULL){?>
										<form action="../Vue/sign_in-up.php">
										<input type="submit" value="Acheter" class="buttons">
										</form>
									<?php }else{?>
										<form action="../Vue/paiement.php">
										<input type="submit" value="Acheter" class="buttons">
										</form>
									<?php }
									?>
							
													
							</div>
						</li>
							
		    		</ul>
				</div>
				<?php 
				}
				$reponse->closeCursor(); // Termine le traitement de la requête
		?>
		
	</div>	  
	
<footer><?php include 'footer.php';?></footer>

</body>

</html>
