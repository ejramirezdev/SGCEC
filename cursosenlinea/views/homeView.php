<?php
include_once("views/partials/header.php");
?>

 <!--  Estilos inicio -->


 <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }
    </style>





<!--  Estilos fin  -->




<div class="container-fluid">
  <br>  
<!-- 
<div class="row">
    
    <div class="d-flex justify-content-center flex-grow-1 ">
        <div class="d-flex flex-column" >    
           
            <img loading="lazy" src="assets/images/Slidebar.png" alt=""   class="img-fluid">  
        </div>
    </div>

    <div style="height: 15px;">
    
    </div>

</div> -->



 
   <div class="container-fluid text-center my-4">
           
            <div class="row mx-auto my-auto justify-content-center">

                <div class="col d-flex" style="margin-left:0.5rem" >
                    <h4>Los más vendido</h4>
                </div>
                <div id="recipeCarousel" class="carousel carousel1 slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner " role="listbox">
    
                    <?php 
                 
                    $idCursosArray = array(); // creamos un array 
                    foreach($resultados as $curso){
                        array_push($idCursosArray,$curso->id);// guardamos en un array los id de los cursos
                    }
                    // var_dump($idCursosArray); 
                    $arrlength=count($resultados); // longitud del array de cursos
                    $mitadCursoslenght = intval($arrlength/2); // obtenemos la mitad de los id
                    $random_keys=array_rand($idCursosArray,$mitadCursoslenght); // tenemos id ramdum acorde a la mitad de los id
                    // var_dump($random_keys);
                    
                    for ($i=0; $i < $mitadCursoslenght; $i++) {// recorremos el array aletorio
                      // echo $random_keys[$i]; 
                      $idAlertorio =  $idCursosArray[$random_keys[$i]]; // asignamos el id aletorio en el arreglo de los id de los cursos xd
                        foreach($resultados as $curso){ // recorremos los cursos 

                          if($curso->id === $idAlertorio  ){// verificamos si el id del curso es igual al id aletorio generado. Si es igual entonces se va a mostrar

                            ?>

                            <!-- inicio item 1   -->

                            <div class="carousel-item1 carousel-item <?php if($i==0) { echo "active"; } ?>">
                                <div class="col-md-3 p-2">
                                    <div class="card shadow-0">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img loading="lazy" src="assets/images/<?php  echo $curso->img; ?>"
                                                class="img-fluid" />
                                            


  <?php 
                                            if($curso->estado){ ?>
                                              <a  href="index.php?c=Course&a=nuevo&id=<?php echo $curso->id; ?>" >
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                            </a>

                                                <?php
                                            }else{ ?>

                                            <a  href="#" >
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                            </a>

                                              <?php

                                            }
                                            ?>








                                        </div>
                                        <div class="card-body text-start">
                                            <p class="card-text">
                                              <?php
                                                $numCaracteres =  strlen($curso->nombre);
                                                $spacio = "";
                                                
                                                if($numCaracteres<35){
                                                    $spacio = "<br>&nbsp;";
                                                    
                                                }
                                                ?>
                                                <strong><?php echo $curso->nombre; echo $spacio;  ?></strong>
                                            </p>


 <?php 
                                            if($curso->estado ==false ){ ?>
                                            <h6 style=""><b style=" color: #b81a05;">Proximamente!</b>
                                            </h6>
                                                <?php
                                            }else{ ?>
<h6 style="color:#000000;"><b>$30</b>&nbsp;&nbsp;&nbsp;
                                            <del style="color: #6a6f73;">$60</del>
                                            &nbsp;<b style=" color: #b81a05;">-50% desc</b>
                                            </h6>
                                            

                                            
                                            <?php

                                                }
                                                ?>




                                        </div>
                                    </div>
                                </div>
                            </div>
                                              <!--  fin item 1   -->



                          <?php

                          } //fin del if
                        }// fin del foreach
                      # code...
                    } // fin del for


                      ?>
      
                    </div>
    
                    <button class="carousel-control-prev bg-dark"
                        style="max-height: 45px; max-width: 45px; margin-top: auto; margin-bottom: auto;" type="button"
                        href=".carousel1" data-bs-slide="prev">
                        <i class="fas fa-angle-left"></i>
    
                    </button>
                    <button class="carousel-control-next bg-dark"
                        style="max-height: 45px; max-width: 45px; margin-top: auto; margin-bottom: auto;" href=".carousel1"
                        data-bs-slide="next">
                        <i class="fas fa-angle-right"></i>
                    </button>
    
                </div>
    
            </div>


