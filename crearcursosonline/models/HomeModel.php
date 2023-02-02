<?php
require_once 'config/Conexion.php';
class HomeModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function get_cursos(){     
        $sql="SELECT * FROM capacitacion_online ORDER BY id DESC";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    public function get_usuarios(){     
        $sql="SELECT id, cedula, nombre1, apellido1, telefono, empresa, correo, pagoid, id_curso_online FROM usuario ORDER BY id DESC";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    
    public function get_usuariosAdmin(){     
        $sql="SELECT id, nombre, correo, cedula, usuario, estado, idPrivilegio FROM usuario_interno ORDER BY id DESC";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados 
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resultado;
    }
    
       
    
}