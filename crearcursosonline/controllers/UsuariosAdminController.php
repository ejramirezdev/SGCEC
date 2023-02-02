<?php
require_once 'models/UsuariosadminModel.php';

class UsuariosAdminController {

    private $usuariosadminModel;

    public function __construct() {
       $this->usuariosadminModel = new UsuariosadminModel();
    }

    public function crearUsuarioView(){
         
        // $respuestas = $this->usuariosadminModel->get_usuario();
        
        require_once "views/admin/UsuariosAdmin_registrar.php";

    }
    public function crearUsuario(){
         
        
        $contrasena = $_POST["password"];
        
            $hash=hash('sha512',"DWQ1EDW".$contrasena);
         
            $contrasena = $hash;          
        
        $taller = array(
            "nombre"=>$_POST['nombre'], 
            "correo"=>$_POST['correo'],
            "cedula"=>$_POST['cedula'],
            "usuario"=>$_POST['usuario'],
            "password"=>$contrasena,
            "estado"=>$_POST['estado'],
            "idPrivilegio"=>$_POST['idPrivilegio'],           
        );

        $isSaved = $this->usuariosadminModel->create_usuario($taller);
      
        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al registrar de taller
            </div>
          </div>";
          require_once "views/admin/UsuariosAdmin_registrar.php";
        }
        
        // $_POST['idCurso']=$idCurso->id;
        header("Location:index.php?c=Index&a=usuarios_admin"); 


        


    }

}