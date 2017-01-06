<?php
	session_start();
	print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/dashboard.css">
</head>
<body>
		
		<nav id="nav-2">
		  <a class="link-2" href="dashboard.php">Dashboard</a>
		  <a class="link-2" href="about.php">About</a>
		  <a class="link-2" href="contact.php">Contact</a>
		  <a class="link-2" href="shop.php">Shop</a>
		  <a class="link-2" href="sign_in-up.php">Connexion-Inscription</a>
		  
		  <?php 
		  	if ($_SESSION['prenom']){?>
		  		<a class="link-2">
		  		<?php echo 'Bienvenue ' . $_SESSION['prenom'];?>
		  		</a>
		  		<a class="link-2" href="../controleur/deconnexion_controleur.php">Deconnexion</a>
		  <?php } ?>	
		  
		</nav>

	<div class="admin-panel clearfix">
	<div class="slidebar">
    <div class="logo">
      <a href="#accueil"></a>
    </div>
    <ul>
      <li><a href="#accueil" id="targeted">Accueil</a></li>
      <li><a href="#consommation">Consommation</a></li>
      <li><a href="#media">Gestion</a></li>
      <li><a href="#pages">Profil</a></li>

    </ul>
  </div>
  <div class="main">
    <ul class="topbar clearfix">
      <li><a href="#">Bienvenue</a></li>
      <li><a href="#">p</a></li>
      <li><a href="#">o</a></li>
      <li><a href="#">f</a></li>
      <li><a href="#">n</a></li>
    </ul>
    <div class="mainContent clearfix">
      <div id="accueil">
        <h2 class="header"><span class="icon"></span>Bonjour</h2>
        <div class="monitor">
          <h4>Right Now</h4>
          <div class="clearfix">

            <ul class="salon">
              <li>Salon</li>
              <li class="temperature"><span class="count">17</span><a href="">temperature
              </a></li>
              <li class="humidite"><span class="count">13%</span><a href="">humidité</a></li>
              <li class="luminosité"><span class="count">21 Lux</span><a href="">luminosité</a></li>
            </ul>

            <ul class="cuisine">
              <li>Cuisine</li>
              <li class="temperature"><span class="count">24</span><a href="">temperature</a></li>
              <li class=humidite><span class="count">34%</span><a href="">humidité</a></li>
              <li class="luminosité"><span class="count">34 Lux</span><a href="">luminosité</a></li>
			</ul>
          </div>
        </div>

        <div class="quick-press">
          <h4>Ajout d'un utilisateur</h4>
          <form action="post" method="post">
            <input type="text" name="Pseudo de l'utilisateur" placeholder="pseudo" />
            <input type="text" name="content" placeholder="mot de passe" />
            <label>
                <input type="checkbox" name="piece_bouton" value="A accès à : ">
                Pièce 1
            </label>
            <label>
                <input type="checkbox" name="piece_bouton" value="A accès à : ">
                Pièce 2
            </label>
            <label>
                <input type="checkbox" name="piece_bouton" value="A accès à : ">
                Pièce 3
            </label>
            <button type="submit" class="submit" name="submit">Enregistrer ! </button>
          </form>
		 </div>
        
        
      </div>
      
      <div id="consommation">
        
		          <h4>Ajout d'un utilisateur</h4>
		

      </div>
        
        
      </div>
      
    </div>
    <ul class="statusbar">
      <li>
        <a href=""></a>
      </li>
      <li>
        <a href=""></a>
      </li>
      <li class="profiles-setting"><a href="">s</a></li>
      <li class="logout"><a href="">k</a></li>
    </ul>
  </div>
<?php include 'footer.php'?>
