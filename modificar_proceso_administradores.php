<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];
$cedula = $_POST["cedula"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$privilegio = $_POST["privilegio"];
$estado = $_POST["estado"];
//Consulta para insertar
$insertar = "UPDATE administradores SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', correo='$correo', usuario='$usuario', contrasena='$contrasena', privilegio='$privilegio', estado='$estado' WHERE id='$id'";
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