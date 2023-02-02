<?php
include_once("views/partials/header.php");
?>
<br><br><br>
REGISTRO Usuario
<br><br><br>
<div class="container">

<form class="row g-3 d-block" action="index.php?c=UsuariosAdmin&a=crearUsuario" method="post" >

    <div class="col-md-4 ">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
        
            required
        />
        <label for="nombre" class="form-label">Nombres</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="correo"
            name="correo"
        
            required
        />
        <label for="correo" class="form-label">correo</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="cedula"
            name="cedula"
        
            required
        />
        <label for="cedula" class="form-label">cedula</label>
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="usuario"
            name="usuario"
        
            required
        />
        <label for="usuario" class="form-label">usuario</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="password"
            name="password"
        
            required
        />
        <label for="password" class="form-label">password</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="text"
            class="form-control"
            id="estado"
            name="estado"
        
            required
        />
        <label for="estado" class="form-label">estado</label>
        </div>
    </div>
  

    <div class="col-md-4">
        <div class="form-outline">
        <input
            type="number"
            class="form-control"
            id="idPrivilegio"
            name="idPrivilegio"
        
            required
        />
        <label for="idPrivilegio" class="form-label">idPrivilegio</label>
        </div>
    </div>
  

  <div class="col-12">

    <button class="btn btn-success" type="submit">Crear Usuario</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>