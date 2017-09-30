 
  <?php

  
  class MensajeGrupo
  {
      public $id;
      public $usuario;
      public $titulo;
      public $cuerpo;
      public $fecha;
      public $idGrupo;

    function __construct($id, $usuario, $titulo, $cuerpo, $fecha, $idGrupo){
          $this->id=$id;
          $this->usuario=$usuario;
          $this->titulo=$titulo;
          $this->cuerpo=$cuerpo;
          $this->fecha=$fecha;
          $this->idGrupo=$idGrupo;
    }

    function enviar(){
          include ('conexion.php');

          $insertar = "INSERT INTO forogrupo VALUES ('id', '$this->usuario', '$this->titulo', '$this->cuerpo', '$this->fecha', '$this->idGrupo')";
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $insertar) or trigger_error("Query Failed! SQL: $insertar - Error: ".mysqli_error($conexion), E_USER_ERROR);

          mysqli_close($conexion);
          
          return $resultado;
    }


    public static function extraerMensajes($idGrupo) {
          include ('conexion.php');

          $sql = "SELECT *
                  FROM forogrupo
                  WHERE idGrupo = '$idGrupo'
                  ORDER BY fecha DESC" ;
          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaMensajesForoGrupo = array();
          $verificar = mysqli_query($conexion, $sql);
          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaMensajesForoGrupo[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);
          
          mysqli_close($conexion);
          
          return $listaMensajesForoGrupo;
    }

}
?> 