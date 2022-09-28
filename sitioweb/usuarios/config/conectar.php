<?php 
class Conectar
{
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="biblioteca";
    public $conectar;



    public function __construct()
    {
        $this->conectar = new mysqli($this->host, $this->usuario, $this->clave, $this->db)
        or die(mysql_error());
        $this->conectar->set_charset("utf8");
    }
    public function connect()
    {
        $conn = new mysqli($this->host, $this->usuario, $this->clave, $this->db);
        return $conn;
    }

    //INSERTAR
    public function insertar($tabla,$datos)
    {
        $resultado =    $this->conectar->query("INSERT INTO $tabla VALUES (null,$datos)") or die($this->conectar->error);
        if ($resultado) {
            return true;
        }
        return false;
    }

    //BORRAR
    public function borrar($tabla, $condicion)
    {
        $resultado  =   $this->conectar->query("DELETE FROM $tabla WHERE $condicion") or die($this->conectar->error);
        if ($resultado) {
            return true;
        }
        return false;
    }

    //ACTUALIZAR
    public function actualizar($tabla, $campos, $condicion)
    {
        $resultado  =   $this->conectar->query("UPDATE $tabla SET $campos WHERE $condicion") or die($this->conectar->error);
        if ($resultado) {
            return true;
        }
        return false;
    }

    //BUSCAR
    public function buscar($tabla, $condicion)
    {
        $resultado = $this->conectar->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conectar->error);
        if ($resultado) {
            return  $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    /*  public function loginAdmin($usuario,$password)
      {

          try {

              $sql = "SELECT * from administrador WHERE nombre = $usuario AND password = $password";
              $query = $this->dbh->prepare($sql);
              $query->bindParam(1,$usuario);
              $query->bindParam(2,$password);
              $query->execute();
              $this->dbh = null;

              //si existe el usuario
              if($query->rowCount() == 1)
              {

                   $fila  = $query->fetch();
                   $_SESSION['nombre'] = $fila['nombre'];
                   return TRUE;

              }

          }catch(PDOException $e){

              print "Error!: " . $e->getMessage();

          }

      }


      // Evita que el objeto se pueda clonar
      public function __clone()
      {

          trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);

      }

}*/
}


?>



