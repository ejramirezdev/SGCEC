<?php
require_once 'models/LoginModel.php';

class LoginController {

    private $loginModel;
    public function __construct() {
       $this->loginModel = new LoginModel();
    }

    public function index(){

        $usuario = array(
            "usuario"=>$_POST['usuario'], 
            "password"=>$_POST['password']      
        );
        $usuario = $this->loginModel->login_user_get_data($usuario);
        
        $contrasena = $_POST["password"];
        $hash1 = $usuario->password;
        // var_dump($hash1);
        $hash2 = hash('sha512',"DWQ1EDW".$contrasena);
        
        if($hash1 == $hash2 ){
            session_start();
            $_SESSION['usuario'] = $usuario->nombre;
            $_SESSION['privilegio'] = $usuario->idPrivilegio;
            header("Location:index.php?c=Index&a=home");
        }else{
            header("Location:index.php?c=Index&a=index");
        }
     
    }


}