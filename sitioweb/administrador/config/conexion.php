<?php  

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "biblioteca";
	$conect;

			$connectionString = "mysql:host".$this->host.";dbname=".$this->db.";charset=utf8";
			try{
				$this->conect = new PDO($connectionString,$this->user,$this->pass);
				$this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				echo "Conexion exitosa...";
			}catch(Exception $e){
				$this->conect = "Erro en la conexion";
				echo "ERROR: ".$e->getMessage();
			}

?>