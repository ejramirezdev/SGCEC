<?php
	session_start();
	
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];	
	
	include("conexion.php");
	
	$proceso = $conexion->query("SELECT * FROM administradores WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
	if($resultado = mysqli_fetch_array($proceso)){
		$_SESSION['usuario'] = $usuario;
		header("Location: pregunta.php");
	}
	else{
		header("Location: login.html");
	}

?>

