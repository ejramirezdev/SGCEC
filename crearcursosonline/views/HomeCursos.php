<?php
include_once("views/partials/header.php"); 
?>

<div class="container m-3">
<br>
    <div class="col m-3">
        <a type="button" href="index.php?c=Curso&a=crearcursoview" class="btn btn-success">Crear nuevo Curso</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Cursos</h1>
    </div>


    <div class="row m-3 ">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">objetivos</th>
                    <th scope="col">costo</th>
                    <th scope="col">img</th>
                    <th scope="col">estado</th>
                    <th scope="col">Operacion</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            foreach ($cursos as $curso){ ?>

                <tr>
                    <th scope="row"><?php  echo $curso->id; ?></th>
                    <td><?php  echo $curso->nombre; ?></td>
                    <td><?php  echo $curso->descripcion; ?></td>
                    <td>
                        <div  class="overflow-auto" style="width: 200px; height: 150px;">

                            <?php  
                            echo $curso->objetivos;
                            ?>
                        </div>
                    </td>
                    <td><?php  echo $curso->costo; ?></td>
                    <td><?php  echo $curso->img; ?></td>
                    <td><?php  echo $curso->estado; ?></td>
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos de Curso (nombre, desc, costo, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-success btn-sm px-3"
                        href="index.php?c=Libro&idCurso=<?php echo $curso->id; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Create/View Contenido Curso (libros,indices, etc)"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-warning btn-sm px-3"
                        href="index.php?c=Taller&idCurso=<?php echo $curso->id; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Create/View Taller"
                        >
                            <i class="fas fa-file-invoice"></i>
                        </a>
                        <a type="button" class="m-1 btn btn-dark btn-sm px-3"
                        href="index.php?c=Material&idCurso=<?php echo $curso->id; ?>"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Create/View Material"
                        >
                            <i class="fas fa-file-pdf"></i>
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