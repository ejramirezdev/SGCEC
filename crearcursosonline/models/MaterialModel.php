<?php
require_once 'config/Conexion.php';
class MaterialModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_materiales($idCurso){    
        
        $sql="SELECT * FROM mateiral_apoyo WHERE mateiral_apoyo.id_capcitacion_online=$idCurso";
        //SELECT * FROM `mateiral_apoyo` WHERE mateiral_apoyo.id_capcitacion_online=3
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function create_material($libro){
        //prepare          INSERT INTO `mateiral_apoyo`(`id`, `nombrePDF`, `TipoMaterial`, `id_capcitacion_online`) VALUES ([value-1],[value-2],[value-3],[value-4])
        $sql = "INSERT INTO mateiral_apoyo (id, nombrePDF, TipoMaterial, id_capcitacion_online) VALUES 
        (NULL, :nombrePDF, :TipoMaterial, :id_capcitacion_online);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombrePDF', $libro["nombrePDF"] );
        $sentencia->bindParam(':TipoMaterial', $libro["TipoMaterial"] );
        $sentencia->bindParam(':id_capcitacion_online', $libro["idCurso"] );
        //execute
        $sentencia->execute();
       
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
    
    public function get_ONE_material($idMaterial){

        
        $sql="SELECT * FROM mateiral_apoyo WHERE mateiral_apoyo.id=$idMaterial";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $resultado;
    }

    public function update_material($material){
        
        $nombrePDF = $material["nombrePDF"];
        $TipoMaterial = $material["TipoMaterial"];
        $idCurso = $material["idCurso"];
        $idMaterial = $material["idMaterial"];
       


        $sql = "UPDATE `mateiral_apoyo` SET `nombrePDF`='$nombrePDF', `TipoMaterial`='$TipoMaterial', `id_capcitacion_online`='$idCurso' WHERE mateiral_apoyo.id='$idMaterial'";
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