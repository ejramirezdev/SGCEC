<?php

require_once 'config/Conexion.php';

class AuthModel {
   private $db;
   
   

   public  function __construct() {
       $this->db = Conexion::getConexion();
   }
   
   public function registrar($persona){

            
        $estado=1; 
            
        $sql = " INSERT INTO usuario (id, cedula, nombre1, nombre2, apellido1, apellido2, telefono, empresa, correo, ciudad, usuario, password, estado_pre, fechaIni, fechaVenc, id_curso_online) 
        VALUES (NULL, :cedula, :nombre1, :nombre2, :apellido1, :apellido2, :telefono, :empresa, :correo, :ciudad, :usuario, :contrasena, :estado, :fechai, :nuevafecha, :idCurso)";
 
        $nombre1Mayuscula= ucfirst($persona['nombre1']);
        $nombre2Mayuscula= ucfirst($persona['nombre2']);
        $apellido1Mayuscula= ucfirst($persona['apellido1']);
        $apellido2Mayuscula= ucfirst($persona['apellido2']);

        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':cedula', $persona['cedula'] );
        $sentencia->bindParam(':nombre1', $nombre1Mayuscula);
        $sentencia->bindParam(':nombre2', $nombre2Mayuscula );
        $sentencia->bindParam(':apellido1', $apellido1Mayuscula );
        $sentencia->bindParam(':apellido2', $apellido2Mayuscula );
        $sentencia->bindParam(':telefono', $persona['telefono']);
        $sentencia->bindParam(':empresa', $persona['empresa']);
        $sentencia->bindParam(':correo', $persona['correo']);
        $sentencia->bindParam(':ciudad', $persona['ciudad']);
        $sentencia->bindParam(':usuario', $persona['usuario']);
        $sentencia->bindParam(':contrasena', $persona['contrasena']);
        $sentencia->bindParam(':estado', $estado);
        $sentencia->bindParam(':fechai', $persona['fechai']);
        $sentencia->bindParam(':nuevafecha', $persona['nuevafecha']);
        $sentencia->bindParam(':idCurso', $persona['id_curso']);



       $sentencia->execute();
   

        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
 
   }
   public function login($persona){

           $sql="SELECT  id, cedula, usuario, password, pagoid, id_curso_online FROM usuario WHERE usuario.usuario='".$persona['usuario']."' AND usuario.id_curso_online='".$persona['id_curso']."'";
      
        
       
    //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
        return $resultados;

    }
        
     public function consultar_curso($id_curso){

        $sql="SELECT id, nombre, costo FROM capacitacion_online WHERE id=$id_curso ";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
        return $resultados;
    }

    
    public function actualizarPago($userID,$pagoID){
 
        $sql = "UPDATE `usuario` SET `pagoid`='$pagoID' WHERE usuario.id='$userID'";
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