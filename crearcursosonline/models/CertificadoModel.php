<?php

require_once 'config/Conexion.php';

class CertificadoModel {
   private $db;

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function consultar_certificado($idUsuario,$idCurso){
 
        //SELECT * FROM certificado WHERE certificado.id_usuario = 65 AND certificado.id_curso=4 ORDER by id DESC LIMIT 1
    $sql= " SELECT * FROM certificado WHERE certificado.id_usuario ='$idUsuario' AND certificado.id_curso ='$idCurso' ORDER by id DESC LIMIT 1 ";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    // var_dump($resultado);
    return $resultado;
        
    }


   public function consultar_usuario($nombreUsuario,$idCurso){
  

            //SELECT * FROM `usuario` WHERE usuario.id_curso_online = 4 AND usuario.usuario = 'erick'
        $sql= " SELECT * FROM usuario WHERE usuario.id_curso_online = '$idCurso' AND usuario.id='$nombreUsuario' ";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        return $resultado;
        
  }

 public function consultar_certificadoExist($nombreUsuario,$idCurso){
  

        //SELECT * FROM `usuario` WHERE usuario.id_curso_online = 4 AND usuario.usuario = 'erick'
    $sql= " SELECT * FROM certificado WHERE certificado.id_curso = '$idCurso' AND certificado.id_usuario='$nombreUsuario' ";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultado;

  }

  public function consultar_curso($idCurso){
  
        
    //SELECT `nombre` FROM `capacitacion_online` WHERE 1
    $sql= "SELECT nombre FROM capacitacion_online WHERE capacitacion_online.id='$idCurso' ";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultado;
   
  }





}