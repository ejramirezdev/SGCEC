<?php
require_once 'models/CursoModel.php';
class CursoController {

    private $cursoModel;
    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->cursoModel = new CursoModel();
    }

    
    public function crearcursoview(){

        require_once 'views/cursos_online/Curso_registrar.php';
        
    }
   
    public function crearCurso(){
        
        $curso = array(
            "nombre"=>$_POST['nombre'], 
            "descripcion"=>$_POST['descripcion'], 
            "objetivos"=>$_POST['objetivos'],
            "costo"=>$_POST['costo'],
            "img"=>$_POST['img'],
            "estado"=>$_POST['estado'],
            
        );

        $idCurso = $this->cursoModel->create_curso($curso);

        if($idCurso == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al registrar el curso
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }

        // $_POST['idCurso']=$idCurso->id;

        header("Location:index.php"); 

    }    
}