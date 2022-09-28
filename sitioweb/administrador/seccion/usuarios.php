<?php include("../template/cabezera.php");?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/ladb.php");

switch($accion){
            case"Agregar":
                $sentenciaSQL=$conexion->prepare("INSERT INTO usuario( nombre, apellido, usuario, password) VALUES (:nombre, :apellido, :usuario, :password)");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':apellido',$apellido);
                $sentenciaSQL->bindParam(':usuario',$usuario);
                $sentenciaSQL->bindParam(':password',$password);
                $sentenciaSQL->bindParam(':correo',$correo);

               
                $sentenciaSQL->execute();
                header("location:productos.php");
                break;

            case"Modificar":
                $sentenciaSQL=$conexion->prepare("UPDATE usuario set nombre=:nombre WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->execute();
                
            
            
            header("location:productos.php");
                break;

            case"Cancelar":
                 header("location:productos.php");
                break;

                case"Seleccionar":
                    $sentenciaSQL=$conexion->prepare("SELECT*FROM usuairo WHERE id=:id");
                    $sentenciaSQL->bindParam(':id',$txtID);
                    $sentenciaSQL->execute();
                    $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
                    $txtNombre=$libro['nombre'];
                    $apellido=$libro['apellido'];
                    $usuario=$libro['usuario'];
                    $password=$libro['password'];
                    $correo=$libro['correo'];
    
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

$sentenciaSQL=$conexion->prepare("SELECT*FROM usuario");
$sentenciaSQL->execute();
$listalibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="col-md-5">

<div class="card">
    <div class="card-header">
    Datos de Usuarios
    </div>

    <div class="card-body">

    <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
            <label>ID:</label>
            <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID">
            </div>

            <div class = "form-group">
            <label>apellido:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Libro">
            </div>
            
            <div class = "form-group">
            <label>usuario:</label>
            <input type="text" required class="form-control" value="<?php echo $usuario;?>" name="usuario" id="usuario" placeholder="Nombre del Libro">
            </div>
            
            <div class = "form-group">
            <label>password:</label>
            <input type="text" required class="form-control" value="<?php echo $password;?>" name="password" id="password" placeholder="Nombre del Libro">
            </div>
            
            <div class = "form-group">
            <label>correo:</label>
            <input type="text" required class="form-control" value="<?php echo $correo;?>" name="correo" id="correo" placeholder="Nombre del Libro">
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
            <th>Apellido</th>
            <th>Usuario </th>
            <th>Password </th>
            <th>Correo </th>
        </tr>
    </thead>

    <tbody>
<?php   foreach($listalibros as $libro){  ?>
        <tr>
            <td><?php echo $libro['id'] ;  ?></td>
            <td><?php echo $libro['nombre'] ;  ?></td>
            <td><?php echo $libro['apellido'] ;  ?></td>
            <td><?php echo $libro['usuario'] ;  ?></td>
            <td><?php echo $libro['password'] ;  ?></td>
            <td><?php echo $libro['correo'] ;  ?></td>

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
