<?php
require_once 'models/IndiceModel.php';

class IndiceController {

    private $indiceModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->indiceModel = new IndiceModel();
    }

    public function index(){
        $idLibro = $_GET['idLibro'];
        $idCurso = $_GET['idCurso'];
        $indices = $this->indiceModel->get_indices($idLibro);
      
        require_once "views/cursos_online/Indice.php";
        
    }

    public function crearIndiceView(){
        $idLibro = $_GET['idLibro'];
        $idCurso = $_GET['idCurso'];
        require_once "views/cursos_online/Indice_registrar.php";
        
    }

    public function crearIndice(){
        
        
        $idLibro = $_GET['idLibro'];
        $idCurso = $_GET['idCurso'];
        $indice = array(
            "num_seccion"=>$_POST['num_seccion'], 
            "nombre"=>$_POST['nombre'], 
            "id_libro"=>$_POST['id_libro'],
        );
        
        $isSaved = $this->indiceModel->create_indice($indice);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al registrar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }

        header("Location:index.php?c=Indice&idCurso=$idCurso&idLibro=$idLibro"); 

    }


    public function UpdateIndiceView(){
        
        
        $idIndice= $_GET['id'];  
        $idCurso = $_GET['idCurso'];
        $indice = $this->indiceModel->get_ONE_indice($idIndice);

        require_once "views/cursos_online/Indice_Update.php";

    }
    public function UpdateIndice(){
        
        
        $idLibro = $_GET['idLibro'];
        $idCurso = $_GET['idCurso'];
        $indice = array(
            "num_seccion"=>$_POST['num_seccion'], 
            "nombre"=>$_POST['nombre'], 
            "id_libro"=>$_POST['id_libro'],
            "id_Indice"=>$_POST['id_Indice'],
            
        );
        
        $isSaved = $this->indiceModel->update_indice($indice);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al Actualizar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }

        header("Location:index.php?c=Indice&idCurso=$idCurso&idLibro=$idLibro"); 

    }


}