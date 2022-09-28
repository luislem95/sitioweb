
<?php include("template/cabezera.php");?>
        <div class="col-md-12"> 
            <div class="jumbotron">
                <h1 class="display-3">Bienvenido <?php echo $_SESSION['usuario'];?></h1>
              
                <hr class="my-2">
                <p>ADMINISTRACIÓN DE INFORMACIÓN </p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar Libros</a>
                    <a class="btn btn-primary btn-lg" href="seccion/prestamos.php" role="button">Administrar Prestamos</a>
                    <a class="btn btn-primary btn-lg" href="seccion/bibliotecarios.php" role="button">Administrar Bibliotecarios</a>
                    <a class="btn btn-primary btn-lg" href="seccion/usuarios.php" role="button">Administrar Usuarios</a>
                </p>
         </div>
        </div>

<?php include("template/pie.php");?>   