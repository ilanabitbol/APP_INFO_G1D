<?php
Class Connexion{
	private $pdo;
	
	public function __construct($host, $dbname, $user_name,$password) {
		$temp='mysql:host='.$host.';dbname='.$dbname.'; charset=utf8';
		echo $temp;
		$pdo=new PDO($temp, $user_name, $password);
	}

	public function getPdo(){
		return $this->pdo;
	}
	
	public function insertion(){
		
	}
	
	public function selection(){
		
	}
	
}


?>
