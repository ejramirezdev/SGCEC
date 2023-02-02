<?php
require_once 'models/PreguntaModel.php';

class PreguntaController{

    private $preguntaModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->preguntaModel = new PreguntaModel();
    }

    public function index(){
       
        $idTaller = $_GET['idTaller'];
        $idCurso = $_GET['idCurso'];
        $preguntas = $this->preguntaModel->get_preguntas($idTaller);
        
        require_once "views/cursos_online/Pregunta.php";
    }
    public function crearPreguntaView(){
        $idTaller = $_GET['idTaller'];
        $idCurso = $_GET['idCurso'];
        require_once "views/cursos_online/Pregunta_registrar.php";
    }

    public function crearPregunta(){
        $idCurso = $_POST['idCurso'];
        $id_test = $_POST['id_test'];
      
        $pregunta = array(
            "titulo"=>$_POST['titulo'], 
            "nombre"=>$_POST['nombre'],
            "id_test"=>$_POST['id_test']
        );

        $isSaved = $this->preguntaModel->create_pregunta($pregunta);

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
        header("Location:index.php?c=Pregunta&idCurso=$idCurso&idTaller=$id_test"); 


    }
    public function updatePreguntaView(){
        
        // var_dump($_GET);
        $idPregunta = $_GET['idPregunta'];
        $idTaller = $_GET['idTaller'];
        $idCurso = $_GET['idCurso'];
         
        $pregunta = $this->preguntaModel->get_ONE_pregunta($idPregunta);
       
        require_once "views/cursos_online/Pregunta_update.php";

    }
    public function updatePregunta(){
       var_dump($_POST);
        $idCurso = $_POST['idCurso'];
        $idPregunta = $_POST['idPregunta'];
        $id_test = $_POST['id_test'];
          
        $pregunta = array(
            "titulo"=>$_POST['titulo'], 
            "nombre"=>$_POST['nombre'],
            "id_test"=>$_POST['id_test'],
            "idPregunta"=>$_POST['idPregunta']
            
        );
         
        $isSaved = $this->preguntaModel->update_pregunta($pregunta);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al Actualizar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }
      
        header("Location:index.php?c=Pregunta&idCurso=$idCurso&idTaller=$id_test"); 

    }


}