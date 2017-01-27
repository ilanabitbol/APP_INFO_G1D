<?php
class Connexion_Base{
	private $db;
	//Constructeur
	public function __construct(){
		$this->db = new PDO('mysql:host=sql101.byethost18.com;dbname=b18_19502826_app_g1d_base;charset=utf8', 'b18_19502826', 'P*2C*2IR*');
	}
	//Getter 
	public function getDb(){
		return $this->db;
	}
	
}

	
	

?>