<?php

require_once 'models/CoursesModel.php';

class CourseCostoController {

    private $coursesModel;
   
    
    public function __construct() {
       $this->coursesModel = new CoursesModel();
    }
     

    public function index(){
       
        $id_curso = $_GET['id'];
        $resultado = $this->coursesModel->consultar_curso($id_curso);
        // var_dump($resultado);
        require_once "views/courses/info_course_costo.php";
        //require_once 'views/usuarios/cuentaAdminView.php';
    }
    public function nosotros(){
        // require_once 'views/partials/Nosotros.php';
        //require_once 'views/usuarios/cuentaAdminView.php';
    }
   
    
}


