<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];
$cedula = $_POST["cedula"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["telefono"];
$contrasena = $_POST["direccion"];
$privilegio = $_POST["empresa"];
$estado = $_POST["estado"];
//Consulta para insertar
$insertar = "UPDATE personal SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', correo='$correo', telefono='$telefono', direccion='$direccion', empresa='$empresa', estado='$estado' WHERE id='$id'";
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