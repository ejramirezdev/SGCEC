<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

<div class="col m-3">
        <a type="button"  href="index.php?c=UsuariosAdmin&a=crearUsuarioView" class="btn btn-success">Crear Usuario</a>
        <a type="button"  href="index.php?c=Index&a=home" class="btn btn-info">Volver</a>
        
    </div>
    <div class="row m-3">
        <h1>Lista de Usuarios Administradores</h1>
    </div>

    <div class="row m-3 ">

    <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col">cedula</th>
                    <th scope="col">usuario</th>
                    <th scope="col">estado</th>
                    <th scope="col">idPrivilegio</th>
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
                    <td><?php  echo $usuario->nombre; ?></td>
                    <td><?php  echo $usuario->correo; ?></td>
                    <td><?php  echo $usuario->cedula; ?></td>
                    <td><?php  echo $usuario->usuario; ?></td>
                    <td><?php  echo $usuario->estado; ?></td>
                    <td><?php  echo $usuario->idPrivilegio; ?></td>
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos de Curso (nombre, desc, costo, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        
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