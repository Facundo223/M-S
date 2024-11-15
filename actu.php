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

    <h1>Actualizar Precios</h1>
    <a href="ver_registros.php" class="boton"><button>Ver Registros</button></a>
    <a href="gestion.php" class="boton"><button>Volver</button></a>

    <form action="actualizar.php" method="post">
    <div class="container">
    <label for="nuevoPrecioMusculacion">Musculación:</label>
    <input type="number" id="nuevoPrecioMusculacion" name="nuevoPrecioMusculacion" placeholder="Nuevo precio" >
    <br>
    <label for="nuevoPrecioTaekwando">Taekwondo:</label>
    <input type="number" id="nuevoPrecioTaekwando" name="nuevoPrecioTaekwando" placeholder="Nuevo precio" >
    <br>
    <label for="nuevoPrecioZumba">Zumba:</label>
    <input type="number" id="nuevoPrecioZumba" name="nuevoPrecioZumba" placeholder="Nuevo precio" >
    <br>
    <label for="nuevoPrecioFuncional">Funcional:</label>
    <input type="number" id="nuevoPrecioFuncional" name="nuevoPrecioFuncional" placeholder="Nuevo precio" >
    <br>
    <label for="nuevoPrecioBoxeo">Boxeo:</label>
    <input type="number" id="nuevoPrecioBoxeo" name="nuevoPrecioBoxeo" placeholder="Nuevo precio" >
    <br>
    <input type="submit" value="Actualizar Precios">
    </div>
</form>

           
</body>
</html>