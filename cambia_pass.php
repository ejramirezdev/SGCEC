<?php
require_once("conexion_sesion.php");
require_once("Funciones.php");
$errors=array();
if(empty($_GET['user_id'])){
 
    header('Location:login.html');
}
if (empty($_GET['token'])){
    header('Location:login.html');
}

$user_id = $mysqli->real_escape_string($_GET['user_id']);
$token = $mysqli->real_escape_string($_GET['token']);




?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
    <title>Configurar contraseña</title>
</head>

<body>
<style>
    #color_fondo{
        background:#F2F57E;
    }
   
</style>
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="index.html">
                                <img src="images/logo.png" alt="Logo"/>
                            </a>
                        </h1>
                        <p>&nbsp;</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</header>


<br/>  
        
<div class="ui grid center page grid">
<div class="ten wide column">

<form action="guardaPass.php" method="post">
  <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">  
 <input type="hidden" id="token " name="token" value="<?php echo $token?>"> 
<h2 class="ui top attached sub header " id="color_fondo">Configura contraseña</h2>
<div class="ui attached form segment"> 
  <div class="field">
    <label>Nueva Contraseña</label>
    <input type="password" id="password" name="password" placeholder="Password">
     </div>
     <div class="field">
   <label>Confirmar Contraseña</label>
   <input type="password" id="_password" name="_password" placeholder="Confirma Password">
  </div>

<button class="ui button" name="submit" type="submit">Actualizar</button>

    </div>
      
    </form>
<?php echo resultBlock($errors);?>
    </div>
    </div>
      <!--========================================================
                          FOOTER
=========================================================-->
<br><br><footer id="footer" class="color_9">
    <div class="container">
        <div class="row-article">
            <div class="grid_12">
                <p class="info text_4 color_4">
                Copyright © 2015 SGCEC del Ecuador S.A. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>
<script src="js/script.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.js"></script>
</body>
</html>