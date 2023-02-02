<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"  href="index.php?c=Taller&idCurso=<?php echo $idCurso ?>" class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Pregunta&a=crearPreguntaView&idCurso=<?php echo $idCurso; ?>&idTaller=<?php echo $idTaller; ?>" class="btn btn-primary">Crear nueva Pregunta</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Preguntas</h1>
    </div>


    <div class="row m-3 ">
 

    <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">ID curso</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            if (empty($preguntas)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($preguntas as $pregunta){ ?>

                <tr>
                    <th scope="row"><?php  echo $pregunta->id; ?></th>
                    <td><?php  echo $pregunta->titulo; ?></td>
                    <td> <?php echo $pregunta->nombre; ?>  </td>
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
 href="index.php?c=Pregunta&a=updatePreguntaView&idCurso=<?php echo $idCurso; ?>&idPregunta=<?php echo $pregunta->id; ?>&idTaller=<?php echo $pregunta->id_test; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos del pregunta (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-success btn-sm px-3"
                        href="index.php?c=Respuesta&idCurso=<?php echo $idCurso; ?>&idPregunta=<?php echo $pregunta->id; ?>&idTaller=<?php echo $pregunta->id_test; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar/Agregar contenido del Taller (preguntas,respuestas etc)"
                        >
                            <i class="fas fa-edit"></i>
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