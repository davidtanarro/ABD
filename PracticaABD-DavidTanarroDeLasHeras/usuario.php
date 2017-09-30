<?php

class Usuario
{  
      public $id;
      public $nick;
      public $password;
      public $nombre;
      public $apellidos;
      public $email;
      public $edad;

    
    function __construct($id, $nick, $password, $nombre, $apellidos, $email, $edad){
      $this->id=$id;
      $this->nick=$nick;
      $this->password=$password;
      $this->nombre=$nombre;
      $this->apellidos=$apellidos;
      $this->email=$email;
      $this->edad=$edad;
    }

    function insertar(){
  		include ('conexion.php');

  		$insertarUs = "INSERT INTO usuario VALUES ('id', '$this->nick', '$this->password', '$this->nombre', '$this->apellidos', '$this->email', '$this->edad')";
	      
	    mysqli_query($conexion, "SET NAMES 'utf8'");
	    $resultado = mysqli_query($conexion, $insertarUs);

      mysqli_close($conexion);

		  return $resultado;	    
    }

    function verificar(){
        include ('conexion.php');

        mysqli_query($conexion, "SET NAMES 'utf8'");
        $verificar = mysqli_query($conexion, "SELECT * FROM usuario WHERE nick = '$this->nick'" );

        if((mysqli_num_rows($verificar) > 0))
          return false;
        else
          return true;
    }

    public function esValido($id){
        include ('conexion.php');

        mysqli_query($conexion, "SET NAMES 'utf8'");
        $verificar = mysqli_query($conexion, "SELECT * FROM usuario WHERE id = '$id'" );

        if((mysqli_num_rows($verificar) == 0))
          return false;
        else
          return true;
    }


    function loguear(){
    		include('conexion.php');

    		$contador = 0;

    		$consulta=" SELECT * FROM usuario WHERE nick = '$this->nick'";
    		$resultado=mysqli_query($conexion, $consulta);

    		while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

    			$hash = $datos['password'];

    			if(password_verify($this->password, $hash)){
    				$contador++;
    			}
    		}

    		mysqli_free_result($resultado);

        mysqli_close($conexion);


    		return $contador;
    }

    public static function extraerId($nick) {
        include('conexion.php');

        $consulta = "SELECT id FROM usuario WHERE nick = '$nick' and nick <> 'admin'" ;
        mysqli_query($conexion,"SET NAMES 'utf8'");
        $resultado = $conexion->query($consulta)  or trigger_error("Query Failed! SQL: $consulta - Error: ".mysqli_error($conexion), E_USER_ERROR);

        $arrayId = $resultado->fetch_array(MYSQLI_BOTH);
        $id = $arrayId['id'];

        mysqli_free_result($resultado);

        mysqli_close($conexion);

        return $id;
  }

    public static function extraerNick($id) {
        include('conexion.php');

        $consulta = "SELECT nick FROM usuario WHERE id = '$id' and nick <> 'admin'";
        mysqli_query($conexion,"SET NAMES 'utf8'");
        $resultado = $conexion->query($consulta)  or trigger_error("Query Failed! SQL: $consulta - Error: ".mysqli_error($conexion), E_USER_ERROR);

        $arrayNick = $resultado->fetch_array(MYSQLI_BOTH);
        $nick = $arrayNick['nick'];

        mysqli_free_result($resultado);

        mysqli_close($conexion);

        return $nick;
  }


    public static function extraerEdad($id) {
        include('conexion.php');

        $consulta = "SELECT edad FROM usuario WHERE id = '$id' and nick <> 'admin'";
        mysqli_query($conexion,"SET NAMES 'utf8'");
        $resultado = $conexion->query($consulta)  or trigger_error("Query Failed! SQL: $consulta - Error: ".mysqli_error($conexion), E_USER_ERROR);

        $arrayNick = $resultado->fetch_array(MYSQLI_BOTH);
        $edad = $arrayNick['edad'];

        mysqli_free_result($resultado);

        mysqli_close($conexion);

        return $edad;
  }


    public static function extraerUsuarios($idUsuario) {
          include ('conexion.php');

          $sql = "SELECT id, nick FROM usuario
                  WHERE id <> '$idUsuario' and nick <> 'admin'
                  ORDER BY nick" ;
          mysqli_query($conexion,"SET NAMES 'utf8'");
          $resultado = $conexion->query($sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conexion), E_USER_ERROR);

          $listaUsuarios = array();
          $verificar = mysqli_query($conexion, $sql);
          for ($i=0; $i < mysqli_num_rows($verificar); $i++) { 
              $listaUsuarios[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }
          mysqli_free_result($resultado);

          mysqli_close($conexion);
          
          return $listaUsuarios;
    }

}
?>