<?php include("template/cabezera.php");?>
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
            <label>Autor:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="autor" id="autor" placeholder="Autor">
            </div>
            <div class = "form-group">
            <label>Nombre:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Libro">
            </div>
            <div class = "form-group">
            <label>Link:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre;?>" name="link" id="link" placeholder="link">
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
    
<table class="table table-bordered" id="tabla">
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
<script>

    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla);
</script>


<?php include("template/pie.php");?> 