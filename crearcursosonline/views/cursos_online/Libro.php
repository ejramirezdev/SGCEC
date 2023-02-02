<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"   href="index.php?c=Index&a=adminCursos"  class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Libro&a=crearLibroView&idCurso=<?php echo $idCurso; ?>" class="btn btn-primary">Crear nuevo Libro</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Libros</h1>
    </div>


    <div class="row m-3 ">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">pdf_url</th>
                    <th scope="col">id_capacitacion_online</th>
                    <th scope="col">routeIMG</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            if (empty($libros)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($libros as $libro){ ?>

                <tr>
                    <th scope="row"><?php  echo $libro->id; ?></th>
                    <td><?php  echo $libro->nombre; ?></td>
                    <td>
                        <div  class="overflow-auto" style="width: 200px; height: 150px;">
                            <?php  echo $libro->pdf_url; ?>
                        </div>
                    </td>
                    <td> <?php echo $libro->id_capacitacion_online; ?>  </td>
                    <td><?php  echo $libro->routeIMG; ?></td>
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                         href="index.php?c=Libro&a=UpdateLibroView&idCurso=<?php echo $libro->id_capacitacion_online; ?>&idLibro=<?php echo $libro->id; ?>" 
                        
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos del libro (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-success btn-sm px-3"
                        href="index.php?c=Indice&idCurso=<?php echo $libro->id_capacitacion_online; ?>&idLibro=<?php echo $libro->id; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar contenido del libro (indices, material, etc)"
                        >
                            <i class="fas fa-edit"></i>
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