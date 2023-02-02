<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"  href="index.php?c=Libro&idCurso=<?php echo $idCurso; ?>" class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Indice&a=crearIndiceView&idCurso=<?php echo $idCurso; ?>&idLibro=<?php echo $idLibro; ?>" class="btn btn-primary">Crear nuevo Indice</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Indice</h1>
    </div>


    <div class="row m-3 ">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">num_seccion</th>
                    <th scope="col">nombre</th>
                    <th scope="col">id_libro</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            if (empty($indices)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($indices as $indice){ ?>

                <tr>
                    <th scope="row"><?php  echo $indice->id; ?></th>
                    <td><?php  echo $indice->num_seccion; ?></td>
                    <td>
                      
                            <?php  echo $indice->nombre; ?>
                        
                    </td>
                    <td> <?php echo $indice->id_libro; ?>  </td>
                  
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
  href="index.php?c=Indice&a=UpdateIndiceView&id=<?php echo $indice->id; ?>&idCurso=<?php echo $idCurso; ?>"
                        title="Editar campos del libro (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                       
                        <a type="button" class="m-1 btn btn-danger btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Eliminar libro"
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