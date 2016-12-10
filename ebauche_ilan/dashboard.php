<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/dashboard.css">
	

</head>
<body>

	<div class="admin-panel clearfix">
  <div class="slidebar">
    <div class="logo">
      <a href="#accueil"></a>
    </div>
    <ul>
      <li><a href="#accueil" id="targeted">Accueil</a></li>
      <li><a href="#">Consommation</a></li>
      <li><a href="#media">Gestion</a></li>
      <li><a href="#pages">Profil</a></li>

    </ul>
  </div>
  <div class="main">
    <ul class="topbar clearfix">
      <li><a href="#">q</a></li>
      <li><a href="#">p</a></li>
      <li><a href="#">o</a></li>
      <li><a href="#">f</a></li>
      <li><a href="#">n</a></li>
    </ul>
    <div class="mainContent clearfix">
      <div id="accueil">
        <h2 class="header"><span class="icon"></span>Accueil</h2>
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
          <form action="post" method="">
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
      <div id="posts">
        <h2 class="header">posts</h2>
      </div>
      <div id="media">
        <h2 class="header">media</h2>
      </div>
      <div id="pages">
        <h2 class="header">pages</h2>
      </div>
      <div id="links">
        <h2 class="header">links</h2>
      </div>
      <div id="comments">
        <h2 class="header">comments</h2>
      </div>
      <div id="widgets">
        <h2 class="header">widgets</h2>
      </div>
      <div id="plugins">
        <h2 class="header">plugins</h2>
      </div>
      <div id="users">
        <h2 class="header">users</h2>
      </div>
      <div id="tools">
        <h2 class="header">tools</h2>
      </div>
      <div id="settings">
        <h2 class="header">settings</h2>
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
</div>

</body>

</html>