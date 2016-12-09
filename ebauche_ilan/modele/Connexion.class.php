<?php
Class Connexion{

	public function getDatabase(){
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=APP_G1D_BASE; charset=utf8', 'root', 'root');
			echo "Connexion etablie avec la bade de donnée.";
		} catch (PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
		return $dbb;
	}
}

?>
