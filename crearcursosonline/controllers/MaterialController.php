<?php
require_once 'models/MaterialModel.php';

class MaterialController {

    private $materialModel;

    public function __construct() {
        if(!isset($_SESSION)){session_start();}
        // $cursos = $this->homeModel->get_cursos();
        $varsesion = $_SESSION['usuario'];  // ESTO CREO QUE VA AQUI Y NO EN LAS FUNCIONES
        
        if($varsesion == null || $varsesion = ''){
            header('Location:index.php?c=Index&a=index');
             
        }
       $this->materialModel = new MaterialModel();
    }

    public function index(){
        $idCurso = $_GET['idCurso'];
        $materiales = $this->materialModel->get_materiales($idCurso);
      
        require_once "views/cursos_online/Material.php";
        
    }
    public function crearMaterialView(){
        $idCurso = $_GET['idCurso'];
        require_once "views/cursos_online/Material_registrar.php";
        
    }
    public function crearMaterial(){
       $idCurso = $_POST['idCurso'];
       var_dump($_POST);
        $libro = array(
            "nombrePDF"=>$_POST['nombrePDF'], 
            "TipoMaterial"=>$_POST['TipoMaterial'], 
            "idCurso"=>$_POST['idCurso'],         
        );
        $isSaved = $this->materialModel->create_material($libro);

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

        header("Location:index.php?c=Material&idCurso=$idCurso"); 


    }
    public function updateMaterialView(){
        
        
        $idMaterial = $_GET['idMaterial'];
        $idCurso = $_GET['idCurso'];
         
        $material = $this->materialModel->get_ONE_material($idMaterial);
        
    //    die();
        require_once "views/cursos_online/Material_update.php";

    }
    public function updateMaterial(){
       var_dump($_POST);
        $idCurso = $_POST['idCurso'];
        $idMaterial = $_POST['idMaterial'];
        
          
        $material = array(
            "nombrePDF"=>$_POST['nombrePDF'], 
            "TipoMaterial"=>$_POST['TipoMaterial'],
            "idCurso"=>$_POST['idCurso'],
            "idMaterial"=>$_POST['idMaterial']
        );
         
        $isSaved = $this->materialModel->update_material($material);

        if($isSaved == false){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Error al Actualizar indice
            </div>
          </div>";
            require_once 'views/HomeCursos.php';
        }
      
        header("Location:index.php?c=Material&idCurso=$idCurso"); 

    }


}

