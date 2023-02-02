<?php
require_once 'config/Conexion.php';
class UsuariosadminModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function create_usuario($taller){
        
        //prepare
        $sql = "INSERT INTO usuario_interno (id, nombre, correo, cedula, usuario, password, estado, idPrivilegio) VALUES 
        (NULL, :nombre, :correo, :cedula, :usuario, :password, :estado, :idPrivilegio);";
        //now()
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        $sentencia->bindParam(':nombre', $taller["nombre"] );
        $sentencia->bindParam(':correo', $taller["correo"] );
        $sentencia->bindParam(':cedula', $taller["cedula"] );
        $sentencia->bindParam(':usuario', $taller["usuario"] );
        $sentencia->bindParam(':password', $taller["password"] );
        $sentencia->bindParam(':estado', $taller["estado"] );
        $sentencia->bindParam(':idPrivilegio', $taller["idPrivilegio"] );         
        //execute
        $sentencia->execute();        
        //retornar resultados
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            return false;
        }
        return true;
    }



}