<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
       
    </div>
    <div class="row m-3">
        <h1>Lista de Usuarios Registrados</h1>
    </div>


    <div class="row m-3 ">

    <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">id</th>
                    <th scope="col">cedula</th>
                    <th scope="col">nombre 1</th>
                    <th scope="col">apellido 1</th>
                    <th scope="col">telefono</th>
                    <th scope="col">empresa</th>
                    <th scope="col">correo</th>
                    <th scope="col">ID pago</th>
                    <th scope="col">ID curso</th>
                    <th scope="col">Operaciones</th>

                </tr>
            </thead>
           


            <tbody>
            <?php  
            if (empty($usuarios)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     
                </tr>
            <?php
               
            }
                foreach ($usuarios as $usuario){ ?>

                <tr>
                    <th scope="row"><?php  echo $usuario->id; ?></th>
                    <td><?php  echo $usuario->cedula; ?></td>
                    <td><?php  echo $usuario->nombre1; ?></td>
                    <td><?php  echo $usuario->apellido1; ?></td>
                    <td><?php  echo $usuario->telefono; ?></td>
                    <td><?php  echo $usuario->empresa; ?></td>
                    <td><?php  echo $usuario->correo; ?></td>
                    <td><?php  echo $usuario->pagoid; ?></td>
                    <td><?php  echo $usuario->id_curso_online; ?></td> 

                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos de Curso (nombre, desc, costo, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        
                            
                        <a href="index.php?c=Certificado&a=crear&idUsuario=<?php echo $usuario->id; ?>&idCurso=<?php echo $usuario->id_curso_online ?>" class="btn btn-primary">Generar Certificado</a>

                        <a type="button" class="m-1 btn btn-danger btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Eliminar Usuario"
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