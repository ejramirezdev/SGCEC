<?php
include("conexion_sesion.php");
include("Funciones.php");

$errors=array();

if(!empty($_POST))
{
    
    $email = $mysqli->real_escape_string($_POST['email']);
  
    if(!IsEmail($email))
    {
        $errors[]="Debe ingresar un correo electronico valido";
    }
        if(emailExiste($email))
        {
           $user_id= GetValores('id','correo',$email);
           $nombre= GetValores('nombres','correo',$email);
            echo 'user_id';
           $token=GenerarTokenPass($user_id);

           $url='http://'.$_SERVER["SERVER_NAME"].'/cambia_pass.php?$user_id='.$user_id.'&token='.$token;
           $asunto="Hola $nombre: <br/><br/>Se ha solicitado un reinicio de password.<br/><br/>PAra Restaurar el password, visita
           la siguiente link:<a href='$url' > Cambiar contraseña</a>";

           if (enviarEmail($email,$nombre,$asunto,$cuerpo))
           {
                echo"Hemos enviado un correo a la direccion$email para restablecer
                tu password.<br/>";
                echo "<a href='login.html'>Inisiar Sesion</a>";
                exit;
           }else{
            $errors[]="Error al enviar el Email";
           }
        }
           else
             {
            $errors[]="No existe el correo electronico";
             }
        
    
}

?>