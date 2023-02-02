<?php
require_once 'config/Conexion.php';
class CursoModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function create_curso($curso){
        //prepare
        $sql = "INSERT INTO capacitacion_online (id, nombre, descripcion, objetivos, costo, img, estado) VALUES 
        (NULL, :nombre, :descripcion, :objetivos, :costo, :img, :estado);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombre', $curso["nombre"] );
        $sentencia->bindParam(':descripcion', $curso["descripcion"] );
        $sentencia->bindParam(':objetivos', $curso["objetivos"] );
        $sentencia->bindParam(':costo', $curso["costo"] );
        $sentencia->bindParam(':img', $curso["img"] );
        $sentencia->bindParam(':estado', $curso["estado"] );
        //execute
        $sentencia->execute();
       
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
       
        $sql="SELECT (MAX(id)) AS id FROM capacitacion_online";
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