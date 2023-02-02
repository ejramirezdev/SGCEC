<?php

require_once 'models/HomeModel.php';

class HomeController {

    private $homeModel;
   
    public function __construct() {
        $this->homeModel = new HomeModel();
    }
     

    public function index(){
        $resultados = $this->homeModel->consultar();
       
        require_once "views/homeView.php";
        //require_once 'views/usuarios/cuentaAdminView.php';
    }
    public function nosotros(){
        require_once 'views/partials/Nosotros.php';
        //require_once 'views/usuarios/cuentaAdminView.php';
    }
   
    
}