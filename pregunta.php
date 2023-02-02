<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pregunta</title>
<link href="estilo_pregunta.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
<?php
	session_start();
	
	if(isset($_SESSION['usuario'])){
		echo "<a href='cerrar_sesion.php'></a>";
	}
	else{
		header("Location: login.html");
	}
?>

<table align="right">
	<tr>
        <td>
			<div id="mostrar" align="right">
				<form action="tabla_cursos_zoom.php" method="post">
    				<input type="submit" class="btn btn-primary" value="Cursos Zoom">
    			</form>
			</div>
		</td>
        <td>
			<div id="mostrar" align="right">
				<form action="tabla_cursos_gratis.php" method="post">
    				<input type="submit" class="btn btn-primary" value="Cursos Gratis">
    			</form>
			</div>
		</td>
		<td>
			<div id="mostrar" align="right">
				<form action="tabla_msj_frm_cliente.php" method="post">
    				<input type="submit" class="btn btn-primary" value="Mensaje F. Cliente">
    			</form>
			</div>
		</td>
		<td>
			<div id="mostrar" align="right">
				<form action="tabla_contactenos.php" method="post">
    				<input type="submit" class="btn btn-primary" value="Mensaje Contáctenos">
    			</form>
			</div>
		</td>
		<td>
			<div id="cerrar">
				<form action="cerrar_sesion.php" method="post">
					<input type="submit" class="btn btn-primary" value="Cerrar Sesión">
				</form>
			</div>
		</td>
	</tr>
</table><br>

<!-- six_box-->
<div id="about" class="about top_layer">
                 
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/Mult_usuarios.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">ADMINISTRADORES</h5>
                        <a href="registro_administradores.php" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/emp_certificada.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">EMPRESAS CERTIFICADAS</h5>
                        <a href="registro_empresa_certificada.php" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/certif_inspeccion.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">CERTIF.INSPECCION</h5>
                        <a href="registro_certificado_inspeccion.php" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>

        </div><br>

        <div class="row">
            
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/insp_vehi.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">INSPECCION VEHICULAR</h5>
                        <a href="registro_insp_vehicular.php" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="images/multipless-usuarios.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">PERSONAL SGCEC</h5>
                        <a href="#" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="images/clientes_certificados.jpg" class="card-img-top" alt="100">
                    <div class="card-body">
                        <center><h5 class="card-title">CLIENTES CERTIFICADOS</h5>
                        <a href="registro_certificado.php" class="btn btn-primary">Ingresar</a></center>
                    </div>
                </div>
            </div>

        </div><br><br>

    </div>
</div>
<!-- end six_box-->

<script>
window.onload = function(){killerSession();}
function killerSession(){
setTimeout("window.open('validandosesion.php','_top');",100000000);
}</script>

</body>
</html>