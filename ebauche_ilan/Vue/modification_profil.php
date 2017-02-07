<?php include 'entete.php';
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/modification_profil.css">
</head>
<body>
  <div class="container">
    <h1 class="titre">Modification de votre profil</h1>
    <form method="POST" action="../controleur/verif_modif_profil.php">
      	
        <input type="text" name="nom" placeholder="NOUVEAU NOM"/>
      
        <p>Pays : </p>
		      <select id="ListeElement"  name="pays"> 
				   <option value="France">France</option> 
				   <option value="Allemagne">Allemagne</option> 
				   <option value="Suisse">Suisse</option> 
				   <option value="Russie">Russie</option>
			  </select>
			  
        <input type="text" name="ville" placeholder="NOUVELLE VILLE"/>
        
        <input type="text" name="adresse" placeholder="NOUVELLE ADRESSE"/>     
        
        <input type="text" name="code_postal" placeholder="NOUVEAU CODE POSTAL"/>
        
        <input type="text" name="numero" placeholder="NOUVEAU NUMERO"/>
        
        <input type="email" name="email" placeholder="NOUVELLE ADRESSE MAIL"/>

        <input type="text" name="mdp"placeholder="NOUVEAU MOT DE PASSE"/>

        <input type="text" name="confirm_mdp"placeholder="CONFIRMER NOUVEAU MOT DE PASSE" required onblur="verif_mdp(mdp,confirm_mdp)"/>

		<input type="text" name="old_mdp"placeholder="MOT DE PASSE ACTUEL" required/>

      <p>
        <input type="checkbox" required /> Je certifie être le propriétaire du compte
      </p>
      <button type="submit" class="modif_button" id="modif_button">Valider la modification de votre profil</button>
    
     
    </form>
</div>

<footer><?php include 'footer.php';?></footer>
</body>
</html>