<?php
// require_once 'models/RespuestaModel.php';

class UsuariosController{

    private $respuestaModel;

    public function __construct() {
        
    //    $this->respuestaModel = new RespuestaModel();
    }

    public function index(){
         
        // $respuestas = $this->respuestaModel->get_respuestas($idPregunta);
       
        require_once "views/admin/Usuarios.php";
    }
   


}