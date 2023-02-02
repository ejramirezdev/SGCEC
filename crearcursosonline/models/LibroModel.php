<?php
require_once 'config/Conexion.php';
class LibroModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_libros($idCurso){     
        $sql="SELECT * FROM libro WHERE id_capacitacion_online=$idCurso ORDER BY id DESC";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function create_libro($libro){
        //prepare
        $sql = "INSERT INTO libro (id, nombre, pdf_url, id_capacitacion_online, routeIMG) VALUES 
        (NULL, :nombre, :pdf_url, :id_capacitacion_online, :routeIMG);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombre', $libro["nombre"] );
        $sentencia->bindParam(':pdf_url', $libro["pdf_url"] );
        $sentencia->bindParam(':id_capacitacion_online', $libro["idCurso"] );
        $sentencia->bindParam(':routeIMG', $libro["routeIMG"] );
        //execute
        $sentencia->execute();
       
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }
    

    public function get_ONE_libro($idLibro){

        
        $sql="SELECT * FROM libro WHERE libro.id=$idLibro";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $resultado;
    }

    public function update_libro($indice){
        
        $idLibro = $indice["idLibro"];
        $nombre = $indice["nombre"];
        $pdf_url = $indice["pdf_url"];
        $idCurso = $indice["idCurso"];
        $routeIMG = $indice["routeIMG"];
         


        $sql = "UPDATE `libro` SET `nombre`='$nombre',  `pdf_url`='$pdf_url', `routeIMG`='$routeIMG', `id_capacitacion_online`='$idCurso' WHERE libro.id='$idLibro'";
       
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