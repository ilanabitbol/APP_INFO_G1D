<?php include 'entete.php';
session_start();?>
<?php include_once ('../modele/Connexion_Base.class.php');
$connexion_base= new Connexion_Base();
$reponse= $connexion_base->getDb()->query('SELECT * FROM utilisateur	 WHERE ID = "'.$_SESSION['ID'].'" ');?>

  <div class="container">
  
    <div class="profil_list">
    
        <h3>
        <p>
          Bienvenue <?php while($donnes = $reponse->fetch()){ echo $donnes['prenom'];?> voici vos informations :
        </p>
        </h3><br>

      <div>
      <p>
        Pr&#233nom : <?php echo $donnes['prenom'];?>
      </p>
      </div><br>

      <div>
      <p>
        Nom : <?php echo $donnes['nom'];?>
      </p>
      </div><br>

      <div>
      <p>
        Email : <?php echo $donnes['email'];?>
      </p>
      </div><br>

      <div>
      <p>
        Num&#233ro de t&#233l&#233phone : <?php echo $donnes['numero'];?>
      </p>
      </div><br>

      <div>
      <p>
        Adresse : <?php echo $donnes['adresse'];?>
      </p>
      </div><br>
      
      <div>
      <p>
        Pays : <?php echo $donnes['pays']; ?>
      </p>
      </div><br>

      <div>
      <p>
        Ville : <?php echo $donnes['ville'];?>
      </p>
      </div><br>

      <div>
      <p>
        Code postal : <?php echo $donnes['code_postal']; } ?>
      </p>
      </div><br>
      
      <form method="POST" action="modification_profil.php">
      <button type="submit" class="boutonbleu" id="modif_button">Modifier votre profil</button>
      </form>
      
   
    </div>
    
</div>
<?php include 'footer.php';?>