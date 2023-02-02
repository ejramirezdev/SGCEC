<?php
include("conexion_sesion.php");
include("Funciones.php");
$user_id = $mysqli->real_escape_string($_POST['user_id']);
$token = $mysqli->real_escape_string($_POST['token']);
$password = $mysqli->real_escape_string($_POST['password']);
$_password = $mysqli->real_escape_string($_POST['_password']);

if(ValidarPassword($password,$_password)){
    $pass_hash = $password;


 $cambiaestado="UPDATE `administradores` SET `contrasena`='$pass_hash' WHERE token_password='$token'" ;

   $run=$mysqli->query($cambiaestado);
 
         echo "<script language='javascript'>alert('Password Modificado Correctamente');window.location='login.html';</script>";  

}else{
    echo "<script language='javascript'>alert('Las contraseñas no coinciden');</script>";
    
}



?>