<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$nombres = $_POST["nombres"];
$cedula = $_POST["cedula"];
$cargo = $_POST["cargo"];	
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$rsocial = $_POST["rsocial"];
$ruc = $_POST["ruc"];
$fax = $_POST["fax"];
$direccion = $_POST["direccion"];
$ret = $_POST["ret"];
$ncurso = $_POST["ncurso"];
$inversion = $_POST["inversion"];
$ejecutivo = $_POST["ejecutivo"];
$pagos = $_POST["pagos"];


//Consulta para insertar
$insertar = "INSERT INTO registrozoom(nombres, cedula, cargo, email, telefono, rsocial, ruc, fax, direccion, ret, ncurso, inversion, ejecutivo, pagos) VALUES ('$nombres', '$cedula', '$cargo', '$email', '$telefono', '$rsocial', '$ruc', '$fax', '$direccion', '$ret', '$ncurso', '$inversion', '$ejecutivo', '$pagos')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: eventos.php");	
}

//Cerrar conexion
mysqli_close($conexion);