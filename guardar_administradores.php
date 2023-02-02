<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$cedula = $_POST["cedula"];	
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$privilegio = $_POST["privilegio"];
$estado = $_POST["estado"];
//Consulta para insertar
$insertar = "INSERT INTO administradores(cedula, nombres, apellidos, correo, usuario, contrasena, privilegio, estado) VALUES ('$cedula', '$nombres', '$apellidos', '$correo', '$usuario', '$contrasena', '$privilegio', '$estado')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_administradores.php");	
}

//Cerrar conexion
mysqli_close($conexion);