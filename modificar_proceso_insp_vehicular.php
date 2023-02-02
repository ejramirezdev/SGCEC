<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$id=$_REQUEST['id'];
$inspeccion = $_POST["inspeccion"];
$codigo = $_POST["codigo"];
$cliente = $_POST["cliente"];
$placa = $_POST["placa"];
$finspeccion = $_POST["finspeccion"];
$einspectores = $_POST["einspectores"];
$expcertificado = $_POST["expcertificado"];
$vigcertificado = $_POST["vigcertificado"];
$actcertificado = $_POST["actcertificado"];
$viganios = $_POST["viganios"];
$observacion = $_POST["observacion"];
//Consulta para insertar
$insertar = "UPDATE inspvehicular SET inspeccion='$inspeccion', codigo='$codigo', cliente='$cliente', placa='$placa', finspeccion='$finspeccion', 
einspectores='$einspectores', expcertificado='$expcertificado', vigcertificado='$vigcertificado', actcertificado='$actcertificado', viganios='$viganios', 
observacion='$observacion' WHERE id='$id'";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_inspeccion_veh.php");	
}

//Cerrar conexion
mysqli_close($conexion);