<!-- carousel INICIO -->

  <!-- carousel  -->
      <div class="container-fluid text-center my-4">
           
           <div class="row mx-auto my-auto justify-content-center">

               <div class="col d-flex" style="margin-left:0.5rem" >
                   <h4>Recomendados para ti</h4>
               </div>
               <div id="recipeCarousel" class="carousel carousel2 slide carousel-fade" data-bs-ride="carousel">
                   <div class="carousel-inner " role="listbox">
   
                   <?php 
                
                   $idCursosArray = array(); // creamos un array 
                   foreach($resultados as $curso){
                       array_push($idCursosArray,$curso->id);// guardamos en un array los id de los cursos
                   }
                   // var_dump($idCursosArray); 
                   $arrlength=count($resultados); // longitud del array de cursos
                   $mitadCursoslenght = intval($arrlength/2); // obtenemos la mitad de los id
                   $random_keys=array_rand($idCursosArray,$mitadCursoslenght); // tenemos id ramdum acorde a la mitad de los id
                   // var_dump($random_keys);
                   
                   for ($i=0; $i < $mitadCursoslenght; $i++) {// recorremos el array aletorio
                     // echo $random_keys[$i]; 
                     $idAlertorio =  $idCursosArray[$random_keys[$i]]; // asignamos el id aletorio en el arreglo de los id de los cursos xd
                       foreach($resultados as $curso){ // recorremos los cursos 

                         if($curso->id === $idAlertorio ){// verificamos si el id del curso es igual al id aletorio generado. Si es igual entonces se va a mostrar

                           ?>

                           <!-- inicio item 1   -->

                           <div class="carousel-item2 carousel-item <?php if($i==0) { echo "active"; } ?>">
                               <div class="col-md-3 p-2">
                                   <div class="card shadow-0">
                                       <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                           <img loading="lazy" src="assets/images/<?php  echo $curso->img; ?>"
                                               class="img-fluid"  />
                                           <?php 
                                           if($curso->estado){ ?>
                                             <a  href="index.php?c=Course&a=nuevo&id=<?php echo $curso->id; ?>" >
                                               <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                           </a>

                                               <?php
                                           }else{ ?>

                                           <a  href="#" >
                                               <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                           </a>

                                             <?php

                                           }
                                           ?>
                                         

                                       </div>
                                       <div class="card-body text-start">
                                           <p class="card-text">
                                               <strong><?php  echo $curso->nombre; ?></strong>
                                           </p>
                                           


 <?php 
                                            if($curso->estado ==false ){ ?>
                                             <h6 style="color:#FF0000;">Proximamente!
                                                 
                                            </h6>
                                                <?php
                                            }else{ ?>
                                            <h6 style="color:#000000;">$30 <small><del
                                                        style="padding-left:1.5rem;padding-right: 0.4rem;  color: #6a6f73;">$60</del></small>
                                                <small style=" color: #FF0000;"> 50% desc</small>
                                            </h6>

                                            
                                            <?php

                                                }
                                                ?>





                                       </div>
                                   </div>
                               </div>
                           </div>
                                             <!--  fin item 1   -->



                         <?php

                         } //fin del if
                       }// fin del foreach
                     # code...
                   } // fin del for


                     ?>
     
                   </div>
   
                   <button class="carousel-control-prev bg-dark"
                       style="max-height: 45px; max-width: 45px; margin-top: auto; margin-bottom: auto;" type="button"
                       href=".carousel2" data-bs-slide="prev">
                       <i class="fas fa-angle-left"></i>
   
                   </button>
                   <button class="carousel-control-next bg-dark"
                       style="max-height: 45px; max-width: 45px; margin-top: auto; margin-bottom: auto;" href=".carousel2"
                       data-bs-slide="next">
                       <i class="fas fa-angle-right"></i>
                   </button>
   
               </div>
   
           </div>
           <!-- fin del slider -->
          











<!-- carousel FIN -->

         
<div class="container">

<div class="row">
    
    <div class="d-flex justify-content-start flex-grow-1 ">
        
    <h4>Todos nuestros cursos</h4>
           
    </div>

    <div style="height: 15px;">
      <!-- espacio -->
    </div>

</div>
  <div class=" row row-cols-1 row-cols-md-4 g-4">
  
  
<?php


foreach ($resultados as $curso) { ?>
  






        <div class="col ">
          <div class="card h-100  mt-3 border-0 shadow-sm bg-body rounded">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img loading="lazy"
                  src="assets/images/<?php  echo $curso->img; ?>"
                  class="card-img-top img-fluid"
                />



                <?php     if($curso->estado) {  ?>


                  <a href="index.php?c=Course&a=nuevo&id=<?php echo $curso->id; ?>">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.631);"></div>
                  </a>
                      <?php     }else{  ?>
                        <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.631);"></div>
                  </a>


                  <?php
                  }
                    ?> 
  


                 
           
            </div>
            <div class="card-body text-center  border-0">
              <h5 class="card-title"><?php  echo $curso->nombre; ?></h5>
              <p class="card-text text-center">
                 <!-- <p class="card-text text-center">
       
      
     
    </p> -->
              </p>
            </div>

            
           
  <div class="card-footer bg-transparent text-center border border-0 mb-3">
                <!-- <div class="d-flex justify-content-center">...</div> -->
                <?php     if($curso->estado) {  ?>

  <a class="btn btn-primary " style="background-color: #ffcd05;" href="index.php?c=Course&a=nuevo&id=<?php echo $curso->id; ?>" role="button"
  ><i class="fas fa-book-open me-2"></i>Aprender</a>
              

              <?php     }else{  ?>
               <a class="btn btn-primary " style="background-color: #b6c4cf;" href="#!" role="button"
  ><i class="fas fa-tools me-2"></i>Proxamente</a>


                <?php
                }
                   ?> 
                

            </div>
          </div>
        </div>











     
<?php } ?>


  </div>
</div>

</div>


</div>

        </div>
   


<!--  CAROUSEL SCRIPT INICIO -->
   <script>

            let items = document.querySelectorAll('.carousel1 .carousel-item1')

            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })

            let items2 = document.querySelectorAll('.carousel2 .carousel-item2')

            items2.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })

        </script>


<!--  CAROUSEL SCRIPT FIN -->

<?php
include_once("views/partials/footer.php");
?>