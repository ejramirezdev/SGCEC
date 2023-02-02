<?php

require_once 'config/Conexion.php';

class CapitulosModel {
   private $db;
   
   

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function consultar_curso($idCurso){

    

    // SELECT * FROM `libro` WHERE libro.id_capacitacion_online=4
    $sql=" SELECT * FROM libro WHERE libro.id_capacitacion_online='$idCurso'";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
   }

   public function consultar_nombreCurso($idCurso){

    

    // SELECT  `nombre`, `descripcion` FROM `capacitacion_online` WHERE id=9
    $sql="SELECT  nombre, descripcion FROM capacitacion_online WHERE id=$idCurso";
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

    $sql="SELECT libro.id, libro.nombre AS nombre_libro, indice.num_seccion, indice.nombre AS nombre_indice, indice.id AS id_indice, routeIMG FROM libro INNER JOIN indice ON libro.id = indice.id_libro WHERE libro.id_capacitacion_online = $id_curso";
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




  


  public function consultar_material_apoyo($idCurso){


    $sql="SELECT * FROM mateiral_apoyo WHERE mateiral_apoyo.id_capcitacion_online = $idCurso";
    // SELECT * FROM `mateiral_apoyo` WHERE mateiral_apoyo.id_capcitacion_online=3

    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $resultados;
    
  }



  public function consultar_material($id_indice){


    $sql="SELECT * FROM material WHERE material.id_indice = $id_indice";
    // SELECT * FROM `material` WHERE material.id_indice = 2

    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultados;
    
  }

  public function consultar_ONE_libro($id_libro){


    $sql="SELECT  pdf_url FROM libro WHERE id= $id_libro";
    // SELECT * FROM `material` WHERE material.id_indice = 2

    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultados;
    
  }
    
    
    public function consultar_talleres($idCurso){
// var_dump($idCurso);

      // SELECT * FROM `test` WHERE test.id_capcitacion_online=4
    $sql=" SELECT * FROM test WHERE test.id_capcitacion_online='$idCurso'";
    //preparar la sentencia
    $sentencia = $this->db->prepare($sql);
    //bind parameters
    //execute
    $sentencia->execute();
    //retornar los resultados
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    return $resultado;
        
    }



    public function consultar_preguntas($idTest){
        // var_dump($idCurso);
        
              // SELECT * FROM `pregunta` WHERE pregunta.id_test=1
            $sql= " SELECT * FROM pregunta WHERE pregunta.id_test='$idTest'";
            //preparar la sentencia
            $sentencia = $this->db->prepare($sql);
            //bind parameters
            //execute
            $sentencia->execute();
            //retornar los resultados
            $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $resultados;
                
    }

    public function consultar_respuestas($idPregunta){
        // var_dump($idCurso);
        
              // SELECT * FROM `respuesta` WHERE respuesta.id_pregunta = 22
            $sql= " SELECT * FROM respuesta WHERE respuesta.id_pregunta='$idPregunta'";
            //preparar la sentencia
            $sentencia = $this->db->prepare($sql);
            //bind parameters
            //execute
            $sentencia->execute();
            //retornar los resultados
            $resultados = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $resultados;
                
    }


    public function consultar_notas($idRespuesta){
      // var_dump($idRespuesta);
      
            // SELECT   `isTrue` FROM `respuesta` WHERE respuesta.id = 4
          $sql= " SELECT isTrue FROM respuesta WHERE respuesta.id = '$idRespuesta'";
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
        $sql= " SELECT id FROM usuario WHERE usuario.id_curso_online = '$idCurso' AND usuario.usuario='$nombreUsuario' ";
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


  public function crear_certificado($idPersona, $idCurso,$promedio){
    
          $fechaActual = date('d-m-Y');
                      
          //INSERT INTO certificado(id, id_curso, id_usuario, fecha) VALUES ([value-1],[value-2],[value-3],[value-4])
          $sql = " INSERT INTO certificado (id, id_curso, id_usuario, fecha, calificacion) 
          VALUES (NULL, :id_curso, :id_usuario, :fecha, :calificacion)";
          // $sql = " INSERT INTO usuario (id, cedula, nombre1, nombre2, apellido1, apellido2, telefono, empresa, correo, ciudad, usuario, password, estado_pre, fechaIni, fechaVenc, id_curso_online) 
          // VALUES (NULL, :cedula, :nombre1, :nombre2, :apellido1, :apellido2, :telefono, :empresa, :correo, :ciudad, :usuario, :contrasena, :estado, :fechai, :nuevafecha, :idCurso)";


          $sentencia = $this->db->prepare($sql);
          //bind parameters
          $sentencia->bindParam(':id_curso', $idCurso);
          $sentencia->bindParam(':id_usuario', $idPersona);
          $sentencia->bindParam(':fecha', $fechaActual);
          $sentencia->bindParam(':calificacion', $promedio);
 
          $sentencia->execute();


          //retornar resultados
          if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
              return false;
          }
          return true;

  }




    
}