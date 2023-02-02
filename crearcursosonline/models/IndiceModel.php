<?php
require_once 'config/Conexion.php';
class IndiceModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_indices($id_libro){     
        $sql="SELECT * FROM indice WHERE id_libro=$id_libro";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function create_indice($indice){
        //prepare
        $sql = "INSERT INTO indice (id, num_seccion, nombre, id_libro) VALUES 
        (NULL, :num_seccion, :nombre, :id_libro);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':num_seccion', $indice["num_seccion"] );
        $sentencia->bindParam(':nombre', $indice["nombre"] );
        $sentencia->bindParam(':id_libro', $indice["id_libro"] );
        //execute
        $sentencia->execute();
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
    


    public function get_ONE_indice($idIndice){

        
        $sql="SELECT * FROM indice WHERE indice.id=$idIndice";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    

    public function update_indice($indice){
        
        
        $num_seccion = $indice["num_seccion"];
        $nombre = $indice["nombre"];
        $id_libro = $indice["id_libro"];
        $id_Indice = $indice["id_Indice"];
         


        $sql = "UPDATE `indice` SET `num_seccion`='$num_seccion',  `nombre`='$nombre', `id_libro`='$id_libro' WHERE indice.id='$id_Indice'";
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