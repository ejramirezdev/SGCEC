<?php

require_once 'config/Conexion.php';

class HomeModel {
   private $db;
   
   

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function consultar(){

    $sql="SELECT id, nombre, descripcion, estado, img FROM capacitacion_online";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
   }

   

}