<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
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

if($_FILES["archivo"]){
	$nombre_base = basename($_FILES["archivo"]["name"]);
	$nombre_final = date("d-m-y"). "-". date("H-i-s"). "-" . $nombre_base;
	$ruta = "certificados/" . $nombre_final;
	$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
	if($subirarchivo){
		$insertSQL = "INSERT INTO inspvehicular(inspeccion, codigo, cliente, placa, finspeccion, einspectores, expcertificado, vigcertificado, actcertificado, viganios, observacion, archivo) 
		VALUES ('$inspeccion', '$codigo', '$cliente', '$placa', '$finspeccion', '$einspectores', '$expcertificado', '$vigcertificado', '$actcertificado', '$viganios', '$observacion', '$ruta')";
		$resultado = mysqli_query($conexion, $insertSQL);
		if($resultado){
			echo "<script>alert('Se ha enviado su informe'); window.location='tabla_inspeccion_veh.php'</script>";
		} else {
			printf("Errormessage: %s\n", mysqli_error($conexion));
		}
	}
} else {
	echo "Error al subir archivo";
}