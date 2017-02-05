
<?php


require('modele/gestion_utilisateur.php');

// On teste nos variables
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['mdp_2']) && isset($_POST['email']))
{

    $vemail='#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';

    if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 25
    || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 25
    || preg_match($vemail,$_POST['email'])==false
    || $_POST['mdp']!=$_POST['mdp_2'])


    {  echo 'Erreur dans le formulaire';}
  else {
          $reponse = recup_all_login($db);
          $i=0;
          while ($donnees = $reponse->fetch())
          {
          	if($donnees['login'] == $_POST['login'])
            {
              $i=1;
            }
           }

          $reponse->closeCursor();

          if($i==0)
          {
              inscription_utilisateur_secondaire($db);
            $_SESSION['inscription']=true;
            echo '<meta http-equiv="refresh" content="1; index.php?page=ajout_utilisateur_secondaire" >';
          }
          else
           {
            echo '<br/>Erreur : Le login choisi n\'est pas disponible.';
          }
    }

}

else
{
  echo '<br/>Erreur : Les variables du formulaire ne sont pas déclarées.';
}
?>
