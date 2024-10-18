<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gimnasio"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las clases
$sql = "SELECT nombre, precio FROM clases";
$result = $conn->query($sql);
?>
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

    <h1>Gestión de Usuarios</h1>
    <a href="ver_registros.php" class="boton"><button>Ver Registros</button></a>
    <h2>Registrar Cliente</h2>
    <form action="alta.php" method="post" onsubmit="return validateForm()">
        <div class="container">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br>
        <label for="Apellido">Apellido:</label>
        <input type="text" id="Apellido" name="Apellido" required>
        <br>
        <label for="Telefono">Teléfono:</label>
        <input type="tel" id="Telefono" name="Telefono" maxlength="10" required>
        <br>
        <label for="DNI">DNI:</label>
        <input type="number" id="DNI" name="DNI" required>
        <br>
        <label for="cuota">Selecciona una Clase:</label>
            <select id="cuota" name="cuota" required>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre'] . ' - $' . $row['precio']; ?></option>
                    <?php endwhile; ?>
                <?php else: ?>
                    <option value="">No hay clases disponibles</option>
                <?php endif; ?>
            </select>
        <br>
        <label for="FechadePago">Fecha de pago</label>
        <input type="date" id="FechadePago" name="FechadePago" required>
        <br>
        <input type="submit" value="Agregar Usuario">
        </div>
    </form>

    <form action="actualizar.php" method="post">
        <div class="container">
    <label for="nuevoPrecioMusculacion">Musculación:</label>
    <input type="number" id="nuevoPrecioMusculacion" name="nuevoPrecioMusculacion" placeholder="Nuevo precio" required>
    <br>
    <label for="nuevoPrecioTaekwondo">Taekwondo:</label>
    <input type="number" id="nuevoPrecioTaekwondo" name="nuevoPrecioTaekwondo" placeholder="Nuevo precio" required>
    <br>
    <label for="nuevoPrecioZumba">Zumba:</label>
    <input type="number" id="nuevoPrecioZumba" name="nuevoPrecioZumba" placeholder="Nuevo precio" required>
    <br>
    <label for="nuevoPrecioFuncional">Funcional:</label>
    <input type="number" id="nuevoPrecioFuncional" name="nuevoPrecioFuncional" placeholder="Nuevo precio" required>
    <br>
    <label for="nuevoPrecioBoxeo">Boxeo:</label>
    <input type="number" id="nuevoPrecioBoxeo" name="nuevoPrecioBoxeo" placeholder="Nuevo precio" required>
    <br>
    <input type="submit" value="Actualizar Precios">
    </div>
</form>


    <h2>Eliminar Usuario</h2>
    <form action="baja.php" method="post">
        <div class="container">
            <label for="DNI">DNI</label>
            <input type="number" id="DNI" name="DNI" required>
            <br>
            <input type="submit" value="Eliminar Usuario">
        </div>
    </form>

    <h2>Registrar Asistencia</h2>
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

    <script src="java/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            const dniField = document.querySelector('input[name="DNI"]');
            if (dniField.value.length > 8) {
                alert("El DNI debe tener un máximo de 8 dígitos. Se recortará a 8 dígitos.");
                dniField.value = dniField.value.substring(0, 8);
            }
            return true; 
        }
    </script>            
</body>
</html>