<?php include 'entete.php';?>

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
								<a href="panier.php?action=ajout&amp;l=<?php echo($donnes['nom_produit']); ?>&amp;q=1&amp;p=<?php echo($donnes['prix']); ?>" onclick="window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a></td>
							
													
							</div>
						</li>
							
		    		</ul>
				</div>
				<?php 
				}
				$reponse->closeCursor(); // Termine le traitement de la requête
		?>
		
	</div>	  
<?php include 'footer.php';?>