<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];
$ruc = $_POST["ruc"];
$empresa = $_POST["empresa"];
$establecimiento = $_POST["establecimiento"];
$alcance = $_POST["alcance"];
$ncertificado = $_POST["ncertificado"];
$vcertificacion = $_POST["vcertificacion"];
$vactualizada = $_POST["vactualizada"];
$estado = $_POST["estado"];
//Consulta para insertar
$insertar = "UPDATE empresacertificada SET ruc='$ruc', empresa='$empresa', establecimiento='$establecimiento', alcance='$alcance', ncertificado='$ncertificado', vcertificacion='$vcertificacion', vactualizada='$vactualizada', estado='$estado'  WHERE id='$id'";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_empresas_certificadas.php");	
}

//Cerrar conexion
mysqli_close($conexion);