<?php require_once 'views/partials/header.php'; ?>
<br><br>

<div class="container">

   

    <div class="row">

        <div class="col" >
        
            <div class="d-flex justify-content-center">
               <h1 class="text-center" style="font-family: 'Roboto Slab', serif; color: #333333;"><?php echo $resultado->nombre; ?></h1>
                
                
            </div>
        </div>
       
    </div>  <!-- fin del row -->
<br>

    <div class="row">

        <div class="col" >
            <div class="d-flex justify-content-center">
                <h5 class="text-center" style="font-family: 'Roboto Slab', serif; color: #333333;">
                    Sistema de evaluacion
                    <!-- <div class="text-center"  style="font-family: 'Nunito', sans-serif; color: #a3a3a3; padding:3.5px">
                              OBJETIVO
                            </div> -->
                </h5>
            </div>
        </div>
       
    </div>  <!-- fin del row -->
    
<br> 
  
<div class="d-flex flex-row justify-content-center align-items-center ">
 



<div class="table-responsive rounded-7" style="max-width: 900px;">
    <table class="table table-borderless">
      
      <thead style="background:#262626; color:white;">
        <tr>
          <th scope="col">Criterios</th>
      
          <th scope="col" colspan="4">
            <div class="d-flex flex-row justify-content-center align-items-center">
                Resultados
            </div>
            </th>
          <!-- <td >middle</td> -->
        </tr>
      </thead>
      <tbody>
        <tbody>
        <tr>
          <td scope="row" style="background-color:#FFEB3B;"> <b>Participacion</b></td>
          <td>Aprobado</td>
          <td>Aprobado</td>
          <td>Reprobado</td>
          <td>Reprobado</td>
           
        </tr>

        <tr>
            <td scope="row" style="background-color:#FFEB3B;" > <b>Examen</b> </td>
            <td>Aprobado</td>
            <td>Reprobado</td>
            <td>Aprobado</td>
            <td>Reprobado</td>
             
          </tr>

          <tr >
            <td class="" scope="row" style="background-color:#FFEB3B;"> <b>Resultados</b> </td>
            <td style="background-color:#e0e0e0;"> <b>Aprobado</b> </td>
            <td style="background-color:#e0e0e0;"> <b>Reprobado</b> </td>
            <td style="background-color:#e0e0e0;"> <b>Reprobado</b> </td>
            <td style="background-color:#e0e0e0;"> <b>Reprobado</b> </td>
             
          </tr>
      </tbody>
      </tbody>
    </table>
  </div>


   
</div>  <!-- fin del row -->

<br>


    <div class="row">

        <div class="d-flex mb-3 ">
           <div class="col-sm-6 gg shadow rounded-7" style="  border-radius: 20px;background: #ffeb3b; margin: 10px; padding:10px; ">
            
            
                <!-- <div class="p-2 flex-fill bg-info">Flex item 1<br>HOla </div>
                <div class="p-2 flex-fill bg-warning">Flex item 2</div>
                <div class="p-2 flex-fill bg-primary">Flex item 3</div> -->
             
              
                <div class="d-flex flex-column mb-3">

                    <div class="d-flex justify-content-center">
                        <div class="p-2 "><b>Modalidad Presencial</b></div>
                    
                    </div>
 
                    <div class="p-2 ">Se tomará en cuenta todos los Protocolos de Bioseguridad.
                            La participación se evaluará continuamente en actividades como: 
                    </div>
                   
                    <div class="d-flex justify-content-center">
                    
                        <div class="p-2 ">
                            <ul>
                                <li> Preguntas. </li>
                                <li> Comunicación. </li>
                                <li> Participación activa. </li>
                                <li> Asistencia. </li>
                                <li> Puntualidad. </li>
                                <li> Precisión en reportes. </li>
                                <li> Habilidades personales. </li>
                            </ul>
                        </div>
                        
                    </div>                   
                   
                    <div class="p-2">
                            El examen se evaluará sobre 100 puntos.
                        <br>
                            Para aprobarlo se requiere mínimo 70 puntos.
                    </div>
                        

                </div>

            

        </div> <!-- fin de col -->
        <style>
            .gg{
                height: 100%;
            }
        </style>
          <div class="col-sm-6  gg shadow rounded-7" style=" border-radius: 20px;background: #ededed;  margin: 10px;padding:10px;" >
       
            
                <div class="d-flex flex-column mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="p-2 "> <b>Modalidad en línea</b></div>
                    </div>

                    <div class="p-2 ">Al final del curso deberá realizar un test en línea 
                        y será evaluado sobre 100 puntos, para aprobarlo se requiere mínimo 70 puntos. Ojo, al momento de estar en la evaluación, se le recomienda no abandonar ya que no se le podrá generar el certificado.
                    </div>
                    
                    <div class="p-2 ">
                        Tomar en cuenta que una vez que se haya registrado, el curso tendrá una fecha de caducidad por un tiempo aproximado de 30 días.
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="p-2 ">
                            
                            <b>Valor del curso $<?php echo $resultado->costo; ?></b>
                        </div>
                    </div>



                </div>

           

        </div> <!-- fin de col -->


         </div>


    </div>  <!-- fin del row -->

    <br><br>
    <div class="row">

        <div class="col"  >
            <div class="d-flex justify-content-center">
            <a href="index.php?c=Auth&a=index&id=<?php echo $resultado->id; ?>" class="btn " style="background: #FFEB3B; ">Adquirir Ahora!</a>
            </div>
        </div>        
    </div> <!-- fin del row -->
   
  


</div>   <!-- fin del container -->













<?php
include_once("views/partials/footer.php");
?>