
<?php require_once 'views/partials/header.php'; ?>



<div class="container">
    

  
 

    <?php if( strcmp($aprobado, "Reprobado") === 0){ ?>

        <div class="alert alert-warning">
           No te rindas! <a href="index.php?c=Capitulos&a=index" class="alert-link">Volver a intentar</a>.
        </div>
        <?php
    }else{ ?>

        <div class="alert alert-success">
           <b>Feliciades!</b>  
        </div>
        <a href="index.php?c=Certificados&a=crear" class="btn btn-primary">Generar Certificado</a>

<?php
    } ?>

    
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Respuestas Correctas</th>
          <th>Respuestas Incorrectas</th>
          <th>Nota</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td> <?php echo $acertadas; ?>  </td>
          <td> <?php echo $incorrectas; ?>   </td>
          <td><?php echo $promedio; ?> / 10  </td>
          <td> <?php echo $aprobado; ?> </td>
           
        </tr>
      </tbody>
    </table>
  </div>


<!-- <button class="btn btn-primary" >Generar Certificado</button> -->



</div>


<?php
include_once("views/partials/footer.php");
?>

