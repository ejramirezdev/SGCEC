<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="./assets/favicon.ico" href="./assets/favicon.ico" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <title>Consultas SGCEC</title>
</head>

<body>


    <?php
    $mysqli = new mysqli("localhost","w1701259_bdsgcec","PM2014gg","w1701259_bdsgcec");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

// Change character set to utf8
$mysqli -> set_charset("utf8");


    //SELECT usuario.nombre1, usuario.cedula, capacitacion_online.nombre  FROM usuario INNER JOIN capacitacion_online ON capacitacion_online.id = usuario.id_curso_online WHERE usuario.id = 88
    $sql = "SELECT usuario.nombre1, usuario.nombre2, usuario.apellido1, usuario.apellido2, usuario.telefono, usuario.cedula, capacitacion_online.nombre AS nombreCurso  FROM usuario INNER JOIN capacitacion_online ON capacitacion_online.id = usuario.id_curso_online WHERE usuario.id =".$_GET['idUsuario'];
    $result = $mysqli -> query($sql);

    // Fetch all
    $resultado = $result -> fetch_all(MYSQLI_ASSOC);
    // Free result set
    $result -> free_result();

    $mysqli -> close();
?>




    <div class="container text-center">
        <img src="./assets/images/logo.png" alt="">
        <h4>Consulta de Nuestros Usuarios Capacitados</h4>
        <hr>


        <div class="table-responsive" style="width: 500px;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Parametros</th>
                        <th scope="col">Datos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Curso: </th>
                        <td><?php echo $resultado[0]['nombreCurso']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre y Apellido</th>
                        <td><?php echo $resultado[0]['nombre1']." ".$resultado[0]['apellido1']." ".$resultado[0]['apellido2']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Telefono</th>
                        <td><?php echo $resultado[0]['telefono'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Cedula</th>
                        <td><?php echo $resultado[0]['cedula'] ?></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>

</html>