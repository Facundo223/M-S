<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Usuarios</title>
</head>
<body>

    <h1>Registrar Asistencia</h1>
    <a href="ver_registros.php" class="boton"><button>Ver Registros</button></a>
    <a href="gestion.php" class="boton"><button>Volver</button></a>

    <form action="registrar_asistencia.php" method="post">
        <div class="container">
            <label for="Nombre_asistencia">Nombre:</label>
            <input type="text" id="Nombre_asistencia" name="Nombre" required>
            <br>
            <label for="FechaAsistencia">Fecha de Asistencia:</label>
            <input type="date" id="FecheAsistencia" name="FechaAsistencia" required>
            <br>
            <input type="submit" value="Registrar Asistencia">
        </div>
    </form>

           
</body>
</html>