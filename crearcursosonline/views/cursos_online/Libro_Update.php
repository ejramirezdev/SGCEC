<?php
include_once("views/partials/header.php");
?>
<br><br><br>
ACTUALIZAR Libro
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Libro&a=UpdateLibro" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            value="<?php  echo $libro->nombre  ?>"
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
            id="pdf_url"
            name="pdf_url"
            value="<?php  echo $libro->pdf_url  ?>"
            required
        />
        <label for="pdf_url" class="form-label">Frame</label>
        </div>
    </div>
    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="idCurso"
            name="idCurso"
            value="<?php  echo $libro->id_capacitacion_online  ?>"
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
            id="idLibro"
            name="idLibro"
            value="<?php  echo $libro->id  ?>"
            required
        />
        <label for="idLibro" class="form-label">ID Curso</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="routeIMG"
            name="routeIMG"
            value="<?php  echo $libro->routeIMG  ?>"
            required
        />
        <label for="routeIMG" class="form-label">Img</label>
        </div>
    </div>
   
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Libro&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Actualizar Libro</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>