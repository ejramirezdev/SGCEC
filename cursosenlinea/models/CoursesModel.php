<?php

require_once 'config/Conexion.php';

class CoursesModel {
   private $db;
   
   

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function consultar_curso($id_curso){

    $sql="SELECT * FROM capacitacion_online WHERE id=$id_curso ";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultados;
   }

   
    

    
    
    
    public function consultar_libros($id_curso){

        $sql="SELECT libro.id, libro.nombre AS nombre_libro, indice.num_seccion, indice.nombre AS nombre_indice, routeIMG FROM libro INNER JOIN indice ON libro.id = indice.id_libro WHERE libro.id_capacitacion_online = $id_curso";
        // SELECT libro.id, libro.nombre, indice.num_seccion, indice.nombre FROM libro INNER JOIN indice ON libro.id = indice.id_libro WHERE libro.id_capacitacion_online = 1

        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultados = $sentencia->fetchall(PDO::FETCH_OBJ);
        return $resultados;
        
    }
    
    public function actualizar($id, $cod, $nom, $desc, $estado, $precio, $idCat, $usu){
   
    }
    
}
