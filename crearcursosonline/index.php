<?php 
require_once 'config/config.php';
$contralodor = CONTROLADOR_PRINCIPAL;
$accion = ACCION_PRINCIPAL;
if (isset($_GET['c']) && !empty($_GET['c'])) {
    $contralodor = $_GET['c']; //sanitizar  
    if (isset($_GET['a']) && !empty($_GET['a'])) {
        $accion = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
$nombreControlador = ucwords(strtolower($contralodor)). "Controller";
$archivoControlador = 'controllers/' . $nombreControlador . '.php';
if (!is_file($archivoControlador)) {
    $nombreControlador=CONTROLADOR_PRINCIPAL. "Controller";
    $archivoControlador = 'controllers/' . CONTROLADOR_PRINCIPAL . 'Controller'.'.php';
    $accion = ACCION_PRINCIPAL;
}
require_once $archivoControlador;
$objControlador = new $nombreControlador();
$objControlador->$accion();

?>