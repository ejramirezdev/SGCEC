<?php
require_once 'config/Conexion.php';
class PreguntaModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_preguntas($idTaller){     
        $sql="SELECT * FROM pregunta WHERE id_test=$idTaller";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }

    public function create_pregunta($pregunta){
        //prepare
        $sql = "INSERT INTO pregunta (id, titulo, nombre, id_test) VALUES 
        (NULL, :titulo, :nombre, :id_test);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':titulo', $pregunta["titulo"] );
        $sentencia->bindParam(':nombre', $pregunta["nombre"] );
        $sentencia->bindParam(':id_test', $pregunta["id_test"] );
        //execute
        $sentencia->execute();
       
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
    
      public function get_ONE_pregunta($idPregunta){

        
        $sql="SELECT * FROM pregunta WHERE pregunta.id=$idPregunta";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $resultado;
    }

    public function update_pregunta($pregunta){
        
        $titulo = $pregunta["titulo"];
        $nombre = $pregunta["nombre"];
        $id_test = $pregunta["id_test"];
        $idPregunta = $pregunta["idPregunta"];
        
        $sql = "UPDATE `pregunta` SET `titulo`='$titulo',  `nombre`='$nombre', `id_test`='$id_test' WHERE pregunta.id='$idPregunta'";
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