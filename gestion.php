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
    <a href="delete.php"class="boton"><button>Eliminar Usuario</button></a>
    <a href="register.php"class="boton"><button>Registrar Asistencia</button></a>
    <a href="actu.php"class="boton"><button>Actualizar Precios</button></a>
    <a href="gestion.php" class="boton"><button>Actualizar Pagina</button></a>
    <br>
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