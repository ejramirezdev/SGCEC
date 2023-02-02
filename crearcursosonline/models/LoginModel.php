<?php
require_once 'config/Conexion.php';
class LoginModel {
    private $db;
   
    public  function __construct() {
       $this->db = Conexion::getConexion();
    }

    public function login_user_get_data(){     
       

        $sql="SELECT nombre, password, estado, idPrivilegio FROM usuario_interno WHERE usuario_interno.usuario='erick'";
        //preparar la sentencia
        $sentencia = $this->db->prepare($sql);
        //bind parameters
        //execute
        $sentencia->execute();
        //retornar los resultados
        $resultados = $sentencia->fetch(PDO::FETCH_OBJ);
        return $resultados;

    
    }

}