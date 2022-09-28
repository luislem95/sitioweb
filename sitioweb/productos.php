<?php include("template/cabezera.php");?>
<?php 
include("administrador/config/ladb.php");

$sentenciaSQL=$conexion->prepare("SELECT*FROM libros");
$sentenciaSQL->execute();
$listalibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<?php   foreach ($listalibros as $libro) {  ?>
<div class="col-md-3">
<div class="card">
<img class="card-img-top" src="./img/img<?php  echo $libro['imagen'];  ?>" alt="avatar">
<div class="card-body">
    <h4 class="card-title"><?php  echo $libro['nombre'];  ?></h4>
    <a name="" id="" class="btn btn-primary" href="<?php  echo $libro['link'];  ?>" target="_blank" role="button">Leer Libro</a>
</div>
</div>
</div>
<?php  }   ?>





<?php include("template/pie.php");?>    