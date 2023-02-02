<?php 
class Conexion{
    public static function getConexion(){
        $database_username = 'w1701259_bdsgcec';
        $database_password = 'PM2014gg';
        $dbname="w1701259_bdsgcec";
        $dsn = 'mysql:host=localhost;dbname=' . $dbname.";charset=utf8";
        $conexion = null; 
    
        try{
            $conexion = new PDO($dsn, $database_username, $database_password ); 
          
        }catch(Exception $e){
                echo $e;
                die("error " . $e->getMessage());
        }
        return $conexion;
    }
}