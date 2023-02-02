<?php
require_once 'models/TallerModel.php';

class TallerController{

    private $tallerModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->tallerModel = new TallerModel();
    }

    public function index(){
        $idCurso = $_GET['idCurso'];
        $talleres = $this->tallerModel->get_talleres($idCurso);

        require_once "views/cursos_online/Taller.php";
    }
    public function crearTallerView(){
        $idCurso = $_GET['idCurso'];

        require_once "views/cursos_online/Taller_registrar.php";
    }
    public function crearTaller(){

        $idCurso = $_POST['idCurso'];
        $taller = array(
            "nombre"=>$_POST['nombre'], 
            "idCurso"=>$_POST['idCurso']          
        );

        $isSaved = $this->tallerModel->create_taller($taller);
        
        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al registrar de taller
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }
        
        // $_POST['idCurso']=$idCurso->id;
        header("Location:index.php?c=Taller&idCurso=$idCurso"); 


    }


}