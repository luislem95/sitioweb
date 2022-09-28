<?php include("../template/cabezera.php");?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/ladb.php");

switch($accion){
            case"Agregar":
                $sentenciaSQL=$conexion->prepare("INSERT INTO libros( nombre, imagen) VALUES (:nombre, :imagen)");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
               
               $fecha= new DateTime();
               $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                if($tmpImagen!=""){

                    move_uploaded_file($tmpImagen,"../../img/img".$nombreArchivo);
                }

                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->execute();
                header("location:productos.php");
                break;

            case"Modificar":
                $sentenciaSQL=$conexion->prepare("UPDATE libros set nombre=:nombre WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->execute();
                
            if ($txtImagen!="") {

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";              
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
               
                move_uploaded_file($tmpImagen,"../../img/img".$nombreArchivo);

                $sentenciaSQL=$conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                        if(isset($libro["imagen"]) && ($libro["imagen"]!="imagen.jpg") ){
                            
                            if(file_exists("../../img/img".$libro["imagen"])){
                               
                                unlink("../../img/img".$libro["imagen"]);
                           
                            }
                        }


                $sentenciaSQL=$conexion->prepare("UPDATE libros set imagen=:imagen WHERE id=:id");
                $sentenciaSQL->bindParam(':id', $txtID);
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->execute();
            }
            header("location:productos.php");
                break;

            case"Cancelar":
                 header("location:productos.php");
                break;

                case"Seleccionar":
                    $sentenciaSQL=$conexion->prepare("SELECT*FROM libros WHERE id=:id");
                    $sentenciaSQL->bindParam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
                    $txtNombre=$libro['nombre'];
                    $txtImagen=$libro['imagen'];
    
                    break;
                

            case"Borrar":
                $sentenciaSQL=$conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                        if(isset($libro["imagen"]) && ($libro["imagen"]!="imagen.jpg") ){
                            
                            if(file_exists("../../img/img".$libro["imagen"])){
                               
                                unlink("../../img/img".$libro["imagen"]);
                           
                            }
                        }
                    
                $sentenciaSQL=$conexion->prepare("DELETE FROM libros WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                   
                header("location:productos.php");
            break;
}

$sentenciaSQL=$conexion->prepare("SELECT*FROM libros");
$sentenciaSQL->execute();
$listalibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="col-md-5">

<div class="card">
    <div class="card-header">
    Datos de Libro
    </div>

    <div class="card-body">

    <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
            <label>ID:</label>
            <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID">
            </div>

            <div class = "form-group">
            <label>Nombre:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Libro">
            </div>

            <div class = "form-group">
            <label>Imagen:</label>
            <br>
            <?php if($txtImagen!=""){?>
                <img class="img-thumbnail rounded" src="../../img/img<?php echo $txtImagen;?>" width="75" alt="" srcset="">
<?php } ?>

            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="ID">
            </div>

            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-info ">Agregar</button>
                <button type="submit" name="accion" <?php echo ($accion!=="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
                <button type="submit" name="accion" <?php echo ($accion!=="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-danger ">Cancelar</button>
            </div>
    </form>

    
</div>


    </div>

</div>


<div class="col-md-7">
    
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
<?php   foreach($listalibros as $libro){  ?>
        <tr>
            <td><?php echo $libro['id'] ;  ?></td>
            <td><?php echo $libro['nombre'] ;  ?></td>
            <td>
                <img class="img-thumbnail rounded" src="../../img/img<?php echo $libro['imagen'];?>" width="75" alt="" srcset="">
                </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id'];?>">
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-outline-primary">
                    <input type="submit" name="accion" value="Borrar" class="btn btn-outline-danger">


                </form>
            </td>
        </tr>
        <?php }    ?>
    </tbody>

</table>


</div>


<?php include("../template/pie.php");?> 
