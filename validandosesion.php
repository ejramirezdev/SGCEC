<?php

SESSION_START();//Esta función nos permite obtener las variables globales

$_SESSION["ultimoingreso"]=date("Y-n-j H:i:s");
header("location:Login.html");



?>