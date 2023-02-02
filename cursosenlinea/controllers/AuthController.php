<?php

require_once 'models/AuthModel.php';


class AuthController{
    
    private $authModel;
     
    
    public function __construct() {
       $this->authModel = new AuthModel();
       
    }

    public function index(){
       $banderaAlert=false;
        $activAlertSuccess=false;
      
        try {
                    
           if(isset($_GET['result'])){
            $banderaAlert=true;
               if($_GET['result']=="true" ){

                   $activAlertSuccess=true; 
               }else{
                $activAlertSuccess=false;
               }
           }else{
            $banderaAlert=false;
           }

        } catch (Exception $e) {
            echo $e;
        }


        $id_curso = $_GET['id'];
       
        require_once "views/courses/login_course.php";
        //require_once 'views/usuarios/cuentaAdminView.php';
    }

    public function sessionend(){

        session_start();
        session_destroy();
        header("Location:index.php?c=Index&a=index");

       
    }


    public function register(){
       
        $id_curso = $_GET['id'];
        // $usuario = $_POST['user'];
        // $pass = $_POST['pass'];  
        // $resultado = $this->coursesModel->consultar_curso($id_curso);


        // $libros = $this->coursesModel->consultar_libros($id_curso);

        require_once 'views/courses/register_course.php';
    }

  
     public function guardar(){
        

        if($_POST){

             $fecha = date('Y-m-j');
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            $cedula = strip_tags($_POST["cedula"]);
            
            $nombre1 = strip_tags($_POST["nombre1"]);
            $nombre2 = strip_tags($_POST["nombre2"]);
            $apellido1 = strip_tags($_POST["apellido1"]);
            $apellido2 = strip_tags($_POST["apellido2"]);
            $correo = strip_tags($_POST["correo"]);
            $telefono = strip_tags($_POST["telefono"]);
            
            $ciudad = strip_tags($_POST["ciudad"]);
            $empresa = strip_tags($_POST["empresa"]);
            $fechai= strip_tags($_POST["fechai"]);
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fechai ) ) ;
            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
            $usuario = strip_tags($_POST["usuario"]);




            $contrasena = $_POST["contrasena"];

            $hash=hash('sha512',"DWQ1EDW".$contrasena);

            $contrasena = $hash;          

             $id_curso = strip_tags($_POST["curso"]);

            $persona=array(
            "cedula"=> $cedula,
            "nombre1"=> $nombre1,
            "nombre2"=> $nombre2,
            "apellido1"=> $apellido1,
            "apellido2"=> $apellido2,
            "correo"=> $correo,
            "telefono"=> $telefono,
            "ciudad"=> $ciudad,
            "empresa"=> $empresa,
            "fechai"=> $fechai,
            "nuevafecha"=> $nuevafecha,
            "usuario"=> $usuario,
            "contrasena"=> $contrasena,
            "id_curso"=> $id_curso,
        );
            // $usuario = $_POST['name'];
            // // $pass = $_POST['pwd'];
            // print_r($_POST);
            // echo "<br>";
            // echo "HOLA ";
           $resultado =  $this->authModel->registrar($persona);
           if($resultado){
              

            header("Location:index.php?c=Auth&a=index&id=$id_curso&result=true");
           } 
        
            header("Location:index.php?c=Auth&a=index&id=$id_curso&result=true");
          
             
        }else{
            require_once 'views/courses/register_course.php';
        }
       
    }
  
     
 public function registrarPago(){

      
                
        }


    public function pagoCurso(){
       
        $id_curso = $_GET['id'];
        
        require_once "views/courses/pagoCurso.php";

    }

    public function login(){
        try {
                    
            if(isset($_POST)){
              
                $usuario = $_POST["usuario"];
                $contrasena = $_POST["contrasena"];
                
                $id_curso = $_POST["curso"];
                $persona=array(
                    "usuario"=> $usuario,
                    "contrasena"=> $contrasena,
                    "id_curso"=> $id_curso,
                );
                
                $resultado =  $this->authModel->login($persona);
                // var_dump($resultado);
                // die();

                $hash1 = $resultado->password;
                var_dump($hash1);
                $hash2 = hash('sha512',"DWQ1EDW".$contrasena);
                var_dump($hash2);
                if($hash1 ==$hash2 ){
  
                  
                    session_start();
                    $_SESSION['ced'] = $resultado->cedula;
                    $_SESSION['usuario'] = $resultado->usuario;
                    $_SESSION['curso'] = $resultado->id_curso_online;
                    // var_dump($_SESSION);

                        header('Location:index.php?c=Capitulos&a=index');
                   
                   
                }else{
                    header("Location:index.php?c=Auth&a=index&id=$id_curso&result=false");
                }
               

            }
            
 
         } catch (Exception $e) {
             echo $e;
         }

         
    }
    
}