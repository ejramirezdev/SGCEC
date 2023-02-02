<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$nombres = $_POST["nombres"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$fecha = $_POST["fecha"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];
//Consulta para insertar
$insertar = "INSERT INTO contactenos(nombres, direccion, ciudad, fecha, email, telefono, mensaje) VALUES ('$nombres', '$direccion', '$ciudad', '$fecha', '$email', '$telefono', '$mensaje')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: contact.html");	
}

//Cerrar conexion
mysqli_close($conexion);