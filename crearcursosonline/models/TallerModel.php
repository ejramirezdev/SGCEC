<?php
require_once 'config/Conexion.php';
class TallerModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_talleres($idCurso){     
        $sql="SELECT * FROM test WHERE id_capcitacion_online=$idCurso";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function create_taller($taller){
        //prepare
        $sql = "INSERT INTO test (id, nombre, id_capcitacion_online) VALUES 
        (NULL, :nombre, :id_capcitacion_online);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombre', $taller["nombre"] );
        $sentencia->bindParam(':id_capcitacion_online', $taller["idCurso"] );
        //execute
        $sentencia->execute();        
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
    


}