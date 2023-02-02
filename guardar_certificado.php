<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$cedula = $_POST["cedula"];
$nya = $_POST["nya"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$empresa = $_POST["empresa"];
$fcert = $_POST["fcert"];
$tcurso = $_POST["tcurso"];
$femision = $_POST["femision"];
$fvigencia = $_POST["fvigencia"];


if($_FILES["archivo"]){
	$nombre_base = basename($_FILES["archivo"]["name"]);
	$nombre_final = date("d-m-y"). "-". date("H-i-s"). "-" . $nombre_base;
	$ruta = "certificados/" . $nombre_final;
	$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
	if($subirarchivo){
		$insertSQL = "INSERT INTO certificacionpersonas(cedula, nya, correo, direccion, telefono, empresa, fcert, tcurso, femision, fvigencia, archivo) VALUES ('$cedula', 
		'$nya', '$correo', '$direccion', '$telefono', '$empresa', '$fcert', '$tcurso', '$femision', '$fvigencia', '$ruta')";
		$resultado = mysqli_query($conexion, $insertSQL);
		if($resultado){
			echo "<script>alert('Se ha enviado su informe'); window.location-'index.html'</script>";
		} else {
			printf("Errormessage: %s\n", mysqli_error($conexion));
		}
	}
} else {
	echo "Error al subir archivo";
}
