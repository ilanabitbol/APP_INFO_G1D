<?php include 'header.php'?>
		
	<div class="container"><!--Creation de l'unique section de la page.-->
		
		<img  class="logo" src=../images/logo_dosmoz.jpg alt="Background de la page de connexion.">
		<div>
		  <button id="contact-button">Contact Mohai</button>
		</div>
		<!--Ajout des formulaires.-->
		<div>
			  <form id="signin-form" method="post" action="../controleur/Contact_controleur.php">
					<input type="email" placeholder='EMAIL' name="email"/>
					<textarea name="demande" id="textarea-contact" rows="6" cols="47" placeholder="Ecrivez ici votre demande pour nos webdesigners."></textarea>
					<button type="submit" name="signin-valider"class="submit-button">Envoyez</button>
			  </form>
		</div>
	</div>
<?php
$mail = 'app.g1d.2019@gmail.com'; // choix du destinataire
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))//|gmail|wanadoo
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}


$demande = isset($_POST['demande']) ? htmlspecialchars($_POST['demande']) : NULL;

$boundary = "-----=".md5(rand());

$sujet = "Message client of Dosmoz";

$email2=isset($_POST['email']) ? filter_var($email2, FILTER_VALIDATE_EMAIL) ? htmlspecialchars($_POST['email']) : NULL : NULL;
$header = 'From: '.$passage_ligne.'\"Client from dosmoz\"'.$email2.$passage_ligne; //adresse du client
$header.= "Reply-to: \"Huawei\" <app.g1d.2019@gmail.com>".$passage_ligne; //adresse des webdesigner
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$demande.$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

mail($mail,$sujet,$message,$header);
?>
	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="../stylesheet/contact.js"></script>
<?php include 'footer.php'?>	
