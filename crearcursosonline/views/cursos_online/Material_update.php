<?php
include_once("views/partials/header.php");
?>
<br><br><br>
UPDATE Material
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Material&a=updateMaterial" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="nombrePDF"
            name="nombrePDF"
            value="<?php  echo $material->nombrePDF ;  ?>"
            required
        />
        <label for="nombrePDF" class="form-label">nombrePDF</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="TipoMaterial"
            name="TipoMaterial"
            value="<?php  echo $material->TipoMaterial;  ?>"
            required
        />
        <label for="TipoMaterial" class="form-label">TipoMaterial</label>
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
   
    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="idMaterial"
            name="idMaterial"
            value="<?php  echo $material->id;  ?>"
            required
        />
        <label for="idMaterial" class="form-label">ID Material</label>
        </div>
    </div>

  <div class="col-12">
  <a type="button"  href="index.php?c=Material&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Actualizar Material</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>

