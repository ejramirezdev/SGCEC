<?php require_once 'views/partials/header.php'; ?>


  <!-- Font Awesome -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
 


<div class="container-fluid">
<?php $hoy = date('y-m-j');      ?>
    <div class="h-100 d-flex flex-column justify-content-center align-items-center ">
        <div style="padding:30px; margin: 60px; max-width:550px; border-radius: 25px;
      -webkit-box-shadow: 0px 5px 25px 5px rgba(0,0,0,0.08); 
box-shadow: 0px 5px 25px 5px rgba(0,0,0,0.08);" >

        <form class="row g-3 needs-validation"  novalidate action="index.php?c=Restarpass&a=restablecer" method="POST">

            <h5>Recuperar contraseña</h5>


              <div class="col-md-6">
                <div class="form-outline">
                <input
                    type="text"
                    class="form-control"
                    id="cedula" name="cedula"
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom01" class="form-label">Ingrese su Cedula</label>
                </div>
                
              </div>
              
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                  type="text"
                  class="form-control"
                    id="nombre1" name="nombre1" 
                    required
                    />
                    <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Primer Nombre</label>
                </div>
              </div>
              
              
          
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                    type="text"
                    class="form-control"
                    id="nombre2" name="nombre2" 
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Segundo Nombre</label>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-outline">
                  <input
                    type="text"
                    class="form-control"
                    id="apellido1" name="apellido1"
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Primer Apellido</label>
                </div>
              </div>           

              
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                    type="text"
                    class="form-control"
                    id="apellido2" name="apellido2"
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Segundo Apellido</label>
                </div>
              </div> 
              
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                    type="text"
                    class="form-control"
                    id="usuario" name="usuario" 
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Usuario</label>
                </div>
              </div> 
              
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                  type="password" 
                    class="form-control"
                    id="pass1" name="pass1"
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Ingrese Nueva Contraseña</label>
                </div>
              </div> 
              <div class="col-md-6">
                <div class="form-outline">
                  <input
                  type="password" 
                    class="form-control"
                    id="pass2" name="pass2"
                    required
                  />
                  <div class="invalid-feedback">El campo es requerido.</div>
                  <label for="validationCustom02" class="form-label">Repita la Nueva Contraseña</label>
                </div>
              </div> 
              
              
              <div class="col-md-6">
                <div class="form-outline">
                  
                  <input
                    type="password" 
                    class="form-control"
                    id="curso" name="curso" 
                    style="display:none;" value="<?php echo $id_curso; ?>"
                    required
                  />
                  
                  <div class="invalid-feedback">El campo es requerido.</div>
                   
                </div>
              </div>

<!-- AQUI HACER UN VARDUMP DE LOS DATOS QUE ESTAS RECIBIENDO AL PARECER LO MANDA A OTRO CURSO -->









  
  <div class="col-12">
    
    
    <div class="col-6">
      <button class="btn btn-primary ml-4" type="submit">Restablecer Contraseña!</button>

    </div>
<br>
    <div class="col-6">

      <a href="index.php?c=Auth&a=index&id=<?php echo $id_curso ?>" class="btn btn-info">Volver</a>
    </div>
      
  
    
  </div>
</form>

             






        </div>
    </div>


<!-- MDB -->
<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();

</script>


</div>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
  










</div>








 


<?php
include_once("views/partials/footer.php");
?>