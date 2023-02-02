<?php
	include ("conexion.php");
//Recibir los datos y almacenarlos en variables
$cedula = $_POST["cedula"];
$nombres = $_POST["nombres"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$empresa = $_POST["empresa"];
$ncurso = $_POST["ncurso"];
//Consulta para insertar
$insertar = "INSERT INTO formulario_cursos(cedula, nombres, direccion, telefono, email, empresa, ncurso) VALUES ('$cedula', '$nombres', '$direccion', '$telefono', '$email', '$empresa', '$ncurso')";
//Ejecutar consulta
$conexion = mysqli_connect("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
	echo "Error al guardar";
} else {
	echo '<script language="javascript">alert("Gracias por su Inscripción. Le recordamos que al finalizar el curso, el costo del certificado tendrá un valor de $5 / Huella de Carbono $10");window.location.href="eventos_gratuitos.php"</script>';	
}

//Cerrar conexion
mysqli_close($conexion);