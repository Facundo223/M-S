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

    <h1>Eliminar Usuario</h1>
    <a href="ver_registros.php" class="boton"><button>Ver Registros</button></a>
    <a href="gestion.php" class="boton"><button>Volver</button></a>

    <form action="baja.php" method="post">
        <div class="container">
            <label for="DNI">DNI</label>
            <input type="number" id="DNI" name="DNI" required>
            <br>
            <input type="submit" value="Eliminar Usuario">
        </div>
    </form>

           
</body>
</html>