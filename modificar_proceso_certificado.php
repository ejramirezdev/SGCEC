<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];
$cedula = $_POST["cedula"];
$nya = $_POST["nya"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$empresa = $_POST["empresa"];
$tcurso = $_POST["tcurso"];
$fcert = $_POST["fcert"];
$femision = $_POST["femision"];
$fvigencia = $_POST["fvigencia"];
//Consulta para insertar
$insertar = "UPDATE certificacionpersonas SET cedula='$cedula', nya='$nya', correo='$correo', direccion='$direccion', telefono='$telefono', 
empresa='$empresa', tcurso='$tcurso', fcert='$fcert', femision='$femision', fvigencia='$fvigencia' WHERE id='$id'";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_certificado.php");	
}

//Cerrar conexion
mysqli_close($conexion);