<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$ruc = $_POST["ruc"];
$empresa = $_POST["empresa"];
$establecimiento = $_POST["establecimiento"];
$alcance = $_POST["alcance"];
$ncertificado = $_POST["ncertificado"];
$vcertificacion = $_POST["vcertificacion"];
$vactualizada = $_POST["vactualizada"];
$estado = $_POST["estado"];


if($_FILES["archivo"]){
	$nombre_base = basename($_FILES["archivo"]["name"]);
	$nombre_final = date("d-m-y"). "-". date("H-i-s"). "-" . $nombre_base;
	$ruta = "certificados/" . $nombre_final;
	$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
	if($subirarchivo){
		$insertSQL = "INSERT INTO empresacertificada(ruc, empresa, establecimiento, alcance, ncertificado, vcertificacion, vactualizada, estado, archivo) VALUES ('$ruc', '$empresa', '$establecimiento', '$alcance', '$ncertificado', '$vcertificacion', '$vactualizada', '$estado', '$ruta')";
		$resultado = mysqli_query($conexion, $insertSQL);
		if($resultado){
			echo "<script>alert('Se ha enviado su informe'); window.location='tabla_empresas_certificadas.php'</script>";
		} else {
			printf("Errormessage: %s\n", mysqli_error($conexion));
		}
	}
} else {
	echo "Error al subir archivo";
}