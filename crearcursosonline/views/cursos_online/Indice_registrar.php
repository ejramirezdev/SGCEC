<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO Indice
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Indice&a=crearIndice&idCurso=<?php echo $idCurso;?>&idLibro=<?php echo $idLibro;?>" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="num_seccion"
            name="num_seccion"
        
            required
        />
        <label for="num_seccion" class="form-label">num_seccion</label>
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
        <label for="nombre" class="form-label">nombre</label>
        </div>
    </div>
    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="id_libro"
            name="id_libro"
            value="<?php echo $idLibro;?>"
            required
        />
        <label for="id_libro" class="form-label">id_libro</label>
        </div>
    </div>
    
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Indice&idCurso=<?php echo $idCurso;?>&idLibro=<?php echo $idLibro;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Crear Indice</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>