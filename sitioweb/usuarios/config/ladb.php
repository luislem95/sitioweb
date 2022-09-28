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

?>