<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gimnasio"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los nuevos precios del formulario y asegurarse de que sean numéricos
$nuevoPrecioMusculacion = isset($_POST['nuevoPrecioMusculacion']) && is_numeric($_POST['nuevoPrecioMusculacion']) ? $_POST['nuevoPrecioMusculacion'] : null;
$nuevoPrecioTaekwando = isset($_POST['nuevoPrecioTaekwando']) && is_numeric($_POST['nuevoPrecioTaekwando']) ? $_POST['nuevoPrecioTaekwando'] : null;
$nuevoPrecioZumba = isset($_POST['nuevoPrecioZumba']) && is_numeric($_POST['nuevoPrecioZumba']) ? $_POST['nuevoPrecioZumba'] : null;
$nuevoPrecioFuncional = isset($_POST['nuevoPrecioFuncional']) && is_numeric($_POST['nuevoPrecioFuncional']) ? $_POST['nuevoPrecioFuncional'] : null;
$nuevoPrecioBoxeo = isset($_POST['nuevoPrecioBoxeo']) && is_numeric($_POST['nuevoPrecioBoxeo']) ? $_POST['nuevoPrecioBoxeo'] : null;

// Variable para realizar la actualización de precios
$actualizaciones = 0;

// Actualizar Musculación si es necesario
if ($nuevoPrecioMusculacion !== null) {
    $sql = "UPDATE clases SET precio = ? WHERE nombre = 'Musculacion'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $nuevoPrecioMusculacion);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $actualizaciones++;
    }
    $stmt->close();
}

// Actualizar Taekwando si es necesario
if ($nuevoPrecioTaekwando !== null) {
    $sql = "UPDATE clases SET precio = ? WHERE nombre = 'Taekwando'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $nuevoPrecioTaekwando);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $actualizaciones++;
    }
    $stmt->close();
}

// Actualizar Zumba si es necesario
if ($nuevoPrecioZumba !== null) {
    $sql = "UPDATE clases SET precio = ? WHERE nombre = 'Zumba'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $nuevoPrecioZumba);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $actualizaciones++;
    }
    $stmt->close();
}

// Actualizar Funcional si es necesario
if ($nuevoPrecioFuncional !== null) {
    $sql = "UPDATE clases SET precio = ? WHERE nombre = 'Funcional'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $nuevoPrecioFuncional);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $actualizaciones++;
    }
    $stmt->close();
}

// Actualizar Boxeo si es necesario
if ($nuevoPrecioBoxeo !== null) {
    $sql = "UPDATE clases SET precio = ? WHERE nombre = 'Boxeo'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $nuevoPrecioBoxeo);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $actualizaciones++;
    }
    $stmt->close();
}

// Comprobar si hubo actualizaciones
if ($actualizaciones > 0) {
    echo "<h2>¡Precios actualizados con éxito!</h2>";
    echo "<p><strong>Nuevos precios:</strong></p>";
    echo "<ul>";
    if ($nuevoPrecioMusculacion !== null) {
        echo "<li><strong>Musculación:</strong> $" . number_format($nuevoPrecioMusculacion, 2) . "</li>";
    }
    if ($nuevoPrecioTaekwando !== null) {
        echo "<li><strong>Taekwando:</strong> $" . number_format($nuevoPrecioTaekwando, 2) . "</li>";
    }
    if ($nuevoPrecioZumba !== null) {
        echo "<li><strong>Zumba:</strong> $" . number_format($nuevoPrecioZumba, 2) . "</li>";
    }
    if ($nuevoPrecioFuncional !== null) {
        echo "<li><strong>Funcional:</strong> $" . number_format($nuevoPrecioFuncional, 2) . "</li>";
    }
    if ($nuevoPrecioBoxeo !== null) {
        echo "<li><strong>Boxeo:</strong> $" . number_format($nuevoPrecioBoxeo, 2) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<h2>No se realizaron cambios en los precios.</h2>";
}

$conn->close();

// Botón para volver a la gestión de usuarios
echo '<br><a href="gestion.php">
        <button style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a Gestión de Usuarios
        </button>
      </a>';
exit();
?>
