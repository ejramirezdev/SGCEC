<?php
require_once 'models/RespuestaModel.php';

class RespuestaController{

    private $respuestaModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->respuestaModel = new RespuestaModel();
    }

    public function index(){
       
        $idCurso = $_GET['idCurso'];
        $idTaller = $_GET['idTaller'];
        $idPregunta = $_GET['idPregunta'];
         
        $respuestas = $this->respuestaModel->get_respuestas($idPregunta);
       
        require_once "views/cursos_online/Respuesta.php";
    }
    public function crearRespuestaView(){
        $idCurso = $_GET['idCurso'];
        $idTaller = $_GET['idTaller'];
        $idPregunta = $_GET['idPregunta'];
        
        require_once "views/cursos_online/Respuesta_registrar.php";
    }
    public function crearRespuesta(){
           
        
        // $idCurso = $_POST['idCurso'];
        $idCurso = $_POST['idCurso'];
        $idTaller = $_POST['idTaller'];
        $id_pregunta = $_POST['id_pregunta'];
        $respuesta = array(
            "nombre"=>$_POST['nombre'], 
            "isTrue"=>$_POST['isTrue'],
            "id_pregunta"=>$_POST['id_pregunta']
        );

        $isSaved = $this->respuestaModel->create_respuesta($respuesta);
     
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
        header("Location:index.php?c=Respuesta&idCurso=$idCurso&idPregunta=$id_pregunta&idTaller=$idTaller"); 


    }
    public function updateRespuestaView(){
        
        
        $idRespuesta = $_GET['idRespuesta'];
        $idPregunta = $_GET['idPregunta'];
        $idTaller = $_GET['idTaller'];
        $idCurso = $_GET['idCurso'];
         
        $respuesta = $this->respuestaModel->get_ONE_respuesta($idRespuesta);
        
        require_once "views/cursos_online/Respuesta_update.php";

    }
    public function UpdateRespuesta(){
       
        $idCurso = $_POST['idCurso'];
        $idTaller = $_POST['idTaller'];
        $id_pregunta = $_POST['id_pregunta'];
      
        $respuesta = array(
            "nombre"=>$_POST['nombre'], 
            "isTrue"=>$_POST['isTrue'], 
            "id_pregunta"=>$_POST['id_pregunta'], 
            "idCurso"=>$_POST['idCurso'],
            "idTaller"=>$_POST['idTaller'],
            "idRespuesta"=>$_POST['idRespuesta']
                      
        );
        // $isSaved = $this->libroModel->create_libro($libro);
 
        $isSaved = $this->respuestaModel->update_respuesta($respuesta);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al Actualizar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }
     
        header("Location:index.php?c=Respuesta&idCurso=$idCurso&idTaller=$idTaller&idPregunta=$id_pregunta"); 

    }



}