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
                <?php
                include 'db_config.php';

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM estudiantes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["nota1"] . "</td>";
                        echo "<td>" . $row["nota2"] . "</td>";
                        echo "<td>" . $row["nota3"] . "</td>";
                        echo "<td>" . $row["promedio"] . "</td>";
                        echo '<td><a href="#" onclick="confirmarEliminar(' . $row["id"] . ');" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmarEliminar(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                window.location.href = 'eliminar.php?id=' + id;
            }
        }
    </script>
</body>
</html>
