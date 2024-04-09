<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ingresar datos del estudiante</h2>
        <form action="procesar.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del estudiante:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="nota1">Nota Parcial 1:</label>
                <input type="number" class="form-control" id="nota1" name="nota1" step="0.1" min="1.0" max="5.0" required>
            </div>
            <div class="form-group">
                <label for="nota2">Nota Parcial 2:</label>
                <input type="number" class="form-control" id="nota2" name="nota2" step="0.1" min="1.0" max="5.0" required>
            </div>
            <div class="form-group">
                <label for="nota3">Nota Parcial 3:</label>
                <input type="number" class="form-control" id="nota3" name="nota3" step="0.1" min="1.0" max="5.0" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular promedio</button>
        </form>
    </div>
</body>
</html>
