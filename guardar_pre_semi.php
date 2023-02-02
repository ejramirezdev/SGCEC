<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$cedula = $_POST["cedula"];
$nombre1 = $_POST["nombre1"];
$nombre2 = $_POST["nombre2"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$fechai = $_POST["fechai"];
$nuevafecha = strtotime ( '+30 day' , strtotime ( $fechai ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
//Consulta para insertar
$insertar = "INSERT INTO prl_semipre(cedula, nombre1, nombre2, apellido1, apellido2, correo, telefono, ciudad, direccion,  fechai, usuario, contrasena, fechav, curso, estado_pre) VALUES ('$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$correo', '$telefono', '$ciudad', '$direccion', '$fechai', '$usuario', '$contrasena', '$nuevafecha','Semi_presencial','1')";

//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: pre_semipresencial.php");	
}

//Cerrar conexion
mysqli_close($conexion);