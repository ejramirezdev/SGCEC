<?php

require_once 'config/Conexion.php';

class RestabPassModel {
   private $db;
   
   

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function consultarPersona($persona){
    $idCurso = $persona['id_curso'];

    $nombre1Mayuscula= ucfirst($persona['nombre1']);
    $nombre2Mayuscula= ucfirst($persona['nombre2']);
    $apellido1Mayuscula= ucfirst($persona['apellido1']);
    $apellido2Mayuscula= ucfirst($persona['apellido2']);

        //SELECT * FROM `usuario` WHERE usuario.cedula="08987987" AND usuario.nombre1="erick" AND usuario.nombre2="joel" AND usuario.apellido1 = "limon" AND usuario.apellido2="mejillones" AND usuario.usuario = "erick" AND usuario.id_curso_online = 6
        $sql="SELECT * FROM `usuario` WHERE usuario.cedula='".$persona['cedula']."' AND usuario.nombre1='".$nombre1Mayuscula."' AND usuario.nombre2='joel' AND usuario.apellido1 = 'limon' AND usuario.apellido2='mejillones' AND usuario.usuario = 'erick' AND usuario.id_curso_online = ". $idCurso."";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
      
        if(!$resultados){
            // print_r("No existe ese usuario");
            return false;
        }
        $idReturn = $resultados->id;
     
        return $idReturn;
     
   }

   public function restablecer($idUsuario,$newPass){

       //prepare
  //UPDATE `usuario` SET `password`="12345" WHERE usuario.id=70
        $sql = "UPDATE `usuario` SET `password`='$newPass' WHERE usuario.id='$idUsuario'";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
     
        
        //execute
        $sentencia->execute();
        
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            
            return false;
        }
       
        return true;
    
   }

   

}