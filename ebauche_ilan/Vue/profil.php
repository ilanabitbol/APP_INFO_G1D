<?php include 'entete.php';
session_start();?>
<?php include_once ('../modele/Connexion_Base.class.php');
$connexion_base= new Connexion_Base();
$reponse= $connexion_base->getDb()->query('SELECT * FROM utilisateur	 WHERE ID = "'.$_SESSION['ID'].'" ');?>

  <div class="container">
  
    <div class="profil_list">
    
        <h1>
        <p>
          Bienvenue <?php while($donnes = $reponse->fetch()){ echo $donnes['prenom'];?> voici vos informations :
        </p>
        </h1><br>
	<a href = "parametres.php"><button class="boutonbleu">Retour</button></a>
      <div>
      <p>
        <strong>Pr&#233nom :</strong> <?php echo $donnes['prenom'];?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Nom :</strong> <?php echo $donnes['nom'];?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Email :</strong> <?php echo $donnes['email'];?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Num&#233ro de t&#233l&#233phone :</strong> <?php echo $donnes['numero'];?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Adresse :</strong> <?php echo $donnes['adresse'];?>
      </p>
      </div><br>
      
      <div>
      <p>
        <strong>Pays :</strong> <?php echo $donnes['pays']; ?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Ville :</strong> <?php echo $donnes['ville'];?>
      </p>
      </div><br>

      <div>
      <p>
        <strong>Code postal :</strong> <?php echo $donnes['code_postal']; } ?>
      </p>
      </div><br>
      
      <form method="POST" action="modification_profil.php">
      <button type="submit" class="boutonbleu" id="modif_button">Modifier votre profil</button>
      </form>
      
   
    </div>
    
</div>
<?php include 'footer.php';?>