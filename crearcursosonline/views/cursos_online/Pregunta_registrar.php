<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO Pregunta
<br><br><br>
<div class="container">

<form class="row g-3" action="index.php?c=Pregunta&a=crearPregunta" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="titulo"
            name="titulo"
            value="Seleccione la respuesta correcta:"
            required
        />
        <label for="titulo" class="form-label">Titulo</label>
        </div>
    </div>

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
            id="id_test"
            name="id_test"
            
            value="<?php  echo $idTaller;  ?>"
            required
        />
        <label for="id_test" class="form-label">ID test </label>
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
        <label for="idCurso" class="form-label">ID curso </label>
        </div>
    </div>
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Taller&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Crear Pregunta</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>