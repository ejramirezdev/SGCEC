<?php
require_once 'config/Conexion.php';
class RespuestaModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_respuestas($idPregunta){     
        $sql="SELECT * FROM respuesta WHERE id_pregunta=$idPregunta";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function create_respuesta($respuesta){
        //prepare
        $sql = "INSERT INTO respuesta (id, nombre, isTrue, id_pregunta) VALUES 
        (NULL, :nombre, :isTrue, :id_pregunta);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombre', $respuesta["nombre"] );
        $sentencia->bindParam(':isTrue', $respuesta["isTrue"] );
        $sentencia->bindParam(':id_pregunta', $respuesta["id_pregunta"] );
        //execute
        $sentencia->execute();        
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
      public function get_ONE_respuesta($idRespuesta){

        
        $sql="SELECT * FROM respuesta WHERE respuesta.id=$idRespuesta";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $resultado;
    }

    public function update_respuesta($indice){
        
        $nombre = $indice["nombre"];
        $isTrue = $indice["isTrue"];
        $id_pregunta = $indice["id_pregunta"];
        $idCurso = $indice["idCurso"];
        $idTaller = $indice["idTaller"];
        $idRespuesta = $indice["idRespuesta"];
        

        $sql = "UPDATE `respuesta` SET `nombre`='$nombre',  `isTrue`='$isTrue', `id_pregunta`='$id_pregunta' WHERE respuesta.id='$idRespuesta'";
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