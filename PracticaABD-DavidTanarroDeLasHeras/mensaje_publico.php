 
  <?php

  
  class MensajePublico
  {
      public $id;
      public $usuario;
      public $titulo;
      public $cuerpo;
      public $fecha;

    function __construct($id, $usuario, $titulo, $cuerpo, $fecha){
          $this->id=$id;
          $this->usuario=$usuario;
          $this->titulo=$titulo;
          $this->cuerpo=$cuerpo;
          $this->fecha=$fecha;
    }

    function enviar(){
          include ('conexion.php');

          $insertar = "INSERT INTO foro VALUES ('id', '$this->usuario', '$this->titulo', '$this->cuerpo', '$this->fecha')";
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $insertar) or trigger_error("Query Failed! SQL: $insertar - Error: ".mysqli_error($conexion), E_USER_ERROR);

          mysqli_close($conexion);
          
          return $resultado;
    }


    public static function extraerMensajes() {
          include ('conexion.php');

          $sql = "SELECT * FROM foro
                  ORDER BY fecha DESC" ;
          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaMensajesForo = array();
          $verificar = mysqli_query($conexion, $sql);
          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaMensajesForo[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);
          
          mysqli_close($conexion);
          
          return $listaMensajesForo;
    }

}
?> 