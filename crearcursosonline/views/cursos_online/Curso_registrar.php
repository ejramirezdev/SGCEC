<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO CURSO
<br><br><br>
<div class="container">


<form class="row g-3" action="index.php?c=Curso&a=crearCurso" method="post" >

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
        id="descripcion"
        name="descripcion"
        required
      />
      <label for="descripcion" class="form-label">Descripcion</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-outline">
      <input
        type="text"
        class="form-control"
        id="objetivos"
        name="objetivos"
        required
      />
      <label for="objetivos" class="form-label">Objetivos</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-outline">
      <input
        type="text"
        class="form-control"
        id="costo"
        name="costo"
        required
      />
      <label for="costo" class="form-label">Costo</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-outline">
      <input
        type="text"
        class="form-control"
        id="img"
        name="img"
        required
      />
      <label for="img" class="form-label">Nombre Imagen</label>
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-outline">
      <input
        type="number"
        class="form-control"
        id="estado"
        name="estado"
        required
      />
      <label for="estado" class="form-label">Estado</label>
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Crear Curso Online</button>
  </div>

</form>






















</div>




<?php
include_once("views/partials/footer.php");
?>