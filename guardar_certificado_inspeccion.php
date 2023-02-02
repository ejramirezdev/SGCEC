<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
    
$ti = $_POST["ti"];
$codigo = $_POST["codigo"];
$cliente = $_POST["cliente"];
$fi = $_POST["fi"];
$ei = $_POST["ei"];
$fec = $_POST["fec"];
$fvc = $_POST["fvc"];
$fac = $_POST["fac"];
$va = $_POST["va"];
$observaciones = $_POST["observaciones"];



//Consulta para insertar
$insertar = "INSERT INTO certificadosinspeccion(ti, codigo, cliente, fi, ei, fec, fvc, fac, va, observaciones) VALUES ('$ti', '$codigo', '$cliente', '$fi', '$ei', '$fec', '$fvc', '$fac', '$va', '$observaciones')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	header("location: tabla_certificado_inspeccion.php");	
}

//Cerrar conexion
mysqli_close($conexion);