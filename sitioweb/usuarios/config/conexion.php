<?php  
	class Conexion{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "biblioteca";
		private $conect;

		public function __construct(){
			$connectionString = "mysql:host".$this->host.";dbname=".$this->db.";charset=utf8";
			try{
				$this->conect = new PDO($connectionString,$this->user,$this->pass);
				$this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				echo "Conexion exitosa...";
			}catch(Exception $e){
				$this->conect = "Erro en la conexion";
				echo "ERROR: ".$e->getMessage();
			}
		}
	}
	$conect = new Conexion();
?>