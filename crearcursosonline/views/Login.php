<?php
include_once("views/partials/header.php");
?>
<br><br><br>
Login Usuario
<br><br><br>
<div class="container">

<form class="row g-3 d-block" action="index.php?c=Login" method="post" >

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
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
        />
        <label for="password" class="form-label">password</label>
        </div>
    </div>

    

  <div class="col-12">

    <button class="btn btn-success" type="submit">Iniciar Session</button>
  </div>

</form>





</div>




<?php
include_once("views/partials/footer.php");
?>