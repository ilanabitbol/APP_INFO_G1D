<?php include 'entete.php' ;
	  include_once ('../modele/Connexion_Base.class.php');
		include_once ('../modele/Query.class.php');
		$connexion_base= new Connexion_Base();
		$query = new Query();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/about.css">
</head>
<body>
	
		<div class="container">
			  <div class="circle embossed">
			    <p class="embossedtext">Dosmoz</p>
			  </div>
			
			  <div class="content embossed">
			    <p class="embossedtext">
			    Clement Dosmoz est un projet r&Eacutealis&Eacute par une des &Eacutequipes de Mohai &Agrave la demande de DomIsep. Une &Eacutequipe de 6 grands apprentis ing&Eacutenieurs a con&ccedilu ce produit.
			  </div>
</div>
		<footer><?php include 'footer.php';?></footer>
</body>

</html>
