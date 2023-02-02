<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO Libro
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Libro&a=crearLibro" method="post" >

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
    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="pdf_url"
            name="pdf_url"
        
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
            value="<?php  echo $idCurso;  ?>"
            required
        />
        <label for="idCurso" class="form-label">ID Curso</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="routeIMG"
            name="routeIMG"
        
            required
        />
        <label for="routeIMG" class="form-label">Img</label>
        </div>
    </div>
   
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Libro&idCurso=<?php echo $idCurso;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Crear Libro</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>