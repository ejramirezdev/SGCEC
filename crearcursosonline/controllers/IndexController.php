<?php
require_once 'models/HomeModel.php';

class IndexController {

    private $homeModel;
    public function __construct() {
       $this->homeModel = new HomeModel();
    }


    public function index(){

        // $cursos = $this->homeModel->get_cursos();
        
        require_once "views/Login.php";
        
    }
    public function Home(){
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
        require_once "views/Home.php";
        
    }
    public function adminCursos(){

        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
        $cursos = $this->homeModel->get_cursos();
        
        require_once "views/HomeCursos.php";
        
    }
    public function usuarios_admin(){
if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
        $usuarios = $this->homeModel->get_usuariosAdmin();

       

        require_once "views/admin/UsuariosAdmin.php";
        // require_once "views/HomeCursos.php";
        
    }
    public function adminUsuarios(){
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
        if(isset($_GET['isFail'])){
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            El usuario <strong>no ha realizado el taller o no ha generado un certificado.</strong>  
            <button type='button' class='btn-close' data-bs-dismiss='danger' aria-label='Close'></button>
            </div>
            ";
        }
        $usuarios = $this->homeModel->get_usuarios();
       
        require_once "views/admin/HomeUsuarios.php";
        
    }
     
     function cerrar_session(){
        session_start();
        session_destroy();
        header("Location:index.php?c=Index");

     }
    
}