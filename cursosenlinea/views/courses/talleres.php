<?php require_once 'views/partials/header.php'; ?>
<br><br><br>
<!--========================================================
                          CONTENT
=========================================================-->
<form name="test1" action="index.php?c=Capitulos&a=calificar" method="POST" style="
">

    <div class="container ">

        <!-- cartas -->

        <?php
    // echo rand(0, sizeof($preguntas));
        
        $idCursosArray = array(); // creamos un array 

        foreach($preguntas as $pregunta){
        
            array_push($idCursosArray,$pregunta->id);// guardamos en un array los id de los cursos
        
        }

        $random_keys=array_rand($idCursosArray,12); // tenemos id ramdum acorde a la mitad de los id
        
        
    

    for ($i=0; $i < sizeof($random_keys) ; $i++) { // recorremos el array de los id aletorios
    
        $idAlertorio =  $idCursosArray[$random_keys[$i]];// almacenamos el id recorrido del array aletorio @-@

        foreach($preguntas as $pregunta ){// recorremos todas las preguntas existentes para buscar el id correspondiente 

            if($pregunta->id === $idAlertorio){  ?>


        <!-- carta -->
        <div class='card bg-white text-black rounded-3 shadow  bg-body rounded'>
            <div class='card-body text-white p-3' style="background-color:#1D1F3B ;"> <b>
                    <?php echo (intval( $i )+ 1).")";  ?>  <?php echo $pregunta->nombre; ?> </b></div> <br>
            <div class='card-body pt-0 pb-3 rounded-3 pl-3'> <?php echo $pregunta->titulo; ?>: </div>

            <div style='padding-left:15px; padding-bottom:25px;'>


                <?php  
            foreach ($respuestas as $respuesta) {  // como lo unimos con push ahora tenemos un arreglo de arreglos de objetos
                
                foreach ($respuesta as $literales) { // recorremos cada arreglo de objetos y ahora si tenemos las respuestas

                        if($literales->id_pregunta == $pregunta->id ){ ?>

                <label>
                    <input style="margin: 10px ;" type='radio' id='<?php echo $literales->id; ?>'
                        name="preg_<?php echo $pregunta->id; ?>" required value="<?php echo $literales->id; ?>">
                    <?php echo $literales->nombre; ?>
                </label>
                <br>

                <?php
                        }
                }
    
    
            ?>
                <?php
            }
            ?>

            </div>
        </div>
        <br>
        <!-- fin carta -->
        <?php
            }
           
            
        }
        
    }

?>


    </div> <!-- fin cartas` -->




    </div>


   <center><input type="submit" class="btn btn-success btn-lg" value="Finalizar"></center><br><br>
</form>









<?php
include_once("views/partials/footer.php");
?>