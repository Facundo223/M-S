<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Fecha de Pago</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            font-size: 16px;
            padding: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Actualizar Fecha de Pago del Cliente</h2>

    <!-- Formulario para actualizar fecha de pago -->
    <form action="actualizar_fecha_pago.php" method="POST">
        <div class="form-group">
            <label for="Nombre">Nombre del Cliente:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>

        <div class="form-group">
            <label for="FechaAsistencia">Nueva Fecha de Pago:</label>
            <input type="date" class="form-control" id="FechaAsistencia" name="FechaAsistencia" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Fecha de Pago</button>
    </form>
    
    <br>
    <a href="ver_registros.php">
        <button class="btn btn-primary">Volver a los Registros</button>
    </a>
</div>

</body>
</html>
