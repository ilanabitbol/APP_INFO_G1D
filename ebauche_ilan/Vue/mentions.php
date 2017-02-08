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
	
		<div class="container">
			  <div class="circle embossed">
			    <p class="embossedtextmentions">Mentions l&Eacutegales</p>
			  </div>
			
			  <div class="content embossed">
			    <p class="embossedtextmentions">
			    <?php 
			    while($donnes = $reponse->fetch()){
			    	echo $donnes['valeur'];
			    }
			    ?>
			    Mohai et Domisep sont des entreprises &Agrave but luratif proposant leurs services afin de r&Eacutepondre &Agrave la demande des utilisateurs desdits services.<br><br><br>
			    &Eacutediteur du site :<br><br>
			    Mohai inc.<br>
			    SARL au capital de xxxx EUR<br><br>
			    Si&#232ge social :<br><br>
			    10 Rue de Vanves, Issy-les-moulineaux<br>
			    Adresse mail : app.g1d.2019@gmail.com<br><br>
			    Responsable de la communication : &Eacutequipe Mohai<br><br><br>
			    H&Eacutebergement :<br><br>
			    L'h&Eacutebergement est r&Eacutealis&Eacute par la soci&Eacutet&Eacute XXXX.<br><br><br>
			    Propri&Eacutet&Eacute :<br><br>
			    L'ensemble de ce site est r&Eacutegi par la l&Eacutegislation fran&ccedilaise sur le droit d'auteur et la propri&Eacutet&Eacute intellectuelle. Le contenu du site, incluant, de fa&ccedilon non limitative, les images, graphismes, textes, vid&Eacuteos, logos, et ic&ocircnes sont la propri&Eacutet&Eacute exclusive de la soci&Eacutet&Eacute Mohai &Agrave l'exception des marques, logos ou contenus appartenant &Agrave d'autres soci&Eacutet&Eacutes partenaires ou auteurs.<br>
				La reproduction, la repr&Eacutesentation, le transfert, la distribution, ou l'enregistrement de tout ou partie de ces &Eacutel&Eacutements est formellement interdite sans l'autorisation expresse de la soci&Eacutet&Eacute Mohai.<br><br><br>
				Cookies<br><br>
				Afin d'am&Eacuteliorer et de personnaliser la navigation, des cookies peuvent &#234tre d&Eacutepos&Eacutes sur votre ordinateur. Vous pouvez choisir de refuser ces cookies en paramettrant votre navigateur. Pour en savoir plus sur le fonctionnement des cookies, nous vous invitons &Agrave lire cette page sur le site de la CNIL.<br><br><br>
				Conditions g&Eacuten&Eacuterales de vente :<br>
				[...]<br><br>
				D&Eacutelais de livraison :<br>
				[...]<br><br>
				Conditions de remboursement :<br>
				[...]
			  </div>
</div>

<footer><?php include 'footer.php';?></footer>

</body>

</html>
