<?php 
	include("conexion.php");

//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];

//Consulta para insertar
$insertar = "DELETE FROM personal WHERE id='$id'";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Cambios realizados";
} else {
	header("location: tabla_reg_personal.php");
	
}
//Cerrar conexion
mysqli_close($conexion);