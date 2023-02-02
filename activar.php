<?php
include("conexion_sesion.php");
include("Funciones.php");
if(isset($_GET["id"]) AND isset($_GET["val"])) 
{
    $id_usuario=$_GET['id'];
    $token = $_GET['val'];
    $mensaje=validarToken($id_usuario, $token);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/zerogrid.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link href="estilo_formulario_administradores.css" rel="stylesheet" type="text/css">
    <script src="sololetras.js"> </script>    
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="js/camera.js"></script>
    <script src="js/owl.carousel.js"></script>
 
<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.css" rel="stylesheet"/>
    <title>Activar Cuenta</title>
</head>

<body>
   
        <div class="ui grid center page grid">
<div class="ten wide column">

 <h1><?php echo $id_usuario ; ?></h1>
 
 <p><a href="login.html" role=button>Iniciar Sesión</a></p>
    </div>
    </div>
</body>
</html>