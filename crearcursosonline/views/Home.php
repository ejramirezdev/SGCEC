<?php
include_once("views/partials/header.php"); 
?>

<div class="container m-3">
<br>
    <div class="col m-3">
        <a type="button" href="index.php?c=Index&a=adminCursos" class="btn btn-success">Cursos en Linea</a>
    </div>
    
    <div class="col m-3">
        <a type="button" href="index.php?c=Index&a=adminUsuarios" class="btn btn-success">Usuarios Capacitados</a>
    </div>

    <div class="col m-3">
        <a type="button" href="index.php?c=Index&a=usuarios_admin" class="btn btn-success">Administradores</a>
    </div>
 <div class="col m-3">
        <a type="button" href="index.php?c=Index&a=cerrar_session" class="btn btn-success">Cerrar Session</a>
    </div>
</div>


<?php
include_once("views/partials/footer.php");
?>