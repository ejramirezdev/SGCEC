<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO Taller
<br><br><br>
<div class="container">

<form class="row g-3" action="index.php?c=Taller&a=crearTaller" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
        
            required
        />
        <label for="nombre" class="form-label">Nombre</label>
        </div>
    </div>

    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="idCurso"
            name="idCurso"
            value="<?php  echo $idCurso;  ?>"
            required
        />
        <label for="idCurso" class="form-label">ID Curso</label>
        </div>
    </div>
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Taller&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Crear Taller</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>