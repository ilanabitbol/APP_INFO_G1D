<?php include 'entete.php' ;
	  include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
		$reponse= $connexion_base->getDb()->query('SELECT  type_fonction.nom_fonction, actionneurs_capteurs.adresse_mac, MAX(donnees.date_donnees) AS last_date, donnees.valeur, actionneurs_capteurs. etat, actionneurs_capteurs.batterie
                                                        FROM piece, donnees, actionneurs_capteurs, type_fonction
                                                        WHERE piece.ID = "'.$_SESSION['ID'].'"  AND donnees.ID_ac_cap = actionneurs_capteurs.ID_ac_cap AND actionneurs_capteurs.ID_piece = "'.$_POST['ID_piece'].'" AND actionneurs_capteurs.ID_fonction = type_fonction.ID_fonction
														GROUP BY donnees.ID_ac_cap
                                                        ');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/global.css">
</head>
<body>
	
	<div class="container" id="incolore">
		<div class="circle embossed">
			<p class="embossedtext">Dosmoz</p>
		</div>
				
		<div class="content embossed">
			<p class="embossedtext">
				<?php 
				while($donnes = $reponse->fetch()){
				echo $donnes['valeur'];
				}
				?>
				Dosmoz est un projet r&Eacutealis&Eacute par une des &Eacutequipes de Mohai &Agrave la demande de DomIsep. Une &Eacutequipe de 6 grands apprentis ing&Eacutenieurs a con&ccedilu ce produit.
			</p>
		</div>
	</div>
	
	<div class="container" id="incolore">
		<div class="circle embossed">
			<p class="embossedtext">Domisep</p>
		</div>
		<div class="content embossed">
			<p class="embossedtext">
				DOMISEP est une grande soci&#233t&#233 qui poss&#232de des ing&#233nieurs g&#233n&#233ralistes dans tous les domaines du num&#233rique.<br><br>
				Depuis 60 ans, elle fournit &#224 ses clients des produits avec une v&#233ritable qualit&#233 et permet d'acc&#233der &#224 nos consommations afin d'&#234tre encore plus &#233cologique.<br><br>
				Ses activit&#233s sont tr&#232s vari&#233es (scientifiques, techniques, commerciales ou manag&#233riales) et dans tous les secteurs d'activit&#233s, en France comme &#224 l'&#233tranger (A&#233ronautique,
				  Automobile, T&#233l&#233communication, Sant&#233, Finance, Conseil, Spatial, etc.)<br><br><br>
				Gr&#226ce &#224 sa forte dimension internationale, elle a su &#233toffer ses effectifs et ainsi avoir la renom&#233e qu'elle a aujourd'hui.
				
				 DOMISEP, constamment class&#233e en t&#234te du fameux Customers Electronics Show  est tr&#232s largement pl&#233biscit&#233e 
				  par les m&#233 qui reconnaissent le talents des &#233quipes de tr&#232s haut niveau d'ing&#233nieurs que poss&#232de la soci&#233t&#233.
			</p>			  					
		</div>
	</div>

<footer><?php include 'footer.php';?></footer>

</body>

</html>
