<?php

class Grupo
{  
      public $id;
      public $nombre;
      public $genero;
      public $edad;

    
    function __construct($id, $nombre, $genero, $edad){
      $this->id=$id;
      $this->nombre=$nombre;
      $this->genero=$genero;
      $this->edad=$edad;
    }

    function crear(){
  		include ('conexion.php');

  		$insertar = "INSERT INTO grupo VALUES ('id', '$this->nombre', '$this->genero', '$this->edad')";
	      
	    mysqli_query($conexion, "SET NAMES 'utf8'");
	    $resultado = mysqli_query($conexion, $insertar);

      mysqli_close($conexion);

		  return $resultado;	    
    }
}
?>