	<?php include 'header.php'?>
		
	<div class="container"><!--Creation de l'unique section de la page.-->
		
		<img  class="logo" src=../images/logo_dosmoz.jpg alt="Background de la page de connexion.">
		<!--Ajout des boutons de connexion et d'inscription.-->
		<div>
		  <button id="signin-button">Connexion</button>
		  <button id="signup-button">Inscription</button>
		</div>
		<!--Ajout des formulaires.-->
		<div>
			
			<form id="signup-form" method="post" action="../controleur/Inscription_controleur.php">
		      <input type="text" placeholder="NOM" name="nom"/>
			  <input type="text" placeholder="PRENOM" name= "prenom"/>
			  <input type="email" placeholder="EMAIL" name="email"/>
		      <input type="password" placeholder="PASSWORD" name="password"/>
		      <input type="text" placeholder="NUMERO" name="numero" />
		      <p>pays : </p>
		      <select id="ListeElement" onchange="VerifListe();" name="pays"> 
				   <option value="France">France</option> 
				   <option value="Allemagne">Allemagne</option> 
				   <option value="Suisse">Suisse</option> 
				   <option value="Russie">Russie</option>
				   <option value="Espagne">Espagne</option>
				   <option value="Italie">Italie</option>
			  </select>
		      <input type="text" placeholder="VILLE" name="ville"/>
		      <input type="text" placeholder="CODE POSTAL" name="code_postal"/>
		      <input type="text" placeholder="ADRESSE" name="adresse"/>
		      <p><input type="checkbox" required /> J'ai lu et accepte les <a href="">Conditions g&eacuten&eacuterales d'utilisation</a></p>
			  <button type="submit" name="signup-valider" class="submit-button">Insciption</button> 
		   </form>

		  <form id="signin-form" method="post" action="../controleur/Connexion_controleur.php">
				<input type="email" placeholder='EMAIL' name="email"/>
				<input type="password" placeholder="PASSWORD" name="password"/>
				<button type="submit" name="signin-valider"class="submit-button">Connexion</button>
		  </form>

		</div>

	</div>
	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="../stylesheet/sign_in-up.js"></script>
<?php include 'footer.php'?>
