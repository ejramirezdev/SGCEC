<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"  href="index.php?c=Pregunta&idCurso=<?php echo $idCurso; ?>&idPregunta=<?php echo $idPregunta;?>&idTaller=<?php echo $idTaller; ?>" class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Respuesta&a=crearRespuestaView&idCurso=<?php echo $idCurso; ?>&idTaller=<?php echo $idTaller; ?>&idPregunta=<?php echo $idPregunta; ?>" class="btn btn-primary">Crear nueva Respuesta</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Respuestas</h1>
    </div>


    <div class="row m-3 ">




    <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">isTrue</th>
                    <th scope="col">id_pregunta</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            if (empty($respuestas)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($respuestas as $respuesta){ ?>

                <tr>
                    <th scope="row"><?php  echo $respuesta->id; ?></th>
                    <td><?php  echo $respuesta->nombre; ?></td>
                    <td> <?php echo $respuesta->isTrue; ?>  </td>
                    <td> <?php echo $respuesta->id_pregunta; ?>  </td>
                    
 <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        href="index.php?c=Respuesta&a=updateRespuestaView&idCurso=<?php echo $idCurso; ?>&idTaller=<?php echo $idTaller; ?> &idRespuesta=<?php echo $respuesta->id; ?>&idPregunta=<?php echo $respuesta->id_pregunta; ?>"
                        
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos del libro (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        
                        <a type="button" class="m-1 btn btn-danger btn-sm px-3"
                         
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Eliminar Taller"
                        >
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>

                <?php
            }   ?>

              

            </tbody>
        </table>
    









    </div>
    <!--
    <div class="row m-3">
        <a type="button" class="btn btn-success">Eliminar Cursos</a>

    </div> -->

</div>


<?php
include_once("views/partials/footer.php");
?>