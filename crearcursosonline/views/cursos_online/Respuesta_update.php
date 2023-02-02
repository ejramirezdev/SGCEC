<?php
include_once("views/partials/header.php");
?>
<br><br><br>
UPDATE Respuesta
<br><br><br>
<div class="container">

<form class="row g-3" action="index.php?c=Respuesta&a=UpdateRespuesta" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            value="<?php  echo $respuesta->nombre ;  ?>"
            required
        />
        <label for="nombre" class="form-label">Nombre</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="isTrue"
            name="isTrue"
            value="<?php  echo $respuesta->isTrue ;  ?>"
            required
        />
        <label for="isTrue" class="form-label">isTrue</label>
        </div>
    </div>

    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="id_pregunta"
            name="id_pregunta"
            value="<?php  echo $idPregunta;  ?>"
            required
        />
        <label for="id_pregunta " class="form-label">ID id_pregunta </label>
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
        <label for="idCurso " class="form-label">ID idCurso </label>
        </div>
    </div>
      <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="idRespuesta"
            name="idRespuesta"
            value="<?php  echo $respuesta->id ;  ?>"
            required
        />
        <label for="idRespuesta " class="form-label">ID idCurso </label>
        </div>
    </div>

    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="idTaller"
            name="idTaller"
            value="<?php  echo $idTaller;  ?>"
            required
        />
        <label for="idTaller" class="form-label">ID idTaller </label>
        </div>
    </div>
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Taller&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Actualizar Respuesta</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>