<?php include("../template/cabezera.php");?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
$usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$password=(isset($_POST['password']))?$_POST['password']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/ladb.php");

switch($accion){
            case"Agregar":
                $sentenciaSQL=$conexion->prepare("INSERT INTO usuario(nombre,apellido,usuario, password) VALUES (:nombre,:apellido,:usuario, :password)");
                $sentenciaSQL->bindParam(':nombre',$txtNombre);
                $sentenciaSQL->bindParam(':apellido',$apellido);
                $sentenciaSQL->bindParam(':usuario',$usuario);
                $sentenciaSQL->bindParam(':password',$password);

                $sentenciaSQL->execute();
                header("location:usuarios.php");
                break;

            case"Modificar":
                $sentenciaSQL=$conexion->prepare("UPDATE usuario set nombre=:nombre,autor=:autor,link=:link WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->bindParam(':nombre',$nombre);
                $sentenciaSQL->bindParam(':apellido',$apellido);
                $sentenciaSQL->bindParam(':usuario',$usuario);
                $sentenciaSQL->bindParam(':password',$password);
                $sentenciaSQL->execute();
                
            
            header("location:usuarios.php");
                break;

            case"Cancelar":
                 header("location:usuarios.php");
                break;

            case"Seleccionar":
                $sentenciaSQL=$conexion->prepare("SELECT*FROM usuario WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $nombre=$libro['nombre'];
                $apellido=$libro['apellido'];
                $usuario=$libro['usuario'];
                $password=$libro['password'];
                

                break;

            case"Borrar":
                    
                $sentenciaSQL=$conexion->prepare("DELETE FROM usuario WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                   
                header("location:usuarios.php");
            break;
}

$sentenciaSQL=$conexion->prepare("SELECT*FROM usuario");
$sentenciaSQL->execute();
$listalibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos de los Usuarios
    </div>

    <div class="card-body">

    <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
            <label>ID:</label>
            <input type="text" required readonly class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID">
            </div>

            <div class = "form-group">
            <label>Nombres:</label>
            <input type="text" required class="form-control" value="<?php echo $nombre;?>" name="nombre" id="nombre" placeholder="Nombres">
            </div>
            <div class = "form-group">
            <label>Apellidos:</label>
            <input type="text" required class="form-control" value="<?php echo $apellido;?>" name="apellido" id="apellido" placeholder="Apellidos">
            </div>
            <div class = "form-group">
            <label>Usuario:</label>
            <input type="text" required class="form-control" value="<?php echo $usuario;?>" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class = "form-group">
            <label>Contraseña:</label>
            <input type="text" required class="form-control" value="<?php echo $password;?>" name="password" id="password" placeholder="Contraseña">
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
    
<table class="table table-bordered" id="tabla">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Acciones</th>
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
<script>

    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla);
</script>


<?php include("../template/pie.php");?> 