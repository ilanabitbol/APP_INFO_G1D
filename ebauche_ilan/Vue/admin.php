<?php include 'entete.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>dosmoz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" type ="text/css" href="../stylesheet/stylemaison.css">
 </head>

<body>
  	
  	<?php
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		$reponse= $connexion_base->getDb()->query( "SELECT email, ID FROM utilisateur ");
	?>
	<div class='container'>		
		<div class='command_buttons'>			
			<button onclick="window.open('supprimer_utilisateur.php', 'dosmoz', 'height = 300px,left = 450px, width = 500px, top = 300px, toolbar = no, location = false, menubar = no, status = no');">Supprimer un utilisateur</button>
		</div>
		<div class='room_buttons'>
		<?php while($donnes = $reponse->fetch()){?>
		
			<section class="rooms">	
  			<form action="maMaison.php" method="POST">
  			<?php echo '<input type="submit" value= "'.$donnes['email'].'" name="email_utilisateur" class="buttons" />' ;
				  echo $donnes['ID'];
				?>
  			</form>
  			</section>
  		<?php }
  		?>
  		</div>
  	</div>
  		
</body>
</html>