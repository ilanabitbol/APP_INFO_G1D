<?php
class Connexion_Base{
	private $bdd;
	
	public function __construct(){
		$this->bdd = new PDO('mysql:host=localhost;dbname=APP_G1D_BASE;charset=utf8', 'root', 'root');
	}
	
	public function getBdd(){
		return $this->bdd;
	}
	
}

	
	

?>