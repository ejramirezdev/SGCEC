<?php
include("conexion_sesion.php");

        


function campoRequerido($nombres,$apellidos, $contrasena, $con_contrasena, $correo)
{
    if(strlen(trim($nombres)) <1 || strlen(trim($apellidos)) <1 || strlen(trim($contrasena)) <1 || strlen(trim($con_contrasena)) <1 || strlen(trim($correo)) <1)
    {
        return true;
    }else{
        return false;
    }
}

function IsEmail($correo)
{
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }


function ValidarPassword($valor1, $valor2)
{
    if(strcmp($valor1, $valor2)!==0){
        return false;
    }else{
        return true;
    }
}



function CorreoExiste($correo)
{
    global $mysqli;
    $stmt=$mysqli->prepare('SELECT * FROM `administradores` WHERE correo = ?');
    $stmt->bind_param('s', $correo);
    $stmt->execute();
    $stmt->store_result();
    $num=$stmt->num_rows;
    $stmt->close();
    if ($num>0){
        return true;
    }else{
        
        return false;
    }
}


 function GetValores($campo,$campoWhere, $valor)
    {
     global $mysqli;
    $stmt = $mysqli->prepare("SELECT $campo FROM administradores WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
 }

 function GenerarTokenPass($id)
    {
     global $mysqli;
     $token = GenerarToken();
		
		$stmt = $mysqli->prepare("UPDATE administradores SET token_password=?, password_request=1 WHERE id = ?");
		$stmt->bind_param('ss', $token, $id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
    }

function GenerarToken(){
    $gen =md5(uniqid(mt_rand(), false));
    return $gen;
    }


function hashPassword($password){
        $hash=password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }

function resultBlock($errors){
    if (count($errors)>0)
    {
        echo "<div id='error' class='alert alert-danger' role='alert'><a href='#' onclick=\"showHide('error');\">[X]</a>
        <ul>";
        foreach($errors as $error)
        {
            echo"<li>".$error."</li>";
        }
        "<ul>";
        "<div>";
        
    }
}


function RegistrarAdministrador($nombres,$apellidos,$correo,$contrasena_hash,$activa,$token){
    global $mysqli;
    
    
    $stmt= $mysqli->prepare("INSERT INTO `administradores` (`id`,`nombres`, `apellidos`, `correo`, `contrasena`, `activacion`, `token`)VALUES(0,?,?,?,?,?,?)");
    $stmt->bind_param("ssssis",$nombres ,$apellidos ,$correo ,$contrasena_hash,$activa ,$token);
  

    if($stmt->execute()){
        return $mysqli->insert_id;
    }else{
         //printf("Errormessage: %s\n", $mysqli->error);
          $error = $mysqli->errno . ' ' . $mysqli->error;
            echo $error;
        return 0;
    }
}



function EnviarEmail($correo, $nombres,$url){
   include('PHPMailer/class.phpmailer.php');
include ('PHPMailer/class.smtp.php');
    

$para = $correo;

$mensaje = "Estimado $nombres:<br/><br/>Para continuar con el proceso de registro, es indispensable de click en el singuiente link <a href='$url'>Activar Cuenta</a>";; //Mensaje de 2 lineas
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Cambio Password <sgcec.ecuador@sgcec.net>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

mail($para, $mensaje, $headers);

  
 


}
function EnviarEmailOlvideContrasena($correo, $nombres,$asunto,$url){
   include('PHPMailer/class.phpmailer.php');
include ('PHPMailer/class.smtp.php');
    

$para = $correo;
$titulo = $asunto;
$mensaje = "Hola $nombres: <br/><br/>Se ha solicitado un reinicio de password.<br/><br/>Para Restaurar el password, visita
           la siguiente link:<a href='$url' > Cambiar contraseña</a>"; //Mensaje de 2 lineas
$cabeceras = 'From: webmaster1@midominio.com' . "\r\n" . //La direccion de correo desde donde supuestamente se envi贸
    'Reply-To: webmaster2@midominio.com' . "\r\n" . //La direccion de correo a donde se responder谩 (cuando el recepto haga click en RESPONDER)
    'X-Mailer: PHP/' . phpversion();  //informaci贸n sobre el sistema de envio de correos, en este caso la version de PHP
// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($para, $titulo, $mensaje, $cabeceras);

}

	function login($usuario, $password)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id, id_tipo, password FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			
			if(isActivo($usuario)){
				
				$stmt->bind_result($id, $id_tipo, $passwd);
				$stmt->fetch();
				
				$validaPassw = password_verify($password, $passwd);
				
				if($validaPassw){
					
					lastSession($id);
					$_SESSION['id_usuario'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					
					header("location: welcome.php");
					} else {
					
					$errors = "La contrase&ntilde;a es incorrecta";
				}
				} else {
				$errors = 'El usuario no esta activo';
			}
			} else {
			$errors = "El nombre de usuario o correo electr&oacute;nico no existe";
		}
		return $errors;
	}
function validarToken($id, $token)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT activacion FROM administradores WHERE id = ? and token = ? LIMIT 1");
    $stmt->bind_param("is",$id, $token);
    $stmt->execute();
    $stmt->store_result();
    $num=$stmt->num_rows;
    if($num>0){
        $stmt->bind_result($activacion);
        $stmt->fetch();
        if($activo==1){
            $msg="La cuenta ya se activo anteriormente";
        }else{
            if(activarUsuario($id)){
            $msg="Cuenta Activa";
        }else{
            $msg="Error al Activar";
        }
       }
    }else{
        $msg="No Existe el registro para activar";
    }
}


function activarUSuario($id){
    global $mysqli;
    $stmt=$mysqli->prepare("UPDATE administradores SET activacion=1 WHERE id =?");
    $stmt->bind_param('s',$id);
    $result=$stmt->execute();
    $stmt->close();
    return $result;
}


function verificaTokenPass($user_id, $token){
    global $mysqli;
    $stmt=$mysqli->prepare("SELECT activacion FROM  administradores WHERE id= ? AND
     token_password =? AND password_request=1 LIMIT");
     $stmt->bind_param('is', $user_id, $token);
     $stmt->store_result();
     $num=$stmt->num_rows;
     if($num > 0){
         $stmt->bind_result($activacion);
         $stmt->fetch();
         if($activacion==1){
             return true;
         }
         else{
             return false;
         }
     }else{

     }
}

function CambiaPassword($password,$user_id,$token){
    global $mysqli;
    $stmt=$mysqli->prepare("UPDATE administradores SET contrasena=?, token_password='',password_request=0 WHERE id =? AND token_password =?");
    $stmt->bind_param('sis',$password,$user_id,$token);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
?>