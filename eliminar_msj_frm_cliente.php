<?php 
	include("conexion.php");

//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];

//Consulta para insertar
$insertar = "DELETE FROM formulariocliente WHERE id='$id'";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Cambios realizados";
} else {
	header("location: tabla_msj_frm_cliente.php");
	
}
//Cerrar conexion
mysqli_close($conexion);