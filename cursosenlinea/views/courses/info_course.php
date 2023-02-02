<?php require_once 'views/partials/header.php'; ?>


<br><br>


<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6 d-flex flex-wrap align-content-center">
            <div style="margin: 5px;">
                
                <h2 class="display-4"   style="margin-left: 50px;font-family: 'Open Sans', sans-serif; color: #333333;" > 
                 
                  <b style=" font-weight: 600; "> Bienvenidos al curso de <?php echo $resultado->nombre ?></b> 
                </h2>

                <div class="" style="margin-left: 50px;margin-top: 25px;font-family: 'Open Sans', sans-serif;color: #a3a3a3;">
                  <?php echo $resultado->descripcion ?>
                </div>
                
                <div   style="margin-left: 50px;margin-top: 25px; margin-bottom: 50px;">
                
                 <a  style="font-family: 'Open Sans', sans-serif; background: #FFEB3B; color:#212121;"  href="index.php?c=CourseCosto&a=index&id=<?php echo $resultado->id; ?>" class="btn ">Adquirir Ahora!</a>
                    <!-- <button type="button" class="btn btn-warning">Adquirir Ahora!</button> -->
                </div>
            </div>

        </div>
        <div class="col-sm-6  ">
              <div class="d-flex flex-wrap align-content-center justify-content-center">

                    <img class="img-fluid"  style="border-radius: 20px;" src="assets/images/IMGFONDO.jpg" alt="Chania"> 
              
              </div>
        </div>



        <!-- contenido -->

        <div class="col-sm-12"><br><br>

            <div class="row">
              <div class="d-flex justify-content-center flex-grow-1 ">
                  <div class="d-flex flex-column">    
                      <h1 class="text-center"    style="font-family: 'Open Sans', sans-serif; color: #333333;">Objetivos </h1>
                      <img src="assets/images/Rectangle 19.svg" alt="" style="max-height:5px;">  
                  </div>
              </div>

            <div style="height: 40px;">
              <!-- espacio -->
            </div>
            
        
            <div class="row">
              <div class="d-flex justify-content-center flex-grow-1 ">
                  <div class="d-flex flex-column">    
                  
                      

                      <?php  

                        $exploded= explode( '•',$resultado->objetivos );

                        foreach ($exploded as $objetivo) { ?>

                            <div class="text-center"  style="font-family: 'Open Sans', sans-serif; color: #a3a3a3; padding:4px;  max-width: 650px ;">
                              <?php echo $objetivo?>
                            </div>

                          <?php
                          //  echo ;
                        

                        }
                      ?>



                  </div>
              </div>
              <div style="height: 40px;">
              <!-- espacio -->
            </div>
        
       </div>

       


        <br><br> 

          <div class="row">
              <div class="d-flex justify-content-center flex-grow-1 ">
                  <div class="d-flex flex-column">    
                      <h1 class="text-center" style="font-family: 'Open Sans', sans-serif; color: #333333;">Contenido </h1>
                      <img loading="lazy" src="assets/images/Rectangle 19.svg" alt="" style="max-height:5px;">  
                  </div>
              </div>

            <div style="height: 40px;">
              <!-- espacio -->
            </div>

          </div>


          <!-- CONTAINER CARTAS   -->

          <div class="container " style="max-width: 900px;">
            
            <div class="col align-self-center" id="cartacentro" >




            <?php

$idlibro_nuevo=1;
 $idlibro_repetido=0;
 
$numCapitulo = array("I","II","III","IV","V","VI","VI","VII","VIII","IX","X","XII","XIII","XIV","XV","XVII","XVII");
$count=0; // esto es para seleccionar los capitulos en Romano
foreach ($libros as $libro) { 
      
      $idlibro_nuevo=$libro->id;
      if($idlibro_nuevo!=$idlibro_repetido ){  ?>
       
  
        <!-- CARTA -->
        <div class="row" id="carta1" style="
        -webkit-box-shadow: 2px 11px 27px 5px rgba(0,0,0,0.15); 
        box-shadow: 2px 11px 27px 5px rgba(0,0,0,0.15);
        border-radius: 50px; margin-bottom: 50px;">
            
        

            <!-- imagen  -->
            <div class="col-sm-6" style="padding:0px ;">
              <img loading="lazy" src="assets/images/<?php echo $libro->routeIMG ?>" class="styleimgCover" alt=".." style="border-top-left-radius: 50px;border-bottom-left-radius: 50px;">
              <!-- la imagen y las configuraciones deben pasarse por el controlador -->
            </div>
            

            <!-- texto -->
            <div class="col" style="margin:10px ;">
                <h1 style="font-family: 'Playfair Display', serif; color: #333333;" >
                  Capitulo <?php echo $numCapitulo[$count] ?>
                </h1>
                <h6 style="margin-left:20px;font-family: 'Playfair Display', serif; color: #333333;" >
                  <?php echo  $libro->nombre_libro ?>
                </h6>
                <ul style="list-style: none; color: #828282;" >
                  <?php  
                        // este for lo limitamos a 3 indices
                        $count_indice=0;
                        foreach ($libros as $lib_indice) {
                            if($lib_indice->id== $libro->id && $count_indice<=3 ){   ?>

                            <li style="padding-top: 2.5px; font-family: 'Nunito', sans-serif; color: #a3a3a3;" >   <?php  
echo   $lib_indice->num_seccion." ".$lib_indice->nombre_indice;  
?>     </li>

                            <?php
                            $count_indice++;
                            }

                          ?>

                          <?php 

                        }  
                      
                    ?>
                </ul>
                <!-- Button trigger modal -->
                <button 
                class="btn btn btn-outline-dark row align-items-end " 
                data-bs-toggle="modal" data-bs-target="#modal<?php echo $libro->id; ?>"
                style="
                  margin-left: 3.5px;
                  margin-bottom: 6px;
                  border-radius: 121px 121px 121px 121px;
                  -moz-border-radius: 121px 121px 121px 121px;
                  -webkit-border-radius: 121px 121px 121px 121px;
                  ">
                  Ver mas... 
                </button>
            </div>
          
        </div>
        <!-- fin de carta -->
  
              <!-- Modal -->
              <div class="modal fade " id="modal<?php echo  $libro->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"> <b> Capitulo <?php echo $numCapitulo[$count] ?></b></h5>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                      <ul style="list-style: none; color: #828282;" >
 
                      <?php  
                    // $indice= $capitulo_value['indice']; // lo usamos mas abajo para el modal
                        foreach ($libros as $lib_indice) { 
                            if($lib_indice->id== $libro->id){   ?>

                            <li style="padding-top: 2.5px;" >   <?php  echo   $lib_indice->num_seccion." ". $lib_indice->nombre_indice;  ?>     </li>

                          <?php
                            }  ?>
                     
                       <?php 
                        }  ?>
    
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                      
                      
                    </div>
                  </div>
                </div>
              </div>

      <?php
      $count++;  // esto es para aumentar los capitulos en Romano
      } ?>

 
<?php 
$idlibro_repetido=$libro->id;

} ?>

 





            <div class="p-3 d-flex justify-content-center">
              <!-- <button type="button"  class="btn btn-warning">Adquirir Ahora!</button> -->
               <a href="index.php?c=CourseCosto&a=index&id=<?php echo $resultado->id; ?>" class="btn" style="background: #FFEB3B; color:#212121;">Más información</a>
            </div>


            </div>

          </div>

          </div>


        </div>
    </div>

</div>






<?php
include_once("views/partials/footer.php");
?>