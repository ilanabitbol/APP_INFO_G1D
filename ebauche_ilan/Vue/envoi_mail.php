<?php 
include("entete.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/envoi_mail.css">
</head>
<body>
<div class="container">

		<img  class="logo" src=../images/logo_dosmoz_contact.jpg alt="Background de la page de connexion.">
		<div>
		  <p class='contact'>CONTACT</p>
		</div>

			<?php if(array_key_exists('errors', $_SESSION)): ?>
			<div class="alert alert-danger">
				<?= implode('<br>', $_SESSION['errors']); ?>
			</div>
			<?php unset($_SESSION['errors']); endif;?>
			<?php if(array_key_exists('success', $_SESSION)): ?>
			<div class="alert alert-success">
				Votre email a bien &#233t&#233 envoy&#233
			</div>
			<?php endif;?>
		
		
    <form id="contact-form"  method="post" action="post_contact.php">
                            <input name="nom" type="text" class="form-control" id="name" placeholder="NOM" value="<?= isset($_SESSION['inputs']['nom']) ? $_SESSION['inputs']['nom'] : ''; ?>" required="required" />
                            <input name="email" type="email" class="form-control" id="email" placeholder="EMAIL" required="required" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>" />
							<input name="objet" type="text" class="form-control" id="name" placeholder="OBJET" value="<?= isset($_SESSION['inputs']['objet']) ? $_SESSION['inputs']['objet'] : ''; ?>" required="required" />                            
			   <p>Service &#224 contacter : <select>
				                            <option value="direction">Direction</option>
				                            <option value="sav">SAV</option>
				                            <option value="mohai">Webdesigner</option>
				                            </select>
               </p>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Entrez ici votre demande."><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : '' ?></textarea>
                        	<button type="submit" class="send_button" id="send_button">Envoyer</button>
    </form>
<br></br><br></br>
				<address>
				  <strong>Notre adresse postale</strong><br>
				  <a href="https://www.google.fr/maps/place/ISEP/@48.824529,2.2798536,15z/data=!4m5!3m4!1s0x0:0xe0d3eb2ad501cb27!8m2!3d48.824529!4d2.2798536" class="footerlist_link" target="_blank">10 Rue de Vanves, Issy-les-Moulineaux,France</a><br>
				</address>	
</div>
<footer><?php include 'footer.php';?></footer>

</body>
</html>
<?php
unset($_SESSION['success']);
unset($_SESSION['inputs']);
unset($_SESSION['errors']);
?>