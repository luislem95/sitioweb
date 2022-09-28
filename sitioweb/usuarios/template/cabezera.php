<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body> 
  <?php $url="http://".$_SERVER['HTTP_HOST']."/todo/sitioweb";
  ?>
  <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#">Administrador del sitio web <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/inicio.php";?>">Inicio</a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/seccion/productos.php";?>">Libros</a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/seccion/prestamos.php";?>">Prestamos</a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/seccion/usuarios.php";?>">Usuarios</a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/seccion/bibliotecarios.php";?>">Bibliotecarios</a>
          <a class="nav-item nav-link" href="<?php echo $url."/usuarios/seccion/cerrar.php";?>">Cerrar</a>
          <a class="nav-item nav-link" href="<?php echo $url;  ?>" target="_blank">Ver sitio web</a>
      </div>
  </nav>
      
<div class="container">
  <br><br>
    <div class="row">