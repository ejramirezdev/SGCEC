<?php

require_once 'models/CoursesModel.php';

class CourseController {
    private $coursesModel;
   
    
    public function __construct() {
       $this->coursesModel = new CoursesModel();
    }
    
    public function nuevo(){
        $id_curso = $_GET['id'];

        session_start();
        $_SESSION['curso'] =$id_curso;



        $resultado = $this->coursesModel->consultar_curso($id_curso);


        $libros = $this->coursesModel->consultar_libros($id_curso);

        require_once 'views/courses/info_course.php';
    }

    
}
