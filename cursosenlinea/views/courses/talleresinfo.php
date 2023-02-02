<?php require_once 'views/partials/header.php'; ?>









<div class="container">
 
        <div class="row  p-2 m-2">
          <div class="col-sm-12 text-center">
            <h2> Curso  <?php  echo $nombreCurso->nombre ?> (En Línea) </h2>
          </div>
        </div>

       

      <div class="row p-2 m-2">


        <div class="col-sm-12 bg-dark p-3 text-center">
          <h6 style="color:rgb(253, 253, 253);">
            Materiales de apoyo para descargar
          </h6>
        </div>


        <div class="col-sm-6  p-2">

            <div class="col bg-warning p-2">
              <h6 style="color:rgb(253, 253, 253);">
                Resultado de aprendizaje
              </h6>
            </div>


            <div class="col p-4" >
              <h6 style="color:rgb(0, 0, 0);">
                Objetivo Específico 1:
                <br>
                Evaluación de  <?php  echo $nombreCurso->nombre ?>.
              </h6>
              
            </div>

        </div>
      
        
        <div class="col-sm-6  p-2">

            <div class="col bg-warning p-2 ">
              <h6 style="color:rgb(253, 253, 253);">
                Instrumento de Evaluación
              </h6>
            </div>

            <div class="col  p-4">
              <h6 style="color:rgb(0, 0, 0);">
                Descargar Taller 1
              </h6>
              <br>




              <?php  
            foreach($talleres as $taller){
                
                if($taller->TipoMaterial==="0"){  ?>

              
                <h6 style="color:rgb(0, 0, 0);">

                  <a href="assets/talleres/<?php echo $taller->nombrePDF ?>" download="<?php echo $taller->nombrePDF ?>">&#8595; • <?php echo $taller->nombrePDF ?></a>
                </h6>

                <?php
                }

            }
        ?>

              
            </div>
            
        </div>

        <hr>

        <div class="col-sm-6 p-2">

          <div class="col bg-warning p-2">
            <h6 style="color:rgb(253, 253, 253);">
              Resultado de aprendizaje
            </h6>
          </div>


          <div class="col p-4" >
            <h6 style="color:rgb(0, 0, 0);">
              Objetivo Específico 1:
              <br>
              Evaluación de  <?php  echo $nombreCurso->nombre ?>
            </h6>
            
          </div>

      </div>
    
      
      <div class="col-sm-6  p-2">

          <div class="col bg-warning p-2 ">
            <h6 style="color:rgb(253, 253, 253);">
              Instrumento de Evaluación
            </h6>
          </div>

          <div class="col  p-4">
            <h6 style="color:rgb(0, 0, 0);">
             Descargar
            </h6>
            <br>





            <?php  
            foreach($talleres as $taller){
                
                if($taller->TipoMaterial==="1"){  ?>

               
                <h6 style="color:rgb(0, 0, 0);">
                    <a href="assets/talleres/<?php echo $taller->nombrePDF ?>" download="<?php echo $taller->nombrePDF ?>">&#8595; • <?php echo $taller->nombrePDF ?></a>
                </h6>
                    
                <?php
                }

            }
        ?>
        
    

          </div>
          
      </div>

      <div class="col-sm-12 p-2 text-center">

      
        <a class="btn btn-warning" href="index.php?c=Capitulos&a=talleres"
        style="margin-right: 35px; font-family: 'Raleway', sans-serif; font-size: 18.5px;">Iniciar Test</a>
   


          
        </div>
        
    </div>
  </div>


</div>






















<?php
include_once("views/partials/footer.php");
?>