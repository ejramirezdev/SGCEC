<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$cedula = $_POST["cedula"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$empresa = $_POST["empresa"];
$estado = $_POST["estado"];

//Consulta para insertar
$insertar = "INSERT INTO personal(cedula, nombres, apellidos, correo, telefono, direccion, empresa, estado) 
	VALUES ('$cedula', '$nombres', '$apellidos', '$correo', '$telefono', '$direccion', '$empresa', '$estado')";

//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_reg_personal.php");	
}

//Cerrar conexion
mysqli_close($conexion);