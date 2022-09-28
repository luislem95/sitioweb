<?php

include("../config/bd.php");

$usuario=$_POST['usuario'];
$contraseña= trim($_POST['contraseña']);
$contraseña= hash('sha512', $contraseña);



 $consulta="SELECT*FROM administrador where usuario='$usuario' and password= '$contraseña' ";
 $resultado= mysqli_query($conectar,$consulta);
 $filas= mysqli_num_rows($resultado);

 if($filas){
    
session_start();
$_SESSION['usuario']=$usuario;
    header("location:../inicio.php");
 }else{
    echo'<script type="text/javascript">
    alert("Ingrese datos validos ");
    window.location.href="../index.php";
    </script>';
}

mysqli_free_result($resultado);
mysqli_close($conectar)


?>