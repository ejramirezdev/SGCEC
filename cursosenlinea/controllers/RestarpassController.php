<?php

require_once 'models/RestabPassModel.php';

class RestarpassController{
    
    private $restabPassModel;
    
    public function __construct() {
       $this->restabPassModel = new RestabPassModel();
    }

    public function index(){
       
        $id_curso = $_GET['id'];
       
        require_once "views/courses/restarPass.php";
        //require_once 'views/usuarios/cuentaAdminView.php';
    }

    // public function register(){
       
    //     $id_curso = $_GET['id'];
    //     // $usuario = $_POST['user'];
    //     // $pass = $_POST['pass'];  
    //     // $resultado = $this->coursesModel->consultar_curso($id_curso);


    //     // $libros = $this->coursesModel->consultar_libros($id_curso);

    //     require_once 'views/courses/register_course.php';
    // }
     public function restablecer(){
        if($_POST){

                $cedula =strip_tags($_POST["cedula"]);
            $nombre1 = strip_tags($_POST["nombre1"]);
            $nombre2 = strip_tags($_POST["nombre2"]);
            $apellido1 = strip_tags($_POST["apellido1"]);
            $apellido2 = strip_tags($_POST["apellido2"]);
            $usuario = strip_tags($_POST["usuario"]);
            $contrasena = $_POST["pass1"];
            $contrasena = $_POST["pass2"];
            

           
            $contrasena = $_POST["pass1"];

            $hash=hash('sha512',"DWQ1EDW".$contrasena);

            $contrasena = $hash;          




            $id_curso = strip_tags($_POST["curso"]);
 
            $persona=array(
            "cedula"=> $cedula,
            "nombre1"=> $nombre1,
            "nombre2"=> $nombre2,
            "apellido1"=> $apellido1,
            "apellido2"=> $apellido2,
            "usuario"=> $usuario,
            "contrasena"=> $contrasena,
            "id_curso"=> $id_curso,
        );

           $idUsuario =  $this->restabPassModel->consultarPersona($persona);

           if($idUsuario){
            $resultado =  $this->restabPassModel->restablecer($idUsuario,$contrasena);
            if($resultado){
                

            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Contraseña restablecida con exito! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            header("Location:index.php?c=Auth&a=index&id=$id_curso&result=true");
            }

           } 

           echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Error al restablecer <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";      
          require_once 'views/courses/restarPass.php';
            //    header("Location:index.php?c=Auth&a=index&id=$id_curso&result=false");
            // var_dump( $resultado);
            // require_once "views/courses/pagoCurso.php";
        }else{
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Error al restablecer <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            require_once 'views/courses/restarPass.php';
           
        }
       
    }

   
  
    
}