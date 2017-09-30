<?php

class Participante
{  
      public $idGrupo;
      public $idParticipante;

    
    function __construct($idGrupo, $idParticipante){
      $this->idGrupo=$idGrupo;
      $this->idParticipante=$idParticipante;
    }

    public static function extraerGruposPerteneciente($idUsuario) {
          include ('conexion.php');

          $sql = "SELECT * FROM participante p, grupo g WHERE p.idGrupo = g.idGrupo and p.idParticipante = '$idUsuario' ";

          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaGruposPerteneciente = array();
          $verificar = mysqli_query($conexion, $sql);

          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaGruposPerteneciente[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);

          mysqli_close($conexion);
          
          return $listaGruposPerteneciente;
    }


    public static function extraerGruposDisponibles($idUsuario) {
          include ('conexion.php');

          require_once 'usuario.php';
          $edad = Usuario::extraerEdad($idUsuario);

          $sql = "SELECT *
                  FROM grupo g1
                  WHERE g1.edad <= '$edad'
                        and g1.idGrupo NOT IN ( SELECT p2.idGrupo
                                                FROM participante p2, grupo g2
                                                WHERE p2.idGrupo = g2.idGrupo and p2.idParticipante = '$idUsuario') ";

          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaGruposDisponibles = array();
          $verificar = mysqli_query($conexion, $sql);

          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaGruposDisponibles[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);

          mysqli_close($conexion);
          
          return $listaGruposDisponibles;
    }


    public static function insertarParticipante($idGrupo, $idParticipante){
          include ('conexion.php');

          $insertarPar = "INSERT INTO participante VALUES ('$idGrupo', '$idParticipante')";
            
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $insertarPar);

          mysqli_close($conexion);

          return $resultado;      
    }

    public static function borrarParticipante($idGrupo, $idParticipante) {
          include('conexion.php');

          $sql = "DELETE FROM participante WHERE idGrupo='$idGrupo' and idParticipante='$idParticipante'";
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

    public static function esParticipante($idGrupo, $idParticipante) {
          include('conexion.php');

          $sql = "SELECT * FROM participante WHERE idGrupo='$idGrupo' and idParticipante='$idParticipante'";
          mysqli_query($conexion, "SET NAMES 'utf8'");
          $resultado = mysqli_query($conexion, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          if ( mysqli_num_rows($resultado) > 0 ) {
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