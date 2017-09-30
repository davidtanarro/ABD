 
  <?php

  
  class MensajePrivado
  {
      public $codigo;
      public $emisor;
      public $receptor;
      public $asunto;
      public $mensaje;
      public $fecha;

    function __construct($codigo, $emisor, $receptor, $asunto, $mensaje, $fecha){
          $this->codigo=$codigo;
          $this->emisor=$emisor;
          $this->receptor=$receptor;
          $this->asunto=$asunto;
          $this->mensaje=$mensaje;
          $this->fecha=$fecha;
    }

    function enviar(){
          include ('conexion.php');

          $insertar = "INSERT INTO bandeja VALUES ('id', '$this->emisor', '$this->receptor', '$this->asunto', '$this->mensaje', '$this->fecha')";
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $insertar) or trigger_error("Query Failed! SQL: $insertar - Error: ".mysqli_error($conexion), E_USER_ERROR);
          
          mysqli_close($conexion);

          return $resultado;
    }


    public static function extraerMensajesRecibidos($idUsuario) {
          include ('conexion.php');

          $sql = "SELECT * FROM bandeja
                  WHERE receptor = '$idUsuario'
                  ORDER BY fecha DESC" ;
          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaMensajes = array();
          $verificar = mysqli_query($conexion, $sql);
          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaMensajes[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);
          
          mysqli_close($conexion);

          return $listaMensajes;
    }


    public static function extraerMensajesEnviados($idUsuario) {
          include ('conexion.php');

          $sql = "SELECT * FROM bandeja
                  WHERE emisor = '$idUsuario'
                  ORDER BY fecha DESC" ;
          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaMensajes = array();
          $verificar = mysqli_query($conexion, $sql);
          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaMensajes[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);
          
          mysqli_close($conexion);
          
          return $listaMensajes;
    }

    public static function borrarMensaje($codigo) {
          include('conexion.php');

          $sql = "DELETE FROM bandeja WHERE codigo='$codigo'";
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);


          if ($resultado) {
              mysqli_free_result($resultado);
              mysqli_close($conexion);
              return true;
          }
          else {
              mysqli_free_result($resultado);
              mysqli_close($conexion);
              return false;
          }
    }
}
?> 