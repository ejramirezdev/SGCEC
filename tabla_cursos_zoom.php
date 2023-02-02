<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cursos Zoom</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="head_top">
               <div class="container">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <ul class="sociel_link">
                         <li> <a href="https://www.facebook.com/SGCECDELECUADOR"><i class="fa fa-facebook"></i></a></li>                   
                         <li> <a href="https://www.instagram.com/sgcecdelecuadors.a"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="https://wa.me/0995791551"><i class="fa fa-phone-square"></i></a></li>
                     </ul>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <p>#certificaciones</p>
                    </div>
                  </div>
               </div>
            </div>
         </div>
    
               <!--  LOGIN
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                   <li><a class="buy" href="#">Login</a></li> 
               </div>
               -->
            </div>
         </div>
         <!-- end header inner --> 
      </header>
      <!-- end header -->
       <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>CLIENTES REGISTRADOS CURSOS ZOOM</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>


<div class="about">
   <div class="container">
 
          <div class="textos_descripcion">

            <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col"><a href="pregunta.php"><center>Volver</center></a></th>
                    <th scope="col"><a href="rpt_registro_cursosgratis.php"><center>Reporte</center></a></th>
                    <th colspan="7" scope="col"><center>Datos Formulario cliente</center></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><center><b>Cédula</b></center></td>
                    <td><center><b>Nombres Completos</b></center></td>
                    <td><center><b>E-mail</b></center></td>
                    <td><center><b>Teléfono</b></center></td>
                    <td><center><b>Curso</b></center></td>
                    <td><center><b>T. Pago</b></center></td>
                    <td colspan="2"><center><b>Operaciones</b></center></td>
                    
                  </tr>
       
                  <?php
				include("conexion.php");
				$query="SELECT * FROM registrozoom order by id DESC";
				$resultado= $conexion->query($query);
				while($row=$resultado->fetch_assoc()){
			?>	
       
       <tr>
                    <td><center><?php echo $row['cedula']; ?></center></td>
                    <td><center><?php echo $row['nombres']; ?></center></td>
                    <td><center><?php echo $row['email']; ?></center></td>
                    <td><center><?php echo $row['telefono']; ?></center></td>
                    <td><center><?php echo $row['ncurso']; ?></center></td>
                    <td><center><?php echo $row['pagos']; ?></center></td>
                    <td><center><a href="eliminar_form_cursos_zoom.php?id=<?php echo $row['id']; ?>">Eliminar</a></center></td>
                </tr>
            <?php
				}
			?>	
                </tbody>
              </table><br>
              <center><a href="pregunta.php"><input type="button" value="Volver" class="btn btn-primary" /> </a>
     </center>
     <br>
          </div> 
         </div> 
      </div>
      
   


   <!-- map -->
   <div class="container-fluid padi">
      <div class="map">
         <!-- imagen de mapa 
         <img src="images/mapimg.jpg" alt="img"/> -->
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15949.008107879548!2d-79.861594!3d-2.0551215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2fd1eb3d253ee60b!2sSGCEC+del+Ecuador+S.A!5e0!3m2!1ses-419!2sec!4v1547069410405" width="1350" height="450" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe>
      </div>
   </div>
   <!-- end map --> 

      <!--  footer --> 
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <ul class="sociel">
                         <li> <a href="https://www.facebook.com/SGCECDELECUADOR"><i class="fa fa-facebook"></i></a></li>
                         <li> <a href="https://www.instagram.com/sgcecdelecuadors.a"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="https://wa.me/0995791551"><i class="fa fa-phone-square"></i></a></li>
                     </ul>
                  </div>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Contacta con nosotros</h3>
                     <span>Guayaquil, Ecuador<br>
                        +593 995791551</span>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Enlaces Adicionales</h3>
                     <ul class="lik">
                          <li> <a href="contact.html">Contacta con nosotros</a></li>
                     </ul>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Servicio</h3>
                      <ul class="lik">
                     <li> <a href="competencias_laborales.html"> Certificaciones</a></li>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Acerca de</h3>
                     <ul class="lik">
                     <li> <a href="quienes_somos.html"> Quienes somos</a></li>
                  </div>
               </div>
            </div>
         </div>
            <div class="copyright">
               <p>Copyright 2022 Todos los derechos reservados </p>
            </div>
         
      </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>