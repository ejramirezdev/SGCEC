<?php
include_once("views/partials/header.php");
?>
<br><br><br>
EDIT Indice
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Indice&a=UpdateIndice&idCurso=<?php echo $idCurso;?>&idLibro=<?php echo $indice->id_libro; ?>" method="post" >

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="num_seccion"
            name="num_seccion"
            value="<?php echo$indice->num_seccion; ?>"
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
            value="<?php echo$indice->nombre; ?>"
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
            value="<?php echo $indice->id_libro; ?>"
            required
        />
        <label for="id_libro" class="form-label">id_libro</label>
        </div>
    </div>
    <div class="col-md-4" style="display:none">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="id_Indice"
            name="id_Indice"
            value="<?php echo $indice->id; ?>"
            required
        />
        <label for="id_Indice" class="form-label">id_Indice</label>
        </div>
    </div>
    
      

  <div class="col-12">
  <a type="button"  href="index.php?c=Indice&idCurso=<?php echo $idCurso;?>&idLibro=<?php echo $indice->id_libro;?>" class="btn btn-primary">Volver</a>
    <button class="btn btn-success" type="submit">Crear Indice</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>