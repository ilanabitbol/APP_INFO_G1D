<?php
class Connexion_Base{
	private $db;
	//Constructeur
	public function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=APP_G1D_BASE;charset=utf8', 'root', 'root');
	}
	//Getter 
	public function getDb(){
		return $this->db;
	}
	
}

	
	

?>