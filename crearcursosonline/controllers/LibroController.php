<?php
require_once 'models/LibroModel.php';

class LibroController {

    private $libroModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->libroModel = new LibroModel();
    }

    public function index(){
        $idCurso = $_GET['idCurso'];
        $libros = $this->libroModel->get_libros($idCurso);
      
        require_once "views/cursos_online/Libro.php";
        
    }
    public function crearLibroView(){
        $idCurso = $_GET['idCurso'];
        require_once "views/cursos_online/Libro_registrar.php";
        
    }
    public function crearLibro(){
       $idCurso = $_POST['idCurso'];
        $libro = array(
            "nombre"=>$_POST['nombre'], 
            "pdf_url"=>$_POST['pdf_url'], 
            "idCurso"=>$_POST['idCurso'],
            "routeIMG"=>$_POST['routeIMG']            
        );
        $isSaved = $this->libroModel->create_libro($libro);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al registrar el libro
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }

        // $_POST['idCurso']=$idCurso->id;

        header("Location:index.php?c=Libro&idCurso=$idCurso"); 


    }

    public function UpdateLibroView(){
        
        
        $idLibro= $_GET['idLibro'];  
        $idCurso = $_GET['idCurso'];
        // var_dump($_GET);
        // die();
        $libro = $this->libroModel->get_ONE_libro($idLibro);

        require_once "views/cursos_online/Libro_Update.php";

    }
    public function UpdateLibro(){
        
        $idCurso = $_POST['idCurso'];
        $libro = array(
            "idLibro"=>$_POST['idLibro'], 
            "nombre"=>$_POST['nombre'], 
            "pdf_url"=>$_POST['pdf_url'], 
            "idCurso"=>$_POST['idCurso'],
            "routeIMG"=>$_POST['routeIMG']            
        );
        // $isSaved = $this->libroModel->create_libro($libro);
 
        $isSaved = $this->libroModel->update_libro($libro);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al Actualizar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }
        
        header("Location:index.php?c=Libro&idCurso=$idCurso"); 

    }



}