<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$cedula = $_POST["cedula"];
$nombres = $_POST["nombres"];
$correo = $_POST["correo"];
$empresa = $_POST["empresa"];
$telefono = $_POST["telefono"];
$fecha = $_POST["fecha"];
$motivo = $_POST["motivo"];
//Consulta para insertar
$insertar = "INSERT INTO formulariocliente(cedula, nombres, correo, empresa, telefono, fecha, motivo) VALUES ('$cedula', '$nombres', '$correo', '$empresa', '$telefono', '$fecha', '$motivo')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: pregunta_consultas.php");	
}

//Cerrar conexion
mysqli_close($conexion);