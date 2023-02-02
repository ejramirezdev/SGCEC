<?php
 include('conexion.php');
 $id=$_REQUEST['id'];
 $consulta=mysqli_query($conexion,"SELECT * from administradores where id='$id'");
$row=mysqli_fetch_array($consulta);


 $cedula=$row['cedula'];
 $nombres=$row['nombres'];
 $apellidos=$row['apellidos'];
 $correo=$row['correo'];
 $usuario=$row['usuario'];
 $contrasena=$row['contrasena'];
 $privilegio=$row['privilegio'];
 $estado="INACTIVO";

$ingreso=mysqli_query($conexion,"UPDATE administradores SET id='$id', cedula='$cedula',nombres='$nombres',apellidos='$apellidos',correo='$correo',usuario='$usuario',contrasena='$contrasena',privilegio='$privilegio',estado='$estado' where id='$id' ") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:tabla_administradores.php");
 ?>