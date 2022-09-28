$sentenciaSQL="SELECT*FROM libros";
$sentenciaSQL=mysqli_query($conectar,$consulta);
$listalibros = $sentenciaSQL;