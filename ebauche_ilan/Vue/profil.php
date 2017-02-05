<?php include 'entete.php';
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/profil.css">
</head>
<body>
<?php include_once ('../modele/Connexion_Base.class.php');
$connexion_base= new Connexion_Base();
$reponse= $connexion_base->getDb()->query('SELECT * FROM utilisateur	 WHERE ID = "'.$_SESSION['ID'].'" ');?>

  <div class="container">
  
    <div class="profil_list">
        <h3>
          Bienvenue <?php while($donnes = $reponse->fetch()){ echo $donnes['prenom'];?> voici vos informations :
        </h3><br>

      <div>
        Pr&#233nom : <?php echo $donnes['prenom'];?>
      </div><br>

      <div>
        Nom : <?php echo $donnes['nom'];?>
      </div><br>

      <div>
        Email : <?php echo $donnes['email'];?>
      </div><br>

      <div>
        Num&#233ro de t&#233l&#233phone : <?php echo $donnes['numero'];?>
      </div><br>

      <div>
        Adresse : <?php echo $donnes['adresse'];?>
      </div><br>
      
      <div>
        Pays : <?php echo $donnes['pays']; ?>
      </div><br>

      <div>
        Ville : <?php echo $donnes['ville'];?>
      </div><br>

      <div>
        Code postal : <?php echo $donnes['code_postal']; } ?>
      </div><br>
      
      <form method="POST" action="modification_profil.php">
      <button type="submit" class="modif_button" id="modif_button">Modifier votre profil</button>
      </form>
      
    </div>
    
</div>
<footer><?php include 'footer.php';?></footer>