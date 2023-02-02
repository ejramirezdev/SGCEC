<?php
include_once("views/partials/header.php"); 
?>
<br><br> 
<div class="container m-3">

    <div class="col m-3">
        <a type="button"   href="index.php?c=Index&a=adminCursos"  class="btn btn-primary">Volver</a>
        <a type="button" class="btn btn-success" href="index.php?c=Material&a=crearMaterialView&idCurso=<?php echo $idCurso; ?>" class="btn btn-primary">Crear nuevo Material</a>
    </div>
    <div class="row m-3">
        <h1>Lista de Materiral</h1>
    </div>


    <div class="row m-3 ">

    
    



    <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">pdf_url</th>
                    <th scope="col">id_capacitacion_online</th>
                    <th scope="col">routeIMG</th>
                </tr>
            </thead>
            <tbody>

                <?php  
            if (empty($materiales)) { ?>

                <tr>
                    <td></td>
                    <td><strong style="color:red;">No hay datos registrados</strong> </td>
                     
                </tr>
            <?php
               
            }
            foreach ($materiales as $materiale){ ?>

                <tr>
                    <th scope="row"><?php  echo $materiale->id; ?></th>
                    <td><?php  echo $materiale->nombrePDF; ?></td>
                    <td>
                        
                    <?php  echo $materiale->TipoMaterial; ?>
                      
                    </td>
                    <td> <?php echo $materiale->id_capcitacion_online; ?>  </td>
                   
                    <td>
                        <a type="button" class="m-1 btn btn-info btn-sm px-3"
                          href="index.php?c=Material&a=UpdateMaterialView&idCurso=<?php echo $idCurso; ?>&idMaterial=<?php echo $materiale->id; ?>" 
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Editar campos del material (nombre, iframe, img, etc)"
                        >
                            <i class="fas fa-pen"></i>
                        </a>
                        
                        <a type="button" class="m-1 btn btn-danger btn-sm px-3"
                         
                        data-mdb-toggle="tooltip"
                        data-mdb-placement="top"
                        title="Eliminar material"
                        >
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>

                <?php
            }   ?>

              

            </tbody>
        </table>










    </div>
    <!--
    <div class="row m-3">
        <a type="button" class="btn btn-success">Eliminar Cursos</a>

    </div> -->

</div>


<?php
include_once("views/partials/footer.php");
?>