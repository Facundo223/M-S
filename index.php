<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Portada de Inicio</title>
    <style>
        /* Estilos para la portada */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .portada-container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 36px;
            color: #333;
        }
        .boton-inicio {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .boton-inicio:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="portada-container">
        <h1>Bienvenido al Sistema de Gestión de Gimnasio</h1>
        <a href="gestion.php" class="boton-inicio">Ir a Gestión de Usuarios</a>
    </div>

</body>
</html>
