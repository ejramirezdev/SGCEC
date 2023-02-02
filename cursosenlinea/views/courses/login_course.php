<?php 
// require_once 'views/partials/header.php'; 
?>

<!doctype html>
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <!-- other -->
    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <body>


<div class="container">


  <?php
  if($banderaAlert){
    if($activAlertSuccess){
      echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
        Operacion realizada con <strong> Exito!</strong>  
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }else{
      echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Operacion  <strong> No!</strong> Realizada con exito  
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    }
  }

  
  ?>


  <form  action="index.php?c=Auth&a=login" method="POST">
  
<div class="container-fluid">

    <div class=" d-flex justify-content-center align-items-center flex-column" style="height:600px">

          <div class="card border-0 "  style="max-width: 30rem;box-shadow: -1px 1px 37px 2px rgba(0,0,0,0.14);-webkit-box-shadow: -1px 1px 37px 2px rgba(0,0,0,0.14);-moz-box-shadow: -1px 1px 37px 2px rgba(0,0,0,0.14);border-radius: 30px;  " >

              <img src="./assets/images/logo.png" class="card-img-top" style="padding:5px" alt="...">
              <div class="card-body" style="padding: 40px;">
                  <!-- <h5 style="margin-top: 20px;" class="card-title">Iniciar Sesion</h5>  -->
                  
                  <h5  style="margin-top: 20px;font-family: 'Open Sans', sans-serif;  color: #333333;"><b>Iniciar Sesion</b>  </h1>
                    
 
                  <!-- <input style="margin-top: 20px;" type="email" class="form-control" id="exampleFormControlInput1" placeholder="usuario"> -->
                  <input style="margin-top: 20px;font-family: 'Open Sans', sans-serif;   " type="text" id="usuario"  class="form-control" name="usuario" placeholder="Usuario" required>
                  <!-- <input style="margin-top: 20px;" type="password" class="form-control" id="exampleFormControlInput1" placeholder="contraseña"> -->
                  <input style="margin-top: 20px;font-family: 'Open Sans', sans-serif;   color: #333333; "  type="password" id="contrasena"  class="form-control" name="contrasena" placeholder="Contraseña" required>
                  <input type="curso" id="curso" name="curso" placeholder="curso..." style="display:none; font-family: 'Merriweather', serif; color: #333333;" value="<?php echo $id_curso; ?>">
                  <!-- <button style="margin-top: 20px; background-color: #F7DC6F;" class="btn d-block">Iniciar Sesion</button> -->
                  <input type="submit"  style="margin-top: 20px; background-color: #F7DC6F;font-family: 'Open Sans', sans-serif;   color: #333333;" class="btn d-block btn btn-warning" value="Iniciar Sesion">
                  <div style="margin-top: 20px;" class="d-flex justify-content-between mb-3">
                      <!-- <a href="#" class="card-link">Regresar</a> -->
                   
                      <a  href="index.php?c=Restarpass&a=index&id=<?php echo $id_curso; ?>" style="font-family: 'Open Sans', sans-serif;   color: #333333; " class="card-link">Olvide mi contraseña</a> 
                    </div>
                    <div style="margin-top: 40px;font-family: 'Open Sans', sans-serif;   color: #333333; ">
                      <p >¿Aun no estas registrado?  <a  href="index.php?c=Auth&a=register&id=<?php echo $id_curso; ?>" class="card-link">Registrate aqui!</a>    </p>
                      
                    </div>
                  </div>
              </div>

          </div>
      </div>
    </div>       

</div>
       
     

</form>




</div>














<?php
include_once("views/partials/footer.php");
?>