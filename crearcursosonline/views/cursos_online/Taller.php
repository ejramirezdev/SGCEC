<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"   href="index.php?c=Index&a=adminCursos"  class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Taller&a=crearTallerView&idCurso=<?php echo $idCurso; ?>" class="btn btn-primary">Crear nuevo Taller</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Talleres</h1>
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
            if (empty($talleres)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($talleres as $taller){ ?>

                <tr>
                    <th scope="row"><?php  echo $taller->id; ?></th>
                    <td><?php  echo $taller->nombre; ?></td>
                    <td> <?php echo $taller->id_capcitacion_online; ?>  </td>
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos del libro (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-success btn-sm px-3"
                        href="index.php?c=Pregunta&idCurso=<?php echo $taller->id_capcitacion_online; ?>&idTaller=<?php echo $taller->id; ?>"
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