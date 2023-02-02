<?php require_once 'views/partials/navbartaller.php'; ?>
<?php  $isTaller=true; $isLibro=false; $isVideo=false;

?>
 <!-- Font Awesome -->
 <link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
rel="stylesheet"
/>


<!-- body  body  body -->

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-8 ">
        <div id="txtHint" class="embed-container">
   <div class="container">
            <div class="row">
                <div class=" col-sm-12">
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <!-- <h3 class="">Click en Material de apoyo</h3> -->
                        <div class="alert alert-warning" role="alert">
                            Click en Material de apollo
                        </div>
                    </div>
                </div>
            </div>
        </div>

             
            
        </div>


 
        <!-- info del curso -->
        
        <div class="container">
            <br>
          
            <h1   style="font-family: 'Open Sans', sans-serif;  color: #333333;"> <?php echo $nombreCurso->nombre; ?> </h1>
            <p  style="font-family: 'Open Sans', sans-serif;  color: #5B5B5B; max-width: 500px;" > <?php echo $nombreCurso->nombre; ?> </p>
            <br>
        </div>



</div>



<!-- -INICIO MENU LATERAL -->
<div class="col-lg-4">
        









<?php 
$idlibro_nuevo=1;
$idlibro_repetido=0;
$primeraPasada=true;
foreach($libros as $libro){
  
    $idlibro_nuevo=$libro->id;

    if($idlibro_nuevo!=$idlibro_repetido ){  ?>

        













        <!-- INICIO MENU LATERAL- -->
        <div class="accordion" id="accordionPanelsStayOpenExample">

                <!-- inicio de acordion item  -->
                <div class="accordion-item">
                    <!-- inicio de boton item  -->
                    <h2 class="accordion-header" id="heading<?php echo  $libro->id; ?>">

                         <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                        style="font-family: 'Open Sans', sans-serif; color:#000000"
                        data-mdb-target="#panelsStayOpen-collapse<?php echo  $libro->id; ?>" aria-expanded="<?php echo $primeraPasada;?>" aria-controls="panelsStayOpen-collapse<?php echo  $libro->id; ?>">
                          <b>  <?php echo $libro->nombre_libro ?> </b>
                        </button>

                    </h2>
                    <!-- fin de boton item  -->

                    <!-- inicio de boton item  -->
                    <div id="panelsStayOpen-collapse<?php echo  $libro->id; ?>" class="accordion-collapse collapse <?php if($primeraPasada){ echo "show"; } ?>" aria-labelledby="heading<?php echo  $libro->id; ?>">

                        
                            <!-- inicio contenido item -->
                            <div class="list-group">
                              

                             
      <a class="btn btn-primary" style="background-color: #FFFF33;" onclick="showLibro('<?php echo $libro->id ?>')"   role="button"
                            ><i class="fas fa-book-open"></i>&nbsp;&nbsp; Material de apoyo </a>




 
                            
                            <?php
                             $primeraPasada=false;
                             
                            foreach ($libros as $lib_indice) { 
                                if($lib_indice->id== $libro->id){   ?>
                                   
                                    
                                      <a class="list-group-item list-group-item-action border border-0"  style="font-family: 'Open Sans', sans-serif; color: #5B5B5B;" data-toggle="collapse" >
                                        <?php echo $lib_indice->nombre_indice ?>
                                    </a>

                                    <?php
                                } 
                            } ?>
                            
                                
                            </div>
                            <!-- fin contenido item -->


                    </div>
                    <!-- fin de boton item  -->

                </div>
                <!-- fin de acordion item  -->




        </div>
        <!-- FIN MENU LATERAL- -->




<?php
    }
   
    $idlibro_repetido=$libro->id;
}
?>

                       




    </div>

    

</div>



<script>
    let bandera = 0;
function showMaterial(str) {
 
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        console.log(this.responseText);
        if(this.responseText){
            document.getElementById("txtHint").innerHTML=this.responseText;
        }
    }
  }
  xmlhttp.open("GET","index.php?c=Capitulos&a=material&material="+str,true);
  xmlhttp.send();
}

function showLibro(str) {
    if(bandera == str){

    }else{
        if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                bandera= str;
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","index.php?c=Capitulos&a=traerLibro&material="+str,true);
        xmlhttp.send();
    }
 
}
</script>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- MDB -->
    <script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>















<?php
include_once("views/partials/footer.php");
?>