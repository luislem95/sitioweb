<?php
$host="localhost";
$db="biblioteca";
$usuario="root";
$contraseña="";
try {
    $conexion=new PDO("mysql:host=$host;dbname=$db",$usuario,$contraseña);
} catch ( Exception $ex) {

    echo $ex->getMessage();

}
class db
{
    private $host="localhost";
    private $db="biblioteca";
    private $usuario="root";
    private $contraseña="";

    public function __construct($host, $db, $usuario, $contraseña)
    {
        $this->host=$host;
        $this->db=$db;
        $this->usuario=$usuario;
        $this->contraseña=$contraseña;
    }
    public function data()
    {
         $host="localhost";
         $db="biblioteca";
         $usuario="root";
         $contraseña="";
        try {
            $conexion=new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }return $conexion;
    } 
}
class Seleccionar extends db{
   
    private $tabla;
    private $id;

    public function __construct( $tabla,$txtID){
        $this->tabla=$tabla;
        $this->txtID=$txtID;
    }
   
    public function select(){

        $sentenciaSQL=$this->data()->prepare ("SELECT * FROM $tabla WHERE id=:id ");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
       return  $txtNombre=$libro['nombre'].$txtImagen=$libro['imagen'];
        
    
    }
}
?>
