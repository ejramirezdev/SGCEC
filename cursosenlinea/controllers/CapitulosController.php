<?php

require_once 'models/CapitulosModel.php';
if(!isset($_SESSION)){session_start();}

 
class CapitulosController {
    private $capitulosModel;
   
    
    public function __construct() {
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->capitulosModel = new CapitulosModel();
    }
    
    public function index(){

        $varsesion = $_SESSION['usuario'];
        $curso = $_SESSION['curso'];
        // var_dump($varsesion);
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
        }
      

        $libros = $this->capitulosModel->consultar_libros( $curso);
        $nombreCurso= $this->capitulosModel->consultar_nombreCurso( $curso);
        // var_dump($libros);
        // // var_dump($libros);

        require_once 'views/courses/capitulos.php';
    }
    
    public function material(){


        $idIndice = intval($_GET['material']);
 

        $material = $this->capitulosModel->consultar_material( $idIndice);
       
        if($material){
            echo $material->frame;       
        }
        
    }

    public function traerLibro(){


        $idLibro = intval($_GET['material']);
 

        $material = $this->capitulosModel->consultar_ONE_libro( $idLibro);
       
        if($material){
            echo $material->pdf_url;       
        }
        
    }
    public function talleresview(){
        $varsesion = $_SESSION['usuario'];
        $curso = $_SESSION['curso'];
        // var_dump($varsesion);
        if($varsesion == null || $varsesion = ''){

          

            header('Location:index.php?c=Index&a=index');
        }
        
        $talleres = $this->capitulosModel->consultar_material_apoyo( $curso);
        $nombreCurso= $this->capitulosModel->consultar_nombreCurso( $curso);


        require_once 'views/courses/talleresinfo.php';

    }
    
    public function talleres(){
        $varsesion = $_SESSION['usuario'];
        $curso = $_SESSION['curso'];
        // var_dump($varsesion);
        if($varsesion == null || $varsesion = ''){

          

            header('Location:index.php?c=Index&a=index');
        }
      

        $taller = $this->capitulosModel->consultar_talleres( $curso);
        $preguntas = $this->capitulosModel->consultar_preguntas( $taller->id);


        $respuestas = array();
 
        foreach ($preguntas as $pregunta) {
            // echo $pregunta->id;
            $one_respuesta = $this->capitulosModel->consultar_respuestas( $pregunta->id);
            array_push($respuestas, $one_respuesta);
        }

        require_once 'views/courses/talleres.php';
    }


    public function calificar(){

        
        $varsesion = $_SESSION['usuario'];
        $curso = $_SESSION['curso'];
        // var_dump($varsesion);
        if($varsesion == null || $varsesion = ''){

            header('Location:index.php?c=Index&a=index');
        }
      
        if(empty($_POST)){
            header('Location:index.php?c=Index&a=index');
        }

        $acertadas = 0;
        $totalPreguntas=0;

        foreach ($_POST as $idResp) {
            // var_dump($respuesta);
            // echo $idResp;
            $totalPreguntas++;
            $respuesta = $this->capitulosModel->consultar_notas( $idResp);
                   
            if($respuesta->isTrue){
                $acertadas++;
            }
        }
        
        $incorrectas= $totalPreguntas -$acertadas;
        $varsesion = $_SESSION['usuario'];
        $curso = $_SESSION['curso'];

        $subPromedio =  $acertadas / $totalPreguntas;

        $promedio = $subPromedio *10;

        $aprobado = "Reprobado";

        if($promedio >= 7 ){

            $aprobado ="Aprobado";
          
            $idUsuario = $this->capitulosModel->consultar_usuario($varsesion,$curso);
  

            $certificado = $this->capitulosModel->crear_certificado($idUsuario->id,$curso,$promedio);
            
        }


        require_once 'views/courses/resultados.php';
    }

    
}