<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultar Certificado</title>
    <link rel="stylesheet" href="css/consulta.css" />
  </head>
  <body>
    <div class="header">
      <a href="index.html"><img src="./images/logo.png" /></a>
    </div>
    <form action="" method="post">
    <div class="form-group">
      <label for="cedula">Ingrese su número de cédula:</label>
      <input type="text" id="cedula" name="cedula"/>
      <input type="submit" value="Consultar"/>
    </div>
  </form>
    <div class="resultados">
      <?php
        if (isset($_POST["cedula"])) {
            // Conectarse a la base de datos
            $host = "hostname";
            $user = "username";
            $password = "password";
            $dbname = "database_name";

            // Crear conexión
            $conn = mysqli_connect($host, $user, $password, $dbname);

            // Verificar conexión
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Escribir consulta
            $sql = "SELECT * FROM table_name WHERE cedula = '" . $_POST["cedula"] . "'";

            // Ejecutar consulta
            $result = mysqli_query($conn, $sql);

            // Obtener resultados
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "Nombre: " . $row["nombre"]. " - Certificado: " . $row["certificado"]. "<br>";
                }
            } else {
                echo "No se encontraron resultados para esa cédula.";
            }

            // Cerrar conexión
            mysqli_close($conn);
        }
      ?>
    </div>
    <div class="footer">
      <p>Contacto: correo@empresa.com - Teléfono: 1234567890</p>
</div>
  </body>
</html>


