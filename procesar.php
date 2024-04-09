<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener datos del formulario
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $nota1 = floatval($_POST['nota1']);
    $nota2 = floatval($_POST['nota2']);
    $nota3 = floatval($_POST['nota3']);

    // Calcular el promedio
    $promedio = round(($nota1 + $nota2 + $nota3) / 3, 1);

    // Insertar datos en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO estudiantes (nombre, nota1, nota2, nota3, promedio)
            VALUES ('$nombre', $nota1, $nota2, $nota3, $promedio)";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Registro exitoso";
        echo "<script>
            setTimeout(function() {
                document.getElementById('mensaje').innerHTML = '';
            }, 3000); // Desaparecer el mensaje después de 3 segundos
        </script>";
        echo "<script>window.location.href =  'index.php';</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registro de notas</h2>
        <a href="formulario.php" class="btn btn-primary mb-3">Nuevo registro</a>
        <div id="mensaje" class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Promedio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí va el código PHP para mostrar los registros de la base de datos -->
            </tbody>
        </table>
    </div>
</body>
</html